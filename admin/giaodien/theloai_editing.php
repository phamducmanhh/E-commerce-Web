<?php
if (!empty($_GET['id'])) {
    $result = mysqli_query($con, "SELECT * FROM `theloai` WHERE `id` = " . $_GET['id']);
    $theloai = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Thể Loại</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center mb-0">Sửa Thể Loại</h2>
                    </div>
                    <div class="card-body">
                        <form name="theloai-formsua" 
                              method="POST" 
                              action="./xulythem.php?id=<?= htmlspecialchars($_GET['id']) ?>" 
                              enctype="multipart/form-data">
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên thể loại</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="name" 
                                       name="name" 
                                       value="<?= htmlspecialchars(!empty($theloai) ? $theloai['ten_tl'] : "") ?>" 
                                       required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="ten_thuonghieu" class="form-label">Tên thương hiệu</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="ten_thuonghieu" 
                                       name="ten_thuonghieu" 
                                       value="<?= htmlspecialchars(!empty($theloai) ? $theloai['tenthuonghieu'] : "") ?>">
                            </div>
                            
                            <div class="mb-3">
                                <label for="image" class="form-label">Hình ảnh</label>
                                <?php if (!empty($product['image_theloai'])) { ?>
                                    <div class="mb-2">
                                        <img src="../img/<?= htmlspecialchars($product['image_theloai']) ?>" 
                                             class="img-fluid rounded" 
                                             style="max-width: 250px; max-height: 200px;" />
                                        <input type="hidden" 
                                               name="image" 
                                               value="<?= htmlspecialchars($product['image_theloai']) ?>" />
                                    </div>
                                <?php } ?>
                                <input type="file" 
                                       class="form-control" 
                                       id="image" 
                                       name="image">
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" 
                                        name="btntlsua" 
                                        class="btn btn-primary">
                                    Lưu Thể Loại
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