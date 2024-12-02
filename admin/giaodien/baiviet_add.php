<style>
        .form-group label {
            font-weight: bold;
        }
    </style>
<div class="container">
<h1 class="mt-5">Thêm bài viết</h1>
    <form name="theloai-formadd" method="POST" action="giaodien/xulybaiviet.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Tên bài viết:</label>
            <input type="text" class="form-control" id="tenbaiviet" name="tenbaiviet" placeholder="Nhập tên bài viết" required>
        </div>
        <div class="form-group">
            <label for="">Tóm tắt:</label>
            <input type="text" class="form-control" id="tomtat" name="tomtat" placeholder="Nhập tóm tắt bài viết" required>
        </div>
        <div class="form-group">
            <label for="">Nội dung:</label>
            <textarea class="form-control" id="noidung" name="noidung" rows="5" placeholder="Nhập nội dung" required></textarea>
        </div>
        <div class="form-group">
            <label for="">Ảnh đại diện:</label>
            <input type="file" class="form-control-file" id="hinhanh" name="hinhanh" required>
        </div>
        <div class="form-group">
            <label for="">Danh mục bài viết:</label>
            <select class="form-control" id="danhmuc" name="danhmuc">
                <?php
                  $sql_danhmuc = "SELECT *FROM tbl_danhmucbaiviet ORDER BY id_danhmucbaiviet DESC";
                  $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                  while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                ?>
                <option value="<?php echo $row_danhmuc['id_danhmucbaiviet'] ?>"><?php echo $row_danhmuc['tendanhmuc_baiviet'] ?></option>
                <?php
                  }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Tình trạng:</label>
            <input type="text" class="form-control" id="tenbaiviet" name="tinhtrang" placeholder="Nhập tình trạng" required>
        </div>
        <button type="submit" name="btn_add" class="btn btn-primary">Lưu</button>
    </form>


        <div class="clear-both"></div>
    </div>
</form>


