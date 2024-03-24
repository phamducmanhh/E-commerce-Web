<?php
error_reporting(0); // Tắt tất cả các cảnh báo
ini_set('display_errors', 0); // Ẩn hiển thị các cảnh báo
session_start();
include('../db/dbhelper.php');
include('../db/config.php');

if (isset($_GET['vnp_Amount'])) {
    $vnp_Amount = $_GET['vnp_Amount'];
    $vnp_BankCode = $_GET['vnp_BankCode'];
    $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
    $vnp_CardType = $_GET['vnp_CardType'];
    $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
    $vnp_PayDate = $_GET['vnp_PayDate'];
    $vnp_TmnCode = $_GET['vnp_TmnCode'];
    $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
    $code_cart = $_SESSION['id_hoadon'];

    
    // Giả sử $_SESSION['cart'] là một mảng, hãy serialize nó trước khi thêm vào cơ sở dữ liệu
     $serialized_cart = json_encode($code_cart);

     $insert_vnpay = "INSERT INTO tbl_vnpay(
        vnp_amount,code_cart,vnp_bankcode,vnp_banktranno,vnp_cardtype,vnp_orderinfo,vnp_paydate,vnp_tmncode,vnp_transactionno)
        VALUE('".$vnp_Amount."','".$code_cart."','".$vnp_BankCode."','".$vnp_BankTranNo."','".$vnp_CardType."','".$vnp_OrderInfo."',
        '".$vnp_PayDate."','".$vnp_TmnCode."','".$vnp_TransactionNo."')";
    $cart_query = mysqli_query($mysqli, $insert_vnpay);
    // Thực thi truy vấn
    

    if ($cart_query === false) { // Kiểm tra truy vấn không thành công
        echo "Lỗi khi thực hiện truy vấn!";
    } else {
        echo "<h3>Giao dịch thanh toán bằng VNPay thành công</h3>";
    }
} else {
    echo "<p>Cảm ơn bạn đã mua hàng, Chúng tôi sẽ cố gắn liên hệ với bạn trong thời gian sớm nhất</p>";
}
?>
