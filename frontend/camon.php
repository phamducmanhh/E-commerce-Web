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

            // Commit transaction
            $mysqli->commit();

            // Success Sweet Alert and redirect
            ?>
            <script>
            Swal.fire({
                title: 'Thanh toán thành công',
                text: 'Đơn hàng của bạn đã được xác nhận',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '?index.php&act=my_bill';
                }
            });
            </script>
            <?php
            
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