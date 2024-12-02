
<h1>Sửa Slider</h1>
<?php
    $sql_sua_slider = "SELECT *FROM tbl_slider WHERE id_thuonghieu = '$_GET[id_thuonghieu]' LIMIT 1";
    $query_sua_slider = mysqli_query($mysqli, $sql_sua_slider);
?>
<?php
    while($row = mysqli_fetch_array($query_sua_slider)){

?>
<form name="theloai-formadd" method="POST" action="giaodien/thuonghieu_xuly.php?id_thuonghieu=<?php echo $_GET['id_thuonghieu'] ?>" enctype="multipart/form-data">
    <div class="clear-both"></div>
    <div class="box-content">
        
        <div class="form-group">
            <label for="">Hình ảnh:</label>
            <input type="file" class="form-control-file" id="hinhanh" name="hinhanh" >
            <img src="admin/giaodien/upload/<?php echo $row['image_thuonghieu']?>" width="150px">
        </div>
        <div class="form-group">
            <label for="">Tên thương hiệu:</label>
            <input type="text" class="form-control" id="tenbaiviet" name="tenthuonghieu" value="<?php echo $row['tenthuonghieu'] ?>">
        </div>
        <div class="form-group">
            <label for="">Danh mục</label>
            <input type="text" class="form-control" id="tenbaiviet" name="tendanhmuc" placeholder="Nhập tên danh mục" required>
        </div>
        <input name="btn_edit" type="submit" title="Lưu bài viết" value="Lưu" />

        <div class="clear-both"></div>
    </div>
</form>
<?php
    }
?>


