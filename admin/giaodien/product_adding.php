<?php 
    $theloai = mysqli_query($con, "SELECT * FROM `theloai`");
    $nhacungcap = mysqli_query($con, "SELECT * FROM `nhacungcap`");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm Mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Thêm Sản Phẩm Mới</h2>
                </div>
                <div class="card-body">
                    <form name="product-formadd" method="POST" action="./xulythem.php" enctype="multipart/form-data" novalidate>
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <div class="invalid-feedback">Vui lòng nhập tên sản phẩm</div>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Giá sản phẩm</label>
                            <input type="number" class="form-control" id="price" name="price" min="0" required>
                            <div class="invalid-feedback">Vui lòng nhập giá hợp lệ</div>
                        </div>

                        <div class="mb-3">
                            <label for="soluong" class="form-label">Số lượng</label>
                            <input type="number" class="form-control" id="soluong" name="soluong" min="0" required>
                            <div class="invalid-feedback">Vui lòng nhập số lượng</div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Ảnh đại diện</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                            <div class="invalid-feedback">Vui lòng chọn ảnh đại diện</div>
                        </div>

                        <div class="mb-3">
                            <label for="gallery" class="form-label">Thư viện ảnh</label>
                            <input type="file" class="form-control" id="gallery" name="gallery[]" accept="image/*" multiple>
                        </div>

                        <div class="mb-3">
                            <label for="idtl" class="form-label">Thể loại</label>
                            <select class="form-select" id="idtl" name="idtl" required>
                                <option value="">Chọn thể loại</option>
                                <?php while($row = mysqli_fetch_array($theloai)): ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['id'] ?> - <?= $row['ten_tl'] ?></option>
                                <?php endwhile; ?>
                            </select>
                            <div class="invalid-feedback">Vui lòng chọn thể loại</div>
                        </div>

                        <div class="mb-3">
                            <label for="idncc" class="form-label">Nhà cung cấp</label>
                            <select class="form-select" id="idncc" name="idncc" required>
                                <option value="">Chọn nhà cung cấp</option>
                                <?php while($row = mysqli_fetch_array($nhacungcap)): ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['id'] ?> - <?= $row['ten_ncc'] ?></option>
                                <?php endwhile; ?>
                            </select>
                            <div class="invalid-feedback">Vui lòng chọn nhà cung cấp</div>
                        </div>

                        <div class="mb-3">
                            <label for="product-content" class="form-label">Nội dung</label>
                            <textarea class="form-control" id="product-content" name="content" required></textarea>
                            <div class="invalid-feedback">Vui lòng nhập nội dung sản phẩm</div>
                        </div>

                        <div class="text-center">
                            <button type="submit" name="btnadd" class="btn btn-primary">Lưu sản phẩm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Custom form validation
    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    });

    // Initialize Summernote for rich text editing
    $('#product-content').summernote({
        placeholder: 'Nhập mô tả sản phẩm',
        tabsize: 2,
        height: 200
    });
});
</script>
</body>
</html>