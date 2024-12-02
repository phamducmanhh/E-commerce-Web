<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Thêm Tài Khoản</title>
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Thêm Tài Khoản</h2>
                    </div>
                    <div class="card-body">
                        <form name="taikhoan-formadd" method="POST" action="./xulythem.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Tài khoản</label>
                                <input type="text" name="tendangnhap" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mật khẩu</label>
                                <input type="password" name="matkhau" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Họ và tên</label>
                                <input type="text" name="name" class="form-control" required />
                            </div>
                            <button type="submit" name="btntkadd" class="btn btn-primary w-100">Lưu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>