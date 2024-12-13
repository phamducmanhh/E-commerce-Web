<?php
include_once("./connect_db.php");
if (!empty($_SESSION['nguoidung'])) {
    // Search functionality
    $search_query = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : '';
    
    // Pagination setup
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    
    // Base query for counting total records
    $total_query = "SELECT * FROM `sanpham`";
    
    // Add search condition if search query exists
    if (!empty($search_query)) {
        $total_query .= " WHERE `ten_sp` LIKE '%$search_query%' OR `id` LIKE '%$search_query%'";
    }
    
    $totalRecords = mysqli_query($con, $total_query);
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);

    // Sorting and search logic
    $sort = isset($_GET['sapxep']) ? $_GET['sapxep'] : 'idtang';
    
    // Determine sorting column and order
    $orderColumn = 'id';
    $orderDirection = 'ASC';
    
    switch($sort) {
        case 'idgiam': $orderColumn = 'id'; $orderDirection = 'DESC'; break;
        case 'idtang': $orderColumn = 'id'; $orderDirection = 'ASC'; break;
        case 'tengiam': $orderColumn = 'ten_sp'; $orderDirection = 'DESC'; break;
        case 'tentang': $orderColumn = 'ten_sp'; $orderDirection = 'ASC'; break;
        case 'tongiam': $orderColumn = 'so_luong'; $orderDirection = 'DESC'; break;
        case 'tontang': $orderColumn = 'so_luong'; $orderDirection = 'ASC'; break;
        case 'bangiam': $orderColumn = 'sl_da_ban'; $orderDirection = 'DESC'; break;
        case 'bantang': $orderColumn = 'sl_da_ban'; $orderDirection = 'ASC'; break;
    }

    // Base query for products
    $product_query = "SELECT * FROM `sanpham`";
    
    // Add search condition if search query exists
    if (!empty($search_query)) {
        $product_query .= " WHERE (`ten_sp` LIKE '%$search_query%' OR `id` LIKE '%$search_query%')";
    }
    
    // Add sorting
    $product_query .= " ORDER BY `$orderColumn` $orderDirection LIMIT $item_per_page OFFSET $offset";
    
    $products = mysqli_query($con, $product_query);
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
                        <div class="d-flex align-items-center">
                            <!-- Search Form -->
                            <form action="admin.php" method="get" class="me-3">
                                <input type="hidden" name="muc" value="4">
                                <input type="hidden" name="tmuc" value="Sản phẩm">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm" 
                                           name="search" value="<?= htmlspecialchars($search_query) ?>">
                                    <button class="btn btn-light" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                            <a href="admin.php?act=add" class="btn btn-light">
                                <i class="fas fa-plus me-2"></i>Thêm sản phẩm
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>
                                            Id 
                                            <span class="sort-icons">
                                                <a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=idgiam<?= $search_query ? '&search=' . urlencode($search_query) : '' ?>"><i class="fas fa-sort-down"></i></a>
                                                <a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=idtang<?= $search_query ? '&search=' . urlencode($search_query) : '' ?>"><i class="fas fa-sort-up"></i></a>
                                            </span>
                                        </th>
                                        <th>Ảnh</th>
                                        <th>
                                            Tên sản phẩm 
                                            <span class="sort-icons">
                                                <a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=tengiam<?= $search_query ? '&search=' . urlencode($search_query) : '' ?>"><i class="fas fa-sort-down"></i></a>
                                                <a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=tentang<?= $search_query ? '&search=' . urlencode($search_query) : '' ?>"><i class="fas fa-sort-up"></i></a>
                                            </span>
                                        </th>
                                        <th>
                                            Số lượng tồn 
                                            <span class="sort-icons">
                                                <a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=tongiam<?= $search_query ? '&search=' . urlencode($search_query) : '' ?>"><i class="fas fa-sort-down"></i></a>
                                                <a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=tontang<?= $search_query ? '&search=' . urlencode($search_query) : '' ?>"><i class="fas fa-sort-up"></i></a>
                                            </span>
                                        </th>
                                        <th>
                                            Số lượng bán 
                                            <span class="sort-icons">
                                                <a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=bangiam<?= $search_query ? '&search=' . urlencode($search_query) : '' ?>"><i class="fas fa-sort-down"></i></a>
                                                <a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=bantang<?= $search_query ? '&search=' . urlencode($search_query) : '' ?>"><i class="fas fa-sort-up"></i></a>
                                            </span>
                                        </th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Display search results or "No results" message
                                    if (mysqli_num_rows($products) > 0) {
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
                                    <?php 
                                        } 
                                    } else {
                                    ?>
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">Không tìm thấy sản phẩm nào</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?php 
                        // Update pagination to include search parameter
                        $pagination_params = $search_query ? '&search=' . urlencode($search_query) : '';
                        include './pagination.php'; 
                        ?>
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