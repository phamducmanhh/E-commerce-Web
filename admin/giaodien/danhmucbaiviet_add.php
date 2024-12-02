<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Danh Mục Bài Viết</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center mb-0">Thêm Danh Mục Bài Viết</h2>
                    </div>
                    <div class="card-body">
                        <form name="theloai-formadd" 
                              method="POST" 
                              action="giaodien/xulydanhmucbaiviet.php" 
                              enctype="multipart/form-data">
                            
                            <div class="mb-3">
                                <label for="tendanhmuc_bv" class="form-label">Tên danh mục bài viết</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="tendanhmuc_bv" 
                                       name="tendanhmuc_bv" 
                                       required 
                                       placeholder="Nhập tên danh mục">
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" 
                                        name="btn_add" 
                                        class="btn btn-primary">
                                    Lưu Danh Mục
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
</body>
</html>