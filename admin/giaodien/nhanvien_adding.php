<?php 
    $tk = mysqli_query($con, "SELECT `username` FROM `taikhoang` WHERE `taikhoang`.`trang_thai`=0 AND NOT EXISTS (SELECT `ten_dangnhap` FROM `nhanvien` WHERE `taikhoang`.`username`= `nhanvien`.`ten_dangnhap`)");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Nhân Viên</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center mb-0">Thêm Nhân Viên</h2>
                    </div>
                    <div class="card-body">
                        <form name="nhanvien-formadd" method="POST" action="./xulythem.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên nhân viên</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
                                <select class="form-select" id="tendangnhap" name="tendangnhap" required>
                                    <option value="">Chọn tên đăng nhập</option>
                                    <?php while($row = mysqli_fetch_array($tk)){ ?>
                                        <option value="<?= htmlspecialchars($row['username']) ?>">
                                            <?= htmlspecialchars($row['username']) ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="sdt" class="form-label">Số điện thoại</label>
                                <input type="tel" class="form-control" id="sdt" name="sdt" 
                                       pattern="[0]{1}[0-9]{9}" 
                                       placeholder="VD: 0123456789" 
                                       required>
                                <div class="form-text">Số điện thoại phải bắt đầu bằng 0 và có 10 chữ số</div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       placeholder="VD: lyphuc823@gmail.com" 
                                       required>
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" name="btnnvadd" class="btn btn-primary">
                                    Lưu Nhân Viên
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>