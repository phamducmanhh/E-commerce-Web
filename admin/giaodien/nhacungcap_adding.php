<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Thêm Nhà Cung Cấp</title>
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Thêm Nhà Cung Cấp</h2>
                    </div>
                    <div class="card-body">
                        <form name="nhacungcap-formadd" method="POST" action="./xulythem.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Tên nhà cung cấp</label>
                                <input type="text" name="name" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="VD: lyphuc823@gmail.com" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Website</label>
                                <input type="url" name="website" class="form-control" placeholder="VD: https://www.google.com" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Số điện thoại</label>
                                <input type="tel" name="sdt" class="form-control" pattern="[0]{1}[0-9]{9}" placeholder="VD: 0123456789" required />
                            </div>
                            <button type="submit" name="btnnccadd" class="btn btn-primary w-100">Lưu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>