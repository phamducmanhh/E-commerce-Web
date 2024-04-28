<p>Cam on</p>
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
    

    if($cart_query){
        echo "<h3>Giao dịch thanh toán bằng VNPay thành công</h3>";
        echo "<p>Vui lòng vào trang <a target='_blank' href='http://localhost:8088/CNM/index.php?act=my_bill'>Lịch sử đơn hàng</a> để xem chi tiết đơn hàng</p>";
    }else{
        echo "Giao dịch VNPAY thất bại";
    }
}elseif(isset($_GET['partnerCode'])) {
    $ten_dangnhap=$_SESSION['ten_dangnhap'];
    $code_order = rand(0,9999);
    $partnerCode= $_GET['partnerCode'];
    $orderId= $_GET['orderId'];
    $amount= $_GET['amount'];
    $orderInfo= $_GET['orderInfo'];
    $orderType= $_GET['orderType'];
    $transId= $_GET['transId'];
    $payType= $_GET['payType'];
    $cart_payment = "MOMO";

    $insert_momo = "INSERT INTO tbl_momo(
    partner_code,order_id,amount,order_info,order_type,trans_id,pay_type,code_cart)
        VALUE('".$partnerCode."','".$orderId."','".$amount."','".$orderInfo."','".$orderType."','".$transId."',
        '".$payType."','".$code_order."')";
        $cart_query = mysqli_query($mysqli, $insert_momo);
        if($cart_query){
            $sql='insert into hoadon (id_khachhang, tong_tien, ngay_tao) value ("'.$infoCus['id'].'", "'.$tong_tien.'", "'.$ngay_tao_HD.'")';
        execute($sql);
        $id_hoadon=executeSingleResult('SELECT id FROM hoadon ORDER BY ngay_tao DESC LIMIT 0, 1')['id'];
        foreach($cart as $key => $value){
            execute('INSERT INTO cthoadon (id_hoadon, id_sanpham, so_luong) VALUE ("'.$id_hoadon.'", "'.$key.'", "'.$value['qty'].'")');
            $sl=executeSingleResult('SELECT so_luong FROM sanpham WHERE id='.$key)['so_luong'];
            $sldabancu=executeSingleResult('SELECT sl_da_ban FROM sanpham WHERE id='.$key)['sl_da_ban'];
            execute('UPDATE sanpham SET so_luong="'.($sl-$value['qty']).'", sl_da_ban="'.($value['qty']+$sldabancu).'" WHERE id='.$key);
            
        }
        $tong_tien_muahang=executeSingleResult('select tong_tien_muahang as s from khachhang where id='.$infoCus['id'])['s'];//TỔng tiền hiện tại khách hàng đã mua
        execute('UPDATE khachhang SET tong_tien_muahang="'.($tong_tien_muahang+$tong_tien).'" WHERE id='.$infoCus['id']);//Cập nhật lại tổng tiền mau hàng
        //Cập nhật lại sô lượng sản phẩm theo thể loại
        $listCate=executeResult('SELECT * FROM theloai WHERE 1');
        foreach($listCate as $item){
            $tongSPtheoTheLoai=executeSingleResult('SELECT SUM(so_luong) AS sl FROM sanpham WHERE id_the_loai='.$item['id'])['sl'];
            execute('UPDATE theloai SET tong_sp="'.$tongSPtheoTheLoai.'" WHERE id='.$item['id']);
        }
        echo "<h3>Giao dịch thanh toán bằng MOMO ATM thành công</h3>";
        echo "<p>Vui lòng vào trang <a target='_blank' href='http://localhost:8088/CNM/index.php?act=my_bill'>Lịch sử đơn hàng</a> để xem chi tiết đơn hàng</p>";
        unset($_SESSION['cart']);

        }else{
            echo "Giao dịch MOMO thất bại";
        }
        
}
?>
