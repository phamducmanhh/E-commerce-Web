<?php 
    $tk=mysqli_query($con,"SELECT `username` FROM `taikhoang` WHERE `taikhoang`.`trang_thai`=0 AND NOT EXISTS (SELECT `ten_dangnhap`FROM `nhanvien` WHERE `taikhoang`.`username`= `nhanvien`.`ten_dangnhap`)");
?>
<h1>Thêm nhân viên</h1>
<form name="nhanvien-formadd" method="POST" action="./xulythem.php" enctype="multipart/form-data">
    <div class="clear-both"></div>
    <div class="box-content">
    <div class="wrap-field">
        <label>Tên nhân viên: </label>
        <input type="text" name="name" value="" />
        <div class="clear-both"></div>
    </div>
    <div class="wrap-field">
        <label>Tên đăng nhập: </label>
        <select name="tendangnhap"><option value=""></option><?php while($row=mysqli_fetch_array($tk)){?><option value="<?= $row['username']?>"><?= $row['username']?></option><?php } ?></select>
        <div class="clear-both"></div>
    </div>
    <div class="wrap-field">
        <label>SĐT: </label>
        <input type="tel" name="sdt" value="" pattern="[0]{1}[0-9]{9}" placeholder="VD: 0123456789" />
        <div class="clear-both"></div>
    </div>
    <div class="wrap-field">
        <label>Email: </label>
        <input type="email" name="email" value="" placeholder="VD: lyphuc823@gmail.com"/>
        <div class="clear-both"></div>
    </div>
    <input name="btnnvadd" type="submit" title="Lưu nhân viên" value="Lưu" />
    </div>
</form>
<div class="clear-both"></div>