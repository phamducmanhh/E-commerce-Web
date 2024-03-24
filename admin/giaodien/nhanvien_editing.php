<?php
if (!empty($_GET['id'])) {
    $result = mysqli_query($con, "SELECT * FROM `nhanvien` WHERE `id` = " . $_GET['id']);
    $nhanvien = $result->fetch_assoc();
    $tk=mysqli_query($con,"SELECT `username` FROM `taikhoang` WHERE `taikhoang`.`trang_thai`=0 AND NOT EXISTS (SELECT `ten_dangnhap`FROM `nhanvien` WHERE `taikhoang`.`username`= `nhanvien`.`ten_dangnhap`)");

}
?>
<h1>Sửa nhân viên</h1>
<div class="box-content">
<form name="nhanvien-formsua" method="POST" action="./xulythem.php?id=<?= $_GET['id'] ?>" enctype="multipart/form-data">
    <div class="clear-both"></div>
    <div class="wrap-field">
        <label>Tên nhân viên: </label>
        <input type="text" name="name" value="<?= (!empty($nhanvien) ? $nhanvien['ten_nv'] : "") ?>" />
        <div class="clear-both"></div>
    </div>
    <div class="wrap-field">
        <label>SĐT: </label>
        <input type="tel" name="sdt" pattern="[0]{1}[0-9]{9}" placeholder="VD: 0123456789" value="<?= (!empty($nhanvien) ? $nhanvien['phone'] : "") ?>" />
        <div class="clear-both"></div>
    </div>
    <div class="wrap-field">
        <label>Username: </label>
        <select name="tendangnhap"><option value="<?=$nhanvien['ten_dangnhap']?>"><?=$nhanvien['ten_dangnhap']?></option><?php while($row=mysqli_fetch_array($tk)){?><option value="<?= $row['username']?>"><?= $row['username']?></option><?php } ?></select>
        <div class="clear-both"></div>
    </div>
    <div class="wrap-field">
        <label>Email: </label>
        <input type="email" name="email" value="<?= (!empty($nhanvien) ? $nhanvien['email'] : "") ?>" />
        <div class="clear-both"></div>
    </div>
    <input name="btnnvsua" type="submit" title="Lưu nhân viên" value="Lưu" />
</form>
</div>
