<?php
    session_start();
    include('../db/dbhelper.php');
    require_once('config_vnpay.php');
    $ngay_tao_HD=date('Y/m/d H:i:s');
    $code_order = rand(0,9999);
    //$infoCus=executeSingleResult($sql);
    $cart_payment = $_POST['payment'];
    $tong_tien=0;
            if(isset($_SESSION['cart'])) $cart=$_SESSION['cart'];
    
            foreach($cart as $value){
                $tong_tien+=$value['qty']*$value['price'];
            }
    // $tong_tien=0;
    // $shipping = 15000;
    // if(isset($_SESSION['cart'])) $cart=$_SESSION['cart'];
         
    //     foreach($cart as $value){
    //         $tong_tien+=$value['qty']*$value['price'] + 15000 ;
    //     }
    //     $tongtien_vnd = $tongtien;
    //$id_dangky = $_SESSION['id_khachhang'];
    //Lấy id thông tin vận chuyển
    if(isset($cart_payment) && $cart_payment == 'tienmat') {
        if(isset($_SESSION['ten_dangnhap'])){
            $ten_dangnhap=$_SESSION['ten_dangnhap'];
            $sql='select * from khachhang where ten_dangnhap="'.$ten_dangnhap.'"';
            $infoCus=executeSingleResult($sql);
            $tong_tien=0;
            if(isset($_SESSION['cart'])) $cart=$_SESSION['cart'];
    
            foreach($cart as $value){
                $tong_tien+=$value['qty']*$value['price'];
            }
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $ngay_tao_HD=date('Y/m/d H:i:s');
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
            unset($_SESSION['cart']);
    
        }
        
           
             
    }
    elseif($cart_payment=='vnpay'){
    $vnp_TxnRef =  $code_order;//Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    $vnp_OrderInfo = 'Thanh toán đơn hàng đặt tại web';
    $vnp_OrderType = 'billpayment';
    $vnp_Amount = $tong_tien *100;
    $vnp_Locale = 'vn';
    $vnp_BankCode = 'NCB';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    //Add Params of 2.0.1 Version
    $vnp_ExpireDate = $expire;
    //Billing
    // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
    // $vnp_Bill_Email = $_POST['txt_billing_email'];
    // $fullName = trim($_POST['txt_billing_fullname']);
    if (isset($fullName) && trim($fullName) != '') {
        $name = explode(' ', $fullName);
        $vnp_Bill_FirstName = array_shift($name);
        $vnp_Bill_LastName = array_pop($name);
    }
   
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
        "vnp_ExpireDate"=>$vnp_ExpireDate
        
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
    //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    // }

    //var_dump($inputData);
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
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            if(isset($_SESSION['ten_dangnhap'])){
                $ten_dangnhap=$_SESSION['ten_dangnhap'];
                $sql='select * from khachhang where ten_dangnhap="'.$ten_dangnhap.'"';
                $infoCus=executeSingleResult($sql);
                $tong_tien=0;
                    if(isset($_SESSION['cart'])) $cart=$_SESSION['cart'];
                    
                    foreach($cart as $value){
                        $tong_tien+=$value['qty']*$value['price'];
                    }
                date_default_timezone_set("Asia/Ho_Chi_Minh");
                $ngay_tao_HD=date('Y/m/d H:i:s');
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
                unset($_SESSION['cart']);
            
            }

            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }
        // vui lòng tham khảo thêm tại code demo
// }elseif($cart_payment=='paypal'){
//     echo 'Thanh toán PayPal';
// }elseif($cart_payment=='momo'){
//     echo 'Thanh toán MOMO';
// }
    //unset($_SESSION['cart']);
    //header("Location: ../../index.php?quanly=camon");
?>