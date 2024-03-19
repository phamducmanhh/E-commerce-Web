<?php 
$id=isset($_GET['id'])?$_GET['id']:'';
// kiểm tra xem id có trong database hay không
$conn =mysqli_connect("localhost","root","","bannuocdb");
$sql="SELECT * FROM sanpham WHERE id='$id'";

$result = mysqli_query($conn,$sql);
// chọn san pham tu database
$product=mysqli_num_rows($result);
//echo $product;
$obj=$result -> fetch_object();
// kiểm tra sản phẩm có trong csdl hay không. Nếu có
if($product>0)
{
	if(isset($_SESSION['cart']) )
	{	//echo 'da ton tai';
		if(isset($_SESSION['cart'][$id]))
		{
			
			$_SESSION['cart'][$id]['qty']+=1;
			$_SESSION['cart'][$id]['name']=$obj->ten_sp;
			$_SESSION['cart'][$id]['price']=$obj->don_gia;
			$_SESSION['cart'][$id]['Pic']=$obj->hinh_anh;
		}
		else
		{	
			$_SESSION['cart'][$id]['qty']=1;
			$_SESSION['cart'][$id]['name']=$obj->ten_sp;
			$_SESSION['cart'][$id]['price']=$obj->don_gia;
			$_SESSION['cart'][$id]['Pic']=$obj->hinh_anh;
		}
		$_SESSION['success']='Ton tai gio hang! cap nhat thanh cong:';
		?>
		<div id="error-notify" class="box-content">
    <h2>Đã thêm vào giỏ hàng</h2>
    
    <a href="javascript:window.history.go(-1)">Danh sách sản phẩm</a>
</div>
	<?php
	}
	// không tồn tại($_SESSION['cart'])
	else 
	{	//var_dump("chua ton tai");
		//$_SESSION['success']='Ton tai gio hang! cap nhat thanh cong:';
		$_SESSION['cart'][$id]['qty']=1;
		$_SESSION['cart'][$id]['name']=$obj->ten_sp;
		$_SESSION['cart'][$id]['price']=$obj->don_gia;
		$_SESSION['cart'][$id]['Pic']=$obj->hinh_anh;
		?>
		<div id="error-notify" class="box-content">
    <h2>Đã thêm vào giỏ hàng</h2>
    
    <a href="javascript:window.history.go(-1)">Danh sách sản phẩm</a>
</div>
	<?php
	}
}
// kiểm tra sản phẩm có trong csdl hay không. Nếu có
else
{
	$_SESSION['success']='Khong ton tai sp trong csdl:';
	header("locaton:./admin.php?muc=9&tmuc=Nhà%20cung%20cấp");
}

?>