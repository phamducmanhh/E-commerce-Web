<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/admin_style.css">
</head>

<body>
    <?php
    include_once("./connect_db.php");
    if (!empty($_SESSION['nguoidung'])) {
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        $totalRecords = mysqli_query($con, "SELECT * FROM `sanpham`");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        $products = mysqli_query($con, "SELECT * FROM `sanpham` ORDER BY `id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
        if(isset($_GET['sapxep'])){
            if($_GET['sapxep']=='idgiam')
            $products = mysqli_query($con, "SELECT * FROM `sanpham` ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if($_GET['sapxep']=='idtang')
            $products = mysqli_query($con, "SELECT * FROM `sanpham` ORDER BY `id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if($_GET['sapxep']=='tengiam')
            $products = mysqli_query($con, "SELECT * FROM `sanpham` ORDER BY `ten_sp` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if($_GET['sapxep']=='tentang')
            $products = mysqli_query($con, "SELECT * FROM `sanpham` ORDER BY `ten_sp` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if($_GET['sapxep']=='tongiam')
            $products = mysqli_query($con, "SELECT * FROM `sanpham` ORDER BY `so_luong` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if($_GET['sapxep']=='tontang')
            $products = mysqli_query($con, "SELECT * FROM `sanpham` ORDER BY `so_luong` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if($_GET['sapxep']=='bangiam')
            $products = mysqli_query($con, "SELECT * FROM `sanpham` ORDER BY `sl_da_ban` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if($_GET['sapxep']=='bantang')
            $products = mysqli_query($con, "SELECT * FROM `sanpham` ORDER BY `sl_da_ban` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
        }
        mysqli_close($con);
    ?>
        <div class="main-content">
            <h1>Danh sách sản phẩm</h1>
            <div class="product-items">
                <div class="buttons">
                    <a href="admin.php?act=add">Thêm sản phẩm</a>
                </div>
                <div class="table-responsive-sm ">
                    <table class="table table-bordered table-striped table-hover">
                        <thead >
                            <tr>
                                <th>Id<a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=idgiam"><i class="fa fa-arrow-down"></i></a><a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=idtang"><i class="fa fa-arrow-up"></i></a></th>
                                <th>Ảnh </th>
                                <th>Tên sản phẩm<a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=tengiam"><i class="fa fa-arrow-down"></i></a><a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=tentang"><i class="fa fa-arrow-up"></i></a></th>
                                <th>Số lượng tồn<a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=tongiam"><i class="fa fa-arrow-down"></i></a><a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=tontang"><i class="fa fa-arrow-up"></i></a></th>
                                <th>Số lượng bán<a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=bangiam"><i class="fa fa-arrow-down"></i></a><a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=bantang"><i class="fa fa-arrow-up"></i></a></th>
                                <th>Trạng thái</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            while ($row = mysqli_fetch_array($products)) {
                            ?>
                                <tr>         
                                    <td><?= $row['id'] ?></td>                     
                                    <td><img  style="width: 100px;height: 100px " src="../img/<?= $row['hinh_anh'] ?>" />
                                        <?php !empty($row['name']) ? $row['name'] : '' ?></td>
                                    <td><?= $row['ten_sp'] ?></td>
                                    <td><?= $row['so_luong'] ?>
                                    </td>
                                    <td><?= $row['sl_da_ban'] ?></td>
                                    <td><?php if($row['trangthai']=='0')echo "Hiển thị";else echo "Bị ẩn" ?></td>
                                    <td><a href="admin.php?act=sua&id=<?= $row['id'] ?>">Sửa</a></td>
                                    <td><?php if($row['trangthai']=='1'){?><a href="admin.php?act=xoa&id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');">Xóa</a><?php }?></td>                                  
                                    <div class="clear-both"></div>
                                </tr><?php } ?>
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
</body>

</html>