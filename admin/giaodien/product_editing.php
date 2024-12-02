<?php
if (!empty($_GET['id'])) {
    $result = mysqli_query($con, "SELECT `sanpham`.`id`, `ten_sp`, `don_gia`, `hinh_anh`, `noi_dung`, `id_the_loai`, `id_nha_cc`, `so_luong`, `sl_da_ban`, `sanpham`.`ngay_tao`, `sanpham`.`ngay_sua`, `trangthai`,`theloai`.`id`,`theloai`.`ten_tl`,`nhacungcap`.`id`,`nhacungcap`.`ten_ncc` FROM `sanpham`,`theloai`,`nhacungcap` WHERE `sanpham`.`id`=".$_GET['id']." AND `sanpham`.`id_the_loai`=`theloai`.`id` AND `sanpham`.`id_nha_cc`=`nhacungcap`.`id`");
    $product = $result->fetch_assoc();
    $gallery = mysqli_query($con, "SELECT * FROM `hinhanhsp` WHERE `id_sp` = " . $_GET['id']);
    if (!empty($gallery) && !empty($gallery->num_rows)) {
        while ($row = mysqli_fetch_array($gallery)) {
            $product['gallery'][] = array(
                'id' => $row['id'],
                'path' => $row['hinh_anh']
            );
        }
    }
}

$theloai = mysqli_query($con,"SELECT * FROM `theloai`");
$nhacungcap = mysqli_query($con,"SELECT * FROM `nhacungcap`");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sản Phẩm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center mb-0">Sửa Sản Phẩm</h2>
                    </div>
                    <div class="card-body">
                        <form name="product-formsua" 
                              method="POST" 
                              action="./xulythem.php?act=sua&id=<?= htmlspecialchars($_GET['id']) ?>" 
                              enctype="multipart/form-data">
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Tên sản phẩm</label>
                                    <input type="text" 
                                           class="form-control" 
                                           id="name" 
                                           name="name" 
                                           value="<?= htmlspecialchars(!empty($product) ? $product['ten_sp'] : "") ?>" 
                                           required>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="price" class="form-label">Giá sản phẩm</label>
                                    <input type="number" 
                                           class="form-control" 
                                           id="price" 
                                           name="price" 
                                           value="<?= !empty($product) ? intval($product['don_gia']) : "" ?>" 
                                           required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="soluong" class="form-label">Số lượng</label>
                                    <input type="number" 
                                           class="form-control" 
                                           id="soluong" 
                                           name="soluong" 
                                           value="<?= !empty($product) ? $product['so_luong'] : "" ?>" 
                                           required>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="idtl" class="form-label">Thể loại</label>
                                    <select class="form-select" id="idtl" name="idtl" required>
                                        <option value="<?= $product['id_the_loai'] ?>">
                                            Hiện tại: <?= $product['id_the_loai'] ?> - <?= $product['ten_tl'] ?>
                                        </option>
                                        <?php while($row = mysqli_fetch_array($theloai)){ ?>
                                            <option value="<?= $row['id'] ?>">
                                                <?= $row['id'] ?> - <?= $row['ten_tl'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="idncc" class="form-label">Nhà cung cấp</label>
                                    <select class="form-select" id="idncc" name="idncc" required>
                                        <option value="<?= $product['id_nha_cc'] ?>">
                                            Hiện tại: <?= $product['id_nha_cc'] ?> - <?= $product['ten_ncc'] ?>
                                        </option>
                                        <?php while($row = mysqli_fetch_array($nhacungcap)){ ?>
                                            <option value="<?= $row['id'] ?>">
                                                <?= $row['id'] ?> - <?= $row['ten_ncc'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="trangthai" class="form-label">Trạng thái</label>
                                    <div class="form-check">
                                        <input class="form-check-input" 
                                               type="checkbox" 
                                               id="trangthai" 
                                               name="trangthai" 
                                               value="0"
                                               <?php echo ($product['trangthai']=='0') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="trangthai">
                                            Kích hoạt
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="image" class="form-label">Ảnh đại diện</label>
                                <?php if (!empty($product['hinh_anh'])) { ?>
                                    <div class="mb-2">
                                        <img src="../img/<?= htmlspecialchars($product['hinh_anh']) ?>" 
                                             class="img-fluid rounded" 
                                             style="max-width: 250px; max-height: 200px;" />
                                        <input type="hidden" 
                                               name="image" 
                                               value="<?= htmlspecialchars($product['hinh_anh']) ?>" />
                                    </div>
                                <?php } ?>
                                <input type="file" 
                                       class="form-control" 
                                       id="image" 
                                       name="image">
                            </div>
                            
                            <div class="mb-3">
                                <label for="gallery" class="form-label">Thư viện ảnh</label>
                                <?php if (!empty($product['gallery'])) { ?>
                                    <div class="row">
                                        <?php foreach ($product['gallery'] as $image) {
                                            if($image['path']!='') {?>
                                            <div class="col-md-4 mb-2">
                                                <div class="position-relative">
                                                    <img src="../img/<?= htmlspecialchars($image['path']) ?>" 
                                                         class="img-fluid rounded" 
                                                         style="max-width: 250px; max-height: 200px;" />
                                                    <a href="./admin.php?act=gallery_delete&id=<?= $image['id'] ?>" 
                                                       class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1">
                                                        Xóa
                                                    </a>
                                                </div>
                                            </div>
                                        <?php } }?>
                                    </div>
                                <?php } ?>
                                <?php if (isset($_GET['task']) && !empty($product['gallery'])) { ?>
                                    <?php foreach ($product['gallery'] as $image) { ?>
                                        <input type="hidden" 
                                               name="gallery_image[]" 
                                               value="<?= htmlspecialchars($image['path']) ?>" />
                                    <?php } ?>
                                <?php } ?>
                                <input multiple 
                                       type="file" 
                                       class="form-control" 
                                       id="gallery" 
                                       name="gallery[]">
                            </div>
                            
                            <div class="mb-3">
                                <label for="product-content" class="form-label">Nội dung</label>
                                <textarea name="content" 
                                          id="product-content" 
                                          class="form-control"><?= !empty($product) ? htmlspecialchars($product['noi_dung']) : "" ?></textarea>
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" 
                                        name="btnsua" 
                                        class="btn btn-primary">
                                    Lưu Sản Phẩm
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
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#product-content').summernote({
                height: 300,
                placeholder: 'Nhập nội dung sản phẩm',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });
        });
    </script>
</body>
</html>