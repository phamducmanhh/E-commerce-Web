<?php
if (!empty($_GET['id'])) {
    // $result = mysqli_query($con, "SELECT * FROM `sanpham` WHERE `sanpham`.`id`=".$_GET['id']."");
    $result = mysqli_query($con, "SELECT `sanpham`.`id`, `ten_sp`, `don_gia`, `hinh_anh`, `noi_dung`, `id_the_loai`, `id_nha_cc`, `so_luong`, `sl_da_ban`, `sanpham`.`ngay_tao`, `sanpham`.`ngay_sua`, `trangthai`,`theloai`.`id`,`theloai`.`ten_tl`,`nhacungcap`.`id`,`nhacungcap`.`ten_ncc` FROM `sanpham`,`theloai`,`nhacungcap` WHERE `sanpham`.`id`=" . $_GET['id'] . " AND `sanpham`.`id_the_loai`=`theloai`.`id` AND `sanpham`.`id_nha_cc`=`nhacungcap`.`id`");
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

    <h1>Sửa sản phẩm</h1>
    <div class="box-contentt">
        <form name="product-formsua" method="POST" action="./xulythem.php?act=sua&id=<?= $_GET['id'] ?>" enctype="multipart/form-data">

            <div class="clear-both"></div>
            <div class="wrap-field">
                <label>Tên sản phẩm: </label>
                <input class="form-control" type="text" name="name" value="<?= (!empty($product) ? $product['ten_sp'] : "") ?>" />
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Giá sản phẩm: </label>
                <input class="form-control" type="number" name="price" value="<?= (!empty($product) ? number_format($product['don_gia'], 0, ",", ".") : "") ?>" />
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Ảnh đại diện: </label>
                <div class="wrap-field">
                    <?php if (!empty($product['hinh_anh'])) { ?>
                        <img style="width: 250px;height: 200px;" src="../img/<?= $product['hinh_anh'] ?>" /><br />
                        <input class="form-control" type="hidden" name="image" value="<?= $product['hinh_anh'] ?>" />
                    <?php } ?>
                    <input class="form-control" type="file" name="image" />
                </div>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Thư viện ảnh: </label>
                <div class="wrap-field">
                    <?php if (!empty($product['gallery'])) { ?>
                        <ul>
                            <?php foreach ($product['gallery'] as $image) {
                                if ($image['path'] != '') { ?>
                                    <li>
                                        <img style="width: 250px;height: 200px;" src="../img/<?= $image['path'] ?>" />
                                        <a href="./admin.php?act=gallery_delete&id=<?= $image['id'] ?>">Xóa</a>
                                    </li>
                            <?php }
                            } ?>
                        </ul>
                    <?php } ?>
                    <?php if (isset($_GET['task']) && !empty($product['gallery'])) { ?>
                        <?php foreach ($product['gallery'] as $image) { ?>
                            <input class="form-control" type="hidden" name="gallery_image[]" value="<?= $image['path'] ?>" />
                        <?php } ?>
                    <?php } ?>
                    <input class="form-control" multiple="" type="file" name="gallery[]" />
                </div>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>ID thể loại: </label>
                <select class="form-control" name="idtl">
                    <option value="<?= $product['id_the_loai'] ?>">ID hiện tại: <?= $product['id_the_loai'] ?> - <?= $product['ten_tl'] ?></option><?php while ($row = mysqli_fetch_array($theloai)) { ?><option value="<?= $row['id'] ?>"><?= $row['id'] ?> - <?= $row['ten_tl'] ?></option><?php } ?>
                </select>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>ID nhà cung cấp: </label>
                <select class="form-control" name="idncc">
                    <option value="<?= $product['id_nha_cc'] ?>">ID hiện tại: <?= $product['id_nha_cc'] ?> - <?= $product['ten_ncc'] ?></option><?php while ($row = mysqli_fetch_array($nhacungcap)) { ?><option value="<?= $row['id'] ?>"><?= $row['id'] ?> - <?= $row['ten_ncc'] ?></option><?php } ?>
                </select>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Nội dung: </label>
                <textarea class="form-control" name="content" id="product-content"> <?= (!empty($product) ? $product['noi_dung'] : "") ?></textarea>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Trạng thái: </label>
                <input type="checkbox" name="trangthai" value="<?= $product['trangthai'] ?>" <?php if ($product['trangthai'] == '0') echo "checked" ?> />
                <div class="clear-both"></div>
            </div>
            <div class="clear-both"></div>
            <input class="btnLuu btn btn-success" name="btnsua" type="submit" title="Lưu sản phẩm" value="Lưu" />
    </div>
    </form>
</body>

</html>