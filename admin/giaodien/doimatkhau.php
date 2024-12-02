<?php
    $con = mysqli_connect("localhost", "root", "", "bannuocdb");
    $result = mysqli_query($con, "SELECT * FROM `taikhoang` WHERE `username` = '" . $_SESSION['user']."'");
    $taikhoang = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi Mật Khẩu</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center mb-0">Đổi Mật Khẩu</h2>
                    </div>
                    <div class="card-body">
                        <form name="taikhoang-formsua" 
                              method="POST" 
                              action="./xulythem.php?user=<?= htmlspecialchars($_SESSION['user'])?>" 
                              enctype="multipart/form-data">
                            
                            <div class="mb-3">
                                <label for="matkhaumoi" class="form-label">Mật khẩu mới</label>
                                <div class="input-group">
                                    <input type="password" 
                                           class="form-control" 
                                           id="matkhaumoi" 
                                           name="matkhaumoi" 
                                           placeholder="Nhập mật khẩu mới" 
                                           required 
                                           minlength="8">
                                    <button class="btn btn-outline-secondary" 
                                            type="button" 
                                            id="togglePassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                <div class="form-text">Mật khẩu phải có ít nhất 8 ký tự</div>
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" 
                                        name="btntkmk" 
                                        class="btn btn-primary">
                                    Lưu Mật Khẩu
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('matkhaumoi');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.querySelector('i').classList.toggle('bi-eye');
            this.querySelector('i').classList.toggle('bi-eye-slash');
        });
    </script>
</body>
</html>