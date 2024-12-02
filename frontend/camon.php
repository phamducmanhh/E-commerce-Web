<?php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();

if (isset($_GET['vnp_Amount'])) {
    try {
        // Get VNPAY payment information first
        $vnp_Amount = $_GET['vnp_Amount'];
        $vnp_BankCode = $_GET['vnp_BankCode'];
        $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
        $vnp_CardType = $_GET['vnp_CardType'];
        $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
        $vnp_PayDate = $_GET['vnp_PayDate'];
        $vnp_TmnCode = $_GET['vnp_TmnCode'];
        $vnp_TransactionNo = $_GET['vnp_TransactionNo'];

        // Kiểm tra đăng nhập
        if(!isset($_SESSION['ten_dangnhap'])) {
            throw new Exception('Vui lòng đăng nhập để tiếp tục');
        }

        $ten_dangnhap = $_SESSION['ten_dangnhap'];
        
        // Get customer information
        $sql = 'SELECT * FROM khachhang WHERE ten_dangnhap = ?';
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $ten_dangnhap);
        $stmt->execute();
        $infoCus = $stmt->get_result()->fetch_assoc();

        // Calculate total amount from cart if exists
        $tong_tien = 0;
        if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            foreach($cart as $value){
                $tong_tien += $value['qty'] * $value['price'];
            }
            if ($tong_tien < 1000000) {
                $tong_tien += 15000; // Add shipping fee
            }
        } else {
            // If cart is not in session, get amount from VNPAY response
            $tong_tien = $vnp_Amount/100; // Convert from VND cents to VND
        }

        // Get or generate order code
        $code_cart = isset($_SESSION['id_hoadon']) ? $_SESSION['id_hoadon'] : rand(0, 9999);
            
        // Start transaction
        $mysqli->begin_transaction();
        try {
            // Insert VNPAY transaction record
            $insert_vnpay = "INSERT INTO tbl_vnpay(
                vnp_amount, code_cart, vnp_bankCode, vnp_banktranno, 
                vnp_cardtype, vnp_orderinfo, vnp_paydate, vnp_tmncode, 
                vnp_transactionno) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $mysqli->prepare($insert_vnpay);
            $stmt->bind_param("sssssssss", 
                $vnp_Amount, $code_cart, $vnp_BankCode, $vnp_BankTranNo,
                $vnp_CardType, $vnp_OrderInfo, $vnp_PayDate, $vnp_TmnCode,
                $vnp_TransactionNo
            );
            $cart_query = $stmt->execute();

            if($cart_query) {
                // Create order
                date_default_timezone_set("Asia/Ho_Chi_Minh");
                $ngay_tao_HD = date('Y/m/d H:i:s');
                
                // Insert order header
                $sql = 'INSERT INTO hoadon (id_khachhang, tong_tien, ngay_tao) VALUES (?, ?, ?)';
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("ids", $infoCus['id'], $tong_tien, $ngay_tao_HD);
                $stmt->execute();
                $id_hoadon = $mysqli->insert_id;

                // Only process cart items if cart exists
                if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    foreach($cart as $key => $value){
                        // Check product availability
                        $sql = 'SELECT so_luong, sl_da_ban FROM sanpham WHERE id = ?';
                        $stmt = $mysqli->prepare($sql);
                        $stmt->bind_param("i", $key);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $product = $result->fetch_assoc();
                        
                        if($product['so_luong'] < $value['qty']) {
                            throw new Exception('Sản phẩm không đủ số lượng');
                        }

                        // Insert order detail
                        $sql = 'INSERT INTO cthoadon (id_hoadon, id_sanpham, so_luong) VALUES (?, ?, ?)';
                        $stmt = $mysqli->prepare($sql);
                        $stmt->bind_param("iid", $id_hoadon, $key, $value['qty']);
                        $stmt->execute();

                        // Update product quantity
                        $new_quantity = $product['so_luong'] - $value['qty'];
                        $new_sold = $product['sl_da_ban'] + $value['qty'];
                        
                        $sql = 'UPDATE sanpham SET so_luong = ?, sl_da_ban = ? WHERE id = ?';
                        $stmt = $mysqli->prepare($sql);
                        $stmt->bind_param("iii", $new_quantity, $new_sold, $key);
                        $stmt->execute();
                    }
                }

                // Update customer total purchase amount
                $sql = 'SELECT tong_tien_muahang FROM khachhang WHERE id = ?';
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("i", $infoCus['id']);
                $stmt->execute();
                $result = $stmt->get_result();
                $current_total = $result->fetch_assoc()['tong_tien_muahang'];
                
                $new_total = $current_total + $tong_tien;
                $sql = 'UPDATE khachhang SET tong_tien_muahang = ? WHERE id = ?';
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("di", $new_total, $infoCus['id']);
                $stmt->execute();

                // Update category product counts
                $sql = 'SELECT * FROM theloai';
                $result = $mysqli->query($sql);
                while($category = $result->fetch_assoc()) {
                    $sql = 'SELECT SUM(so_luong) as total FROM sanpham WHERE id_the_loai = ?';
                    $stmt = $mysqli->prepare($sql);
                    $stmt->bind_param("i", $category['id']);
                    $stmt->execute();
                    $total_products = $stmt->get_result()->fetch_assoc()['total'];
                    
                    $sql = 'UPDATE theloai SET tong_sp = ? WHERE id = ?';
                    $stmt = $mysqli->prepare($sql);
                    $stmt->bind_param("ii", $total_products, $category['id']);
                    $stmt->execute();
                }

                // Commit transaction
                $mysqli->commit();

                // Clear shopping cart and order session
                unset($_SESSION['cart']);
                unset($_SESSION['id_hoadon']);
                
                // Show success message
                ?>
                <script>
                Swal.fire({
                    title: 'Giao dịch thanh toán bằng VNPAY thành công',
                    text: 'Vui lòng vào trang Lịch sử đơn hàng để xem chi tiết đơn hàng',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "?index.php&act=my_bill";
                    }
                });
                </script>
                <?php
            } else {
                throw new Exception('Lỗi khi lưu thông tin thanh toán');
            }
        } catch (Exception $e) {
            // Rollback transaction on error
            $mysqli->rollback();
            throw $e;
        }
    } catch (Exception $e) {
        // Show error message for exceptions
        ?>
        <script>
        Swal.fire({
            title: 'Lỗi xử lý thanh toán',
            text: '<?php echo $e->getMessage(); ?>',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "?index.php&act=cart";
            }
        });
        </script>
        <?php
    }
}
?>