<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Thêm Thể Loại</title>
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Thêm Thể Loại</h2>
                    </div>
                    <div class="card-body">
                        <form name="theloai-formadd" method="POST" action="./xulythem.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Tên thể loại</label>
                                <input type="text" name="name" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tên thương hiệu</label>
                                <input type="text" name="ten_thuonghieu" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Hình ảnh</label>
                                <input type="file" name="image" class="form-control" accept="image/*" />
                            </div>
                            <button type="submit" name="btntladd" class="btn btn-primary w-100">Lưu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>