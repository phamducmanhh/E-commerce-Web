
<?php
    $con = mysqli_connect("localhost", "root", "", "bannuocdb");
    $result = mysqli_query($con, "SELECT * FROM `taikhoang` WHERE `username` = '" . $_SESSION['user']."'");
    $taikhoang = $result->fetch_assoc();
?>
<h1>Đổi mật khẩu</h1>
<form name="taikhoang-formsua" method="POST" action="./xulythem.php?user=<?= $_SESSION['user']?>" enctype="multipart/form-data">
    
    <div class="clear-both"></div>
    <div class="box-content">
        <label>Mật khẩu mới: </label>
        <input type="text" name="matkhaumoi" value=""/>
        <input name="btntkmk" type="submit" title="Lưu mật khẩu" value="Lưu" />
        <div class="clear-both"></div>
    </div>
</form>