<?php
    include_once("./connect_db.php");
    if (!empty($_SESSION['nguoidung'])) {
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        $totalRecords = mysqli_query($con, "SELECT * FROM `sanpham` WHERE `id_nha_cc` = " . $_GET['id']."");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        $sanpham = mysqli_query($con, "SELECT * FROM `sanpham` WHERE `id_nha_cc` = " . $_GET['id']." ORDER BY `id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset."");
        mysqli_close($con);
    ?>
<div class="main-content">
            <h1>Nhà cung cấp</h1>
            <div class="product-items">
            <div class="buttons">
            <form name="nhacungcap-formdat" method="POST" action="./admin.php?act=ncccartlist&idncc=<?= $_GET['id']?>" enctype="multipart/form-data">
            <input name="btnnccdat" type="submit" title="Lưu nhà cung cấp" value="Giỏ hàng" /></a>
                </div>
                <div class="table-responsive-sm ">
                    <table class="table table-bordered table-striped table-hover">
                        <thead >
                            <tr>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng tồn</th>
                                <th>Thêm</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            while ($row = mysqli_fetch_array($sanpham)) {
                            ?>
                                <tr>                              
                                    <td><img style="width: 100px;height: 100px " src=".././img/<?= $row['hinh_anh'] ?>"></td>
                                    <td><?= $row['ten_sp'] ?></td>
                                    <td><?= $row['don_gia'] ?></td>
                                    <td><?= $row['so_luong'] ?></td>
                                    <td>
                                        <a href="./admin.php?act=ncccart&id=<?= $row['id']?>&idncc=<?= $_GET['id']?>">Thêm vào giỏ</a>
                                    <div class="clear-both"></div>
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php
        include './pagination2.php';
        ?>
        <div class="clear-both"></div>
        </div>
    <?php
    }
    ?>