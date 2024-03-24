<?php
    include_once("./connect_db.php");
    if (!empty($_SESSION['nguoidung'])) {
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        $totalRecords = mysqli_query($con, "SELECT * FROM `khachhang`");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        $khachhang = mysqli_query($con, "SELECT * FROM `khachhang` ORDER BY `id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);

        mysqli_close($con);
    ?>
<div class="main-content">
            <h1>Khách hàng</h1>
            <div class="product-items">
                <div class="table-responsive-sm ">
                    <table class="table table-bordered table-striped table-hover">
                        <thead >
                            <tr>
                                <th>Tên khách hàng</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>SĐT</th>
                                <th>Số tiền đã mua hàng</th>
                                <th>Trạng thái</th>
                                <th>Thay đổi</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            while ($row = mysqli_fetch_array($khachhang)) {
                            ?>
                                <tr>                              
                                    <td><?= $row['ten_kh'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['dia_chi'] ?></td>
                                    <td><?= $row['phone'] ?></td>
                                    <td><?= $row['tong_tien_muahang'] ?></td>
                                    <td><form method="POST" action="./xulythem.php?id=<?= $row['id'] ?>">
                                        <input type="checkbox" name="trangthai"<?php if($row['trangthai']==0) echo "checked";?> >
                                    </td>
                                    <td><input type="submit" name="btnkhtt"value="Thay đổi"></td></form>                                
                                    <div class="clear-both"></div>
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php
        include './pagination.php';
        ?>
        <div class="clear-both"></div>
        </div>
    <?php
    }
    ?>