
<h1>Sửa bài viết</h1>
<?php
    $sql_sua_bv = "SELECT *FROM tbl_baiviet WHERE id_baiviet = '$_GET[idbaiviet]' LIMIT 1";
    $query_sua_bv = mysqli_query($mysqli, $sql_sua_bv);
?>
<?php
    while($row = mysqli_fetch_array($query_sua_bv)){

?>
<form name="theloai-formadd" method="POST" action="giaodien/xulybaiviet.php?idbaiviet=<?php echo $_GET['idbaiviet'] ?>" enctype="multipart/form-data">
    <div class="clear-both"></div>
    <div class="box-content">
        <label>Tên bài viết: </label>
        <input type="text" name="tenbaiviet" value="<?php echo $row['tenbaiviet'] ?>" /></br>
        <label>Tóm tắt: </label>
        <input type="text" name="tomtat" value="<?php echo $row['tomtat'] ?>" /></br>
        <label>Nội dung: </label>
        <textarea rows="10" name="noidung" style="resize: none"><?php echo $row['noidung'] ?></textarea></br>
        <label>Hình ảnh: </label>
        <input type="file" name="hinhanh">
        <img src="admin/giaodien/upload/<?php echo $row['hinhanh']?>" width="150px">
      </br>
        <label>Tình trạng: </label>
        <input type="text" name="tinhtrang" value="<?php echo $row['tinhtrang'] ?>" /></br>
        <label>Danh mục bài viết: </label>
        <td>
            <select name="danhmuc" >
            <?php
              $sql_danhmuc = "SELECT *FROM tbl_danhmucbaiviet ORDER BY id_danhmucbaiviet DESC";
              $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
              while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
            ?>
            <option value="<?php echo $row_danhmuc['id_danhmucbaiviet'] ?>"><?php echo $row_danhmuc['tendanhmuc_baiviet'] ?></option>
            
            <?php
              }
            ?>
        </td>
        
        <input name="btn_edit" type="submit" title="Lưu bài viết" value="Lưu" />

        <div class="clear-both"></div>
    </div>
</form>
<?php
    }
?>


