<?php

require_once("./connect_db.php");
// $sanpham = mysqli_query($con, "SELECT * FROM `sanpham`");
// $row = mysqli_fetch_array($sanpham);
//$cart=[];
if (isset($_SESSION['cart'])) {
	if (isset($_GET['xoa'])) {
		if (isset($_GET['id'])) {
			unset($_SESSION['cart'][$_GET['id']]);
		}
	}
	if (isset($_POST['update_click'])) {
		if(isset($_POST['qty'])){
			foreach ($_POST['qty'] as $key => $val1) {
			$_SESSION['cart'][$key]['qty'] = $val1;
			if ($_SESSION['cart'][$key]['qty'] <= 0) {
			unset($_SESSION['cart'][$key]);
		}
		}
		
		
		}
		
	}

	//echo '<pre>';
	//var_dump($_SESSION['cart']);
?>
	<form action="./admin.php?act=ncccartlist" method="POST">
		<div class="table-responsive-sm ">
			<div class="buttons" style="float: left;"><a href="./admin.php?muc=9&tmuc=Nhà%20cung%20cấp">Thoát</a></div>
			<div class="buttons">
				<input type="submit" name="update_click" value="Cập nhật">
			</div>
			<table class="table table-bordered table-striped table-hover">
				<tr>
					<th>STT</th>
					<th>ID</th>
					<th>Hình ảnh</th>
					<th>Gia</th>
					<th>SL</th>
					<th>Thành tiền </th>
					<th>Xóa</th>
				</tr>
				<?php
				$stt = 0;
				$total = 0;
				$orderProducts = array();
				foreach ($_SESSION['cart'] as $key => $val) {
					$orderProducts[] = $_SESSION['cart'];
					$stt++;
					echo "<tr>";
					echo "<td>$stt</td>";
				?>

					<td><?php echo $key ?></td>
					<td><img style="width: 100px;height: 100px " src="../img/<?= $val['Pic'] ?>"></td>
					<td><?php echo $val['price'] ?></td>
					<td><input type="number" name="qty[<?= $key ?>]" value="<?php echo $val['qty'] ?>"></td>
					<td><?= $val['qty'] * $val['price'] ?></td>
					<td><a href="./admin.php?act=ncccartlist&xoa=y&id=<?= $key ?>">Xóa</a></td>
					</tr>
				<?php
					$total += $val['qty'] * $val['price'];
				}
				?>
				<label>Tổng tiền là:<?= $total ?></label>
			</table>
			<div style="border: 1px solid #ccc; padding: 10px;">
				<div class="wrap-field">
					<label>Tên cơ sở: </label>
					<input type="text" name="namenv" value="" />
					<div class="clear-both"></div>
				</div>
				<div class="wrap-field">
					<label>Địa chỉ: </label>
					<input type="text" name="diachi" value="" />
					<div class="clear-both"></div>
				</div>
				<div class="wrap-field">
					<label>SĐT: </label>
					<input type="tel" name="sdt" pattern="[0]{1}[0-9]{9}" value=""  placeholder="VD: 0123456789" />
					<div class="clear-both"></div>
				</div>
				<div class="wrap-field">
					<label>Ghi chú: </label>
					<input type="text" name="ghichu" value="" />
					<div class="clear-both"></div>
				</div>

				<input type="submit" name="order_click" value="Đặt hàng">
			</div>
		</div>
	</form>
	<?php
	if (isset($_POST['order_click'])) {
		if (isset($_POST['namenv']))
			if ($_POST['namenv'] != '') {
				if (isset($_POST['diachi']))
					if ($_POST['diachi'] != '') {
						if (isset($_POST['sdt']))
							if ($_POST['sdt'] != '') {
								$products = mysqli_query($con, "SELECT * FROM `sanpham` WHERE `id` IN (" . implode(",", array_keys($_POST['qty'])) . ")");
								$total = 0;
								$orderProducts = array();
								while ($row = mysqli_fetch_array($products)) {
									$orderProducts[] = $row;
									$total += $row['don_gia'] * $_POST['qty'][$row['id']];
								}
								$result1 = mysqli_query($con, "INSERT INTO `phieunhap`(`id_nv`, `tong_tien`,`nguoi_nhan`, `sdt`, `diachi`, `ghichu`) VALUES ('" . $_SESSION['idnhanvien'] . "'," . $total . ",'" . $_POST['namenv'] . "','" . $_POST['sdt'] . "','" . $_POST['diachi'] . "','" . $_POST['ghichu'] . "')");
								$id_phieunhap = mysqli_insert_id($con);
								$insertString = "";
								foreach ($orderProducts as $key => $product) {
									$insertString .= "('" . $id_phieunhap . "', '" . $product['id'] . "', '" . $_POST['qty'][$product['id']] . "')";
									if ($key != count($orderProducts) - 1) {
										$insertString .= ",";
									}
									$result2 = mysqli_query($con, "UPDATE `sanpham` SET `so_luong`=`so_luong`+" . $_POST['qty'][$product['id']] . " WHERE `id`=" . $product['id'] . "");
								}
								$insertOrder = mysqli_query($con, "INSERT INTO `ctphieunhap` (`id_phieunhap`, `id_sp`, `so_luong`) VALUES " . $insertString . "");
								// $success = "Đặt hàng thành công";
								if ($insertOrder){
									$listcate=executeResult('SELECT * FROM `theloai` WHERE 1');
									foreach($listcate as $item){
										$tongsanphamtheoloai=executeSingleResult('SELECT SUM(so_luong) AS sl FROM sanpham WHERE id_the_loai='.$item['id'])['sl'];
										execute('UPDATE theloai SET tong_sp="'.$tongsanphamtheoloai.'" WHERE id='.$item['id']);
									}
									unset($_SESSION['cart']);
									echo ('<a href="./admin.php?muc=6&tmuc=Phiếu%20nhập">Nhấp vào mình đi, bạn thành công rồi đó </a>');
								}
							} else echo "Vui lòng nhập đủ thông tin!!";
					} else echo "Vui lòng nhập đủ thông tin!!";
			} else echo "Vui lòng nhập đủ thông tin!!";
	}
} else { ?>
	<div id="error-notify" class="box-content">
		<h2>Không có sản phẩm nào trong giỏ hàng</h2>

		<a href="./admin.php?muc=9&tmuc=Nhà%20cung%20cấp">Danh sách nhà cung cấp</a>
	</div>
<?php }
?>