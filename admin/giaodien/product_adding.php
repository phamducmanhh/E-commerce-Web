<!-- if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['price']) && !empty($_POST['price']) && isset($_POST['idtl']) && !empty($_POST['idtl']) && isset($_POST['idncc']) && !empty($_POST['idncc'])) {
$sql = "INSERT INTO `sanpham` (`id`, `ten_sp`, `hinh_anh`, `don_gia`, `noi_dung`, `ngay_tao`, `ngay_sua`,`so_luong`,`id_the_loai`,`id_nha_cc`) VALUES (NULL, '" . $_POST['name'] . "','" . $image . "', " . str_replace('.', '', $_POST['price']) . ", '" . $_POST['content'] . "', " . time() . ", " . time() . ",0,'" . $_POST['idtl'] . "','" . $_POST['idncc'] . "');";
    
-->
<?php
$theloai = mysqli_query($con, "SELECT * FROM `theloai`");
$nhacungcap = mysqli_query($con, "SELECT * FROM `nhacungcap`");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .btnLuu {
            margin-top: 20px;
            width: 100%;
            padding: 10px 20px;
        }

        .wrap-field {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h1>Thêm sản phẩm</h1>
    <div class="box-contentt">
        <form name="product-formadd" method="POST" action="./xulythem.php" enctype="multipart/form-data">
            <div class="clear-both"></div>
            <div class="wrap-field form-group">
                <label>Tên sản phẩm: </label><br>
                <input class="form-control" type="text" name="name" value="" />
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Giá sản phẩm: </label>
                <input class="form-control" type="number" name="price" value="" />
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Ảnh đại diện: </label>
                <div class="wrap-field">
                    <input class="form-control" type="file" name="image" />
                </div>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Thư viện ảnh: </label>
                <div class="wrap-field">
                    <input class="form-control" multiple="" type="file" name="gallery[]" />
                </div>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>ID thể loại: </label>
                <select class="form-control" name="idtl"><?php while ($row = mysqli_fetch_array($theloai)) { ?><option value="<?= $row['id'] ?>"><?= $row['id'] ?> - <?= $row['ten_tl'] ?></option><?php } ?></select>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>ID nhà cung cấp: </label>
                <select class="form-control" name="idncc"><?php while ($row = mysqli_fetch_array($nhacungcap)) { ?><option value="<?= $row['id'] ?>"><?= $row['id'] ?> - <?= $row['ten_ncc'] ?></option><?php } ?></select>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Nội dung: </label>
                <textarea class="form-control" name="content" id="product-content"></textarea>
                <div class="clear-both"></div>
            </div>
            <input class="btn btn-success btnLuu" name="btnadd" type="submit" title="Lưu sản phẩm" value="Lưu" />
        </form>
        <div class="clear-both"></div>

    </div>
</body>

</html>