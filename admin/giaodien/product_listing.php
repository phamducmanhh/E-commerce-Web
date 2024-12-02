<?php
include_once("./connect_db.php");
if (!empty($_SESSION['nguoidung'])) {
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    $totalRecords = mysqli_query($con, "SELECT * FROM `sanpham`");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);

    // Sorting logic remains the same
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
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .table-hover tbody tr:hover {
            background-color: rgba(0,0,0,0.075);
        }
        .product-image {
            object-fit: cover;
            width: 100px;
            height: 100px;
            border-radius: 8px;
        }
        .action-links a {
            text-decoration: none;
            margin-right: 10px;
        }
        .sort-icons {
            margin-left: 5px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container-fluid px-4 py-3">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Danh sách sản phẩm</h2>
                        <a href="admin.php?act=add" class="btn btn-light">
                            <i class="fas fa-plus me-2"></i>Thêm sản phẩm
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>
                                            Id 
                                            <span class="sort-icons">
                                                <a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=idgiam"><i class="fas fa-sort-down"></i></a>
                                                <a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=idtang"><i class="fas fa-sort-up"></i></a>
                                            </span>
                                        </th>
                                        <th>Ảnh</th>
                                        <th>
                                            Tên sản phẩm 
                                            <span class="sort-icons">
                                                <a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=tengiam"><i class="fas fa-sort-down"></i></a>
                                                <a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=tentang"><i class="fas fa-sort-up"></i></a>
                                            </span>
                                        </th>
                                        <th>
                                            Số lượng tồn 
                                            <span class="sort-icons">
                                                <a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=tongiam"><i class="fas fa-sort-down"></i></a>
                                                <a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=tontang"><i class="fas fa-sort-up"></i></a>
                                            </span>
                                        </th>
                                        <th>
                                            Số lượng bán 
                                            <span class="sort-icons">
                                                <a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=bangiam"><i class="fas fa-sort-down"></i></a>
                                                <a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=bantang"><i class="fas fa-sort-up"></i></a>
                                            </span>
                                        </th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($products)) {
                                    ?>
                                    <tr>         
                                        <td><?= $row['id'] ?></td>                     
                                        <td>
                                            <img class="product-image" src="../img/<?= $row['hinh_anh'] ?>" alt="<?= $row['ten_sp'] ?>"/>
                                        </td>
                                        <td><?= $row['ten_sp'] ?></td>
                                        <td><?= $row['so_luong'] ?></td>
                                        <td><?= $row['sl_da_ban'] ?></td>
                                        <td>
                                            <span class="badge <?= $row['trangthai']=='0' ? 'bg-success' : 'bg-secondary' ?>">
                                                <?= $row['trangthai']=='0' ? 'Hiển thị' : 'Bị ẩn' ?>
                                            </span>
                                        </td>
                                        <td class="action-links text-center">
                                            <a href="admin.php?act=sua&id=<?= $row['id'] ?>" class="text-primary" title="Sửa">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="giaodien/product_xuly.php?id=<?= $row['id'] ?>" 
                                               class="text-danger" 
                                               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');" 
                                               title="Xóa">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?php include './pagination.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php 
    mysqli_close($con);
}
?>