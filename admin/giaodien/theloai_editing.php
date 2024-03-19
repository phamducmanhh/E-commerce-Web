<?php
if (!empty($_GET['id'])) {
    $result = mysqli_query($con, "SELECT * FROM `theloai` WHERE `id` = " . $_GET['id']);
    $theloai = $result->fetch_assoc();
}
?>
<h1>Sửa thể loại</h1>
<form name="theloai-formsua" method="POST" action="./xulythem.php?id=<?= $_GET['id'] ?>" enctype="multipart/form-data">
    <div class="clear-both"></div>
    <div id="content-box">
        <label>Tên thể loại: </label>
        <input type="text" name="name" value="<?= (!empty($theloai) ? $theloai['ten_tl'] : "") ?>" />
        <input name="btntlsua" type="submit" title="Lưu thể loại" value="Lưu" />
        <div class="clear-both"></div>
    </div>
</form>