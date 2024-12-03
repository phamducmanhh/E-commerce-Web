<?php 
    $theloai = mysqli_query($con, "SELECT * FROM `theloai`");
    $nhacungcap = mysqli_query($con, "SELECT * FROM `nhacungcap`");

    if (!$theloai || !$nhacungcap) {
        die("Database query failed: " . mysqli_error($con));
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm Mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
    <style>
        .form-control:invalid {
            border-color: #dc3545;
            padding-right: calc(1.5em + 0.75rem);
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23dc3545' viewBox='0 0 16 16'%3E%3Cpath d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }
    </style>
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
                    <form name="product-formadd" id="productForm" method="POST" action="./xulythem.php" enctype="multipart/form-data" novalidate>
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="name" name="name" 
                                   required minlength="3" maxlength="255" 
                                   pattern="^[^\s].*[^\s]$"
                                   title="Tên sản phẩm không được chứa khoảng trắng ở đầu và cuối">
                            <div class="invalid-feedback">
                                Vui lòng nhập tên sản phẩm (3-255 ký tự)
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Giá sản phẩm</label>
                            <input type="number" class="form-control" id="price" name="price" 
                                   min="1" max="1000000000" step="0.01" required>
                            <div class="invalid-feedback">
                                Giá sản phẩm phải là số dương từ 1-1,000,000,000
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="soluong" class="form-label">Số lượng</label>
                            <input type="number" class="form-control" id="soluong" name="soluong" 
                                   min="0" max="10000" required>
                            <div class="invalid-feedback">
                                Số lượng phải từ 0-10,000
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Ảnh đại diện</label>
                            <input type="file" class="form-control" id="image" name="image" 
                                   accept="image/jpeg,image/png,image/gif" required>
                            <div class="invalid-feedback">
                                Vui lòng chọn ảnh đại diện (JPEG, PNG, GIF)
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="gallery" class="form-label">Thư viện ảnh</label>
                            <input type="file" class="form-control" id="gallery" name="gallery[]" 
                                   accept="image/jpeg,image/png,image/gif" multiple>
                        </div>

                        <div class="mb-3">
                            <label for="idtl" class="form-label">Thể loại</label>
                            <select class="form-select" id="idtl" name="idtl" required>
                                <option value="">Chọn thể loại</option>
                                <?php 
                                // Reset pointer to beginning of result set
                                mysqli_data_seek($theloai, 0);
                                while($row = mysqli_fetch_array($theloai)): ?>
                                    <option value="<?= htmlspecialchars($row['id']) ?>">
                                        <?= htmlspecialchars($row['id'] . ' - ' . $row['ten_tl']) ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                            <div class="invalid-feedback">
                                Vui lòng chọn thể loại
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="idncc" class="form-label">Nhà cung cấp</label>
                            <select class="form-select" id="idncc" name="idncc" required>
                                <option value="">Chọn nhà cung cấp</option>
                                <?php 
                                // Reset pointer to beginning of result set
                                mysqli_data_seek($nhacungcap, 0);
                                while($row = mysqli_fetch_array($nhacungcap)): ?>
                                    <option value="<?= htmlspecialchars($row['id']) ?>">
                                        <?= htmlspecialchars($row['id'] . ' - ' . $row['ten_ncc']) ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                            <div class="invalid-feedback">
                                Vui lòng chọn nhà cung cấp
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="product-content" class="form-label">Nội dung</label>
                            <textarea class="form-control" id="product-content" name="content" 
                                      required minlength="10" maxlength="5000"></textarea>
                            <div class="invalid-feedback">
                                Nội dung sản phẩm từ 10-5000 ký tự
                            </div>
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
    const form = document.getElementById('productForm');
    const priceInput = document.getElementById('price');
    const soluongInput = document.getElementById('soluong');
    const nameInput = document.getElementById('name');
    const contentInput = document.getElementById('product-content');

    // Prevent form submission with invalid data
    form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    });

    // Additional input validations
    priceInput.addEventListener('input', function() {
        const value = parseFloat(this.value);
        if (isNaN(value) || value <= 0) {
            this.setCustomValidity('Giá sản phẩm phải là số dương');
        } else {
            this.setCustomValidity('');
        }
    });

    soluongInput.addEventListener('input', function() {
        const value = parseInt(this.value);
        if (isNaN(value) || value < 0) {
            this.setCustomValidity('Số lượng phải là số không âm');
        } else {
            this.setCustomValidity('');
        }
    });

    // Initialize Summernote for rich text editing
    $('#product-content').summernote({
        placeholder: 'Nhập mô tả sản phẩm',
        tabsize: 2,
        height: 200,
        callbacks: {
            onChange: function(contents, $editable) {
                contentInput.value = contents;
                contentInput.dispatchEvent(new Event('input'));
            }
        }
    });
});
</script>
</body>
</html>