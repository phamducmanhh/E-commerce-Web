<?php
ob_start();
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();
include('../db/dbhelper.php');
require_once('config_vnpay.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
$ngay_tao_HD = date('Y/m/d H:i:s');
$code_order = rand(0, 9999);
$cart_payment = $_POST['payment'];
$tong_tien = 0;

// Check if the cart is set and is an array
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    foreach ($cart as $value) {
        $tong_tien += $value['qty'] * $value['price'];
    }
} else {
    $cart = []; // Set to empty array if cart isn't set
}

// Thanh toán tiền mặt
if (isset($cart_payment) && $cart_payment == 'tienmat') {
    if (isset($_SESSION['ten_dangnhap'])) {
        $ten_dangnhap = $_SESSION['ten_dangnhap'];
        $sql = 'SELECT * FROM khachhang WHERE ten_dangnhap = "' . $ten_dangnhap . '"';
        $infoCus = executeSingleResult($sql);

        if ($tong_tien < 1000000) {
            $tong_tien += 15000; // Phí vận chuyển
        }

        try {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $ngay_tao_HD = date('Y/m/d H:i:s');
            
            // Insert hóa đơn
            $sql = 'INSERT INTO hoadon (id_khachhang, tong_tien, ngay_tao) VALUES ("' . $infoCus['id'] . '", "' . $tong_tien . '", "' . $ngay_tao_HD . '")';
            execute($sql);

            $id_hoadon = executeSingleResult('SELECT id FROM hoadon ORDER BY ngay_tao DESC LIMIT 0, 1')['id'];

            // Insert chi tiết hóa đơn và cập nhật số lượng sản phẩm
            foreach ($cart as $key => $value) {
                execute('INSERT INTO cthoadon (id_hoadon, id_sanpham, so_luong) VALUES ("' . $id_hoadon . '", "' . $key . '", "' . $value['qty'] . '")');
                $sl = executeSingleResult('SELECT so_luong FROM sanpham WHERE id=' . $key)['so_luong'];
                $sldabancu = executeSingleResult('SELECT sl_da_ban FROM sanpham WHERE id=' . $key)['sl_da_ban'];
                execute('UPDATE sanpham SET so_luong="' . ($sl - $value['qty']) . '", sl_da_ban="' . ($value['qty'] + $sldabancu) . '" WHERE id=' . $key);
            }

            // Cập nhật tổng tiền mua hàng của khách
            $tong_tien_muahang = executeSingleResult('SELECT tong_tien_muahang as s FROM khachhang WHERE id=' . $infoCus['id'])['s'];
            execute('UPDATE khachhang SET tong_tien_muahang="' . ($tong_tien_muahang + $tong_tien) . '" WHERE id=' . $infoCus['id']);

            // Cập nhật số lượng sản phẩm theo thể loại
            $listCate = executeResult('SELECT * FROM theloai WHERE 1');
            foreach ($listCate as $item) {
                $tongSPtheoTheLoai = executeSingleResult('SELECT SUM(so_luong) AS sl FROM sanpham WHERE id_the_loai=' . $item['id'])['sl'];
                execute('UPDATE theloai SET tong_sp="' . $tongSPtheoTheLoai . '" WHERE id=' . $item['id']);
            }

            unset($_SESSION['cart']);
            ?>
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Thành công',
                    text: 'Giao dịch thanh toán bằng Tiền mặt thành công',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '?index.php&act=my_bill';
                    }
                });
            });
            </script>
            <?php
        } catch (Exception $e) {
            ?>
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Thất bại',
                    text: 'Có lỗi xảy ra trong quá trình thanh toán',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
            </script>
            <?php
        }
    }
}

// Thanh toán VNPAY
elseif ($cart_payment == 'vnpay') {
    $vnp_TxnRef = $code_order;
    $vnp_OrderInfo = 'Thanh toán đơn hàng đặt tại web';
    $vnp_OrderType = 'billpayment';
    
    if ($tong_tien < 1000000) {
        $tong_tien += 15000;
    }

    $vnp_Amount = $tong_tien * 100;
    $vnp_Locale = 'vn';
    $vnp_BankCode = 'NCB';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    $vnp_ExpireDate = $expire;

    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
        "vnp_ExpireDate" => $vnp_ExpireDate
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }

    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }

    if (isset($_POST['redirect'])) {
        if (isset($_SESSION['ten_dangnhap'])) {
            try {
                $ten_dangnhap = $_SESSION['ten_dangnhap'];
                $sql = 'SELECT * FROM khachhang WHERE ten_dangnhap="' . $ten_dangnhap . '"';
                $infoCus = executeSingleResult($sql);
                
                date_default_timezone_set("Asia/Ho_Chi_Minh");
                $ngay_tao_HD = date('Y/m/d H:i:s');
                
                // Insert hóa đơn
                $sql = 'INSERT INTO hoadon (id_khachhang, tong_tien, ngay_tao) VALUES ("' . $infoCus['id'] . '", "' . $tong_tien . '", "' . $ngay_tao_HD . '")';
                execute($sql);
                
                $id_hoadon = executeSingleResult('SELECT id FROM hoadon ORDER BY ngay_tao DESC LIMIT 0, 1')['id'];
                
                // Insert chi tiết hóa đơn và cập nhật số lượng
                foreach ($cart as $key => $value) {
                    execute('INSERT INTO cthoadon (id_hoadon, id_sanpham, so_luong) VALUES ("' . $id_hoadon . '", "' . $key . '", "' . $value['qty'] . '")');
                    $sl = executeSingleResult('SELECT so_luong FROM sanpham WHERE id=' . $key)['so_luong'];
                    $sldabancu = executeSingleResult('SELECT sl_da_ban FROM sanpham WHERE id=' . $key)['sl_da_ban'];
                    execute('UPDATE sanpham SET so_luong="' . ($sl - $value['qty']) . '", sl_da_ban="' . ($value['qty'] + $sldabancu) . '" WHERE id=' . $key);
                }

                // Cập nhật tổng tiền mua hàng
                $tong_tien_muahang = executeSingleResult('SELECT tong_tien_muahang as s FROM khachhang WHERE id=' . $infoCus['id'])['s'];
                execute('UPDATE khachhang SET tong_tien_muahang="' . ($tong_tien_muahang + $tong_tien) . '" WHERE id=' . $infoCus['id']);

                // Cập nhật số lượng sản phẩm theo thể loại
                $listCate = executeResult('SELECT * FROM theloai WHERE 1');
                foreach ($listCate as $item) {
                    $tongSPtheoTheLoai = executeSingleResult('SELECT SUM(so_luong) AS sl FROM sanpham WHERE id_the_loai=' . $item['id'])['sl'];
                    execute('UPDATE theloai SET tong_sp="' . $tongSPtheoTheLoai . '" WHERE id=' . $item['id']);
                }

                unset($_SESSION['cart']);
                
                header('Location: ' . $vnp_Url);
                die();
            } catch (Exception $e) {
                ?>
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Thất bại',
                        text: 'Có lỗi xảy ra trong quá trình thanh toán VNPAY',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
                </script>
                <?php
            }
        }
    }
}

// Thanh toán PayPal
elseif ($cart_payment == 'paypal') {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Thông báo',
            text: 'Phương thức thanh toán PayPal đang được phát triển',
            icon: 'info',
            confirmButtonText: 'OK'
        });
    });
    </script>
    <?php
}

// Thanh toán MOMO
elseif ($cart_payment == 'momo') {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Thông báo',
            text: 'Phương thức thanh toán MOMO đang được phát triển',
            icon: 'info',
            confirmButtonText: 'OK'
        });
    });
    </script>
    <?php
}
?>
</body>
</html>
<?php
ob_end_flush();
?>