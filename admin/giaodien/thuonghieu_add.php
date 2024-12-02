<style>
        .form-group label {
            font-weight: bold;
        }
    </style>
<div class="container">
<h1 class="mt-5">Thêm Slider</h1>
    <form name="theloai-formadd" method="POST" action="giaodien/thuonghieu_xuly.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Ảnh thương hiệu</label>
            <input type="file" class="form-control-file" id="hinhanh" name="hinhanh" required>
        </div>
        <div class="form-group">
            <label for="">Tên thương hiệu</label>
            <input type="text" class="form-control" id="tenbaiviet" name="tenthuonghieu" placeholder="Nhập tên thương hiệu" required>
        </div>
        <div class="form-group">
            <label for="">Danh mục</label>
            <input type="text" class="form-control" id="tenbaiviet" name="tendanhmuc" placeholder="Nhập tên danh mục" required>
        </div>
        <button type="submit" name="btn_add" class="btn btn-primary">Lưu</button>
    </form>


        <div class="clear-both"></div>
    </div>
</form>


