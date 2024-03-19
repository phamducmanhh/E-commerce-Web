
<?php
    include_once("./connect_db.php");
    if (!empty($_SESSION['nguoidung'])) {
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        $totalRecords = mysqli_query($con, "SELECT * FROM `cthoadon`,`sanpham` WHERE `id_sanpham`=`sanpham`.`id`  AND `id_hoadon`=" .$_GET['id']. "");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        $cthoadon = mysqli_query($con, "SELECT `id_hoadon`, `id_sanpham`, `cthoadon`.`so_luong`,`sanpham`.`id`,`ten_sp`,`don_gia`  FROM `cthoadon`,`sanpham` WHERE `id_sanpham`=`sanpham`.`id` AND `id_hoadon`=" .$_GET['id']. " ORDER BY `cthoadon`.`id_hoadon` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
        mysqli_close($con);
    ?>
<button ><a href="./admin.php?muc=1&tmuc=Hóa%20đơn"><-- Lùi</a></button>
<div class="clear-both"></div>
<div class="main-content">
            <h1>Chi tiết hóa đơn</h1>
            <div class="product-items">
                <div class="table-responsive-sm ">
                    <table class="table table-bordered table-striped table-hover">
                        <thead >
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            while ($row = mysqli_fetch_array($cthoadon)) {
                            ?>
                                <tr>                              
                                    <td><?= $row['ten_sp'] ?></td>
                                    <td><?= $row['so_luong'] ?></td>
                                    <td><?= $row['don_gia'] ?></td>                      
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