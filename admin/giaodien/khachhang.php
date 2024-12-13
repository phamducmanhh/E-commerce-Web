<?php
include_once("./connect_db.php");
if (!empty($_SESSION['nguoidung'])) {
    // Search functionality
    $search_query = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : '';
    
    // Pagination setup
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    
    // Sorting logic
    $sort = isset($_GET['sapxep']) ? $_GET['sapxep'] : 'idtang';
    
    // Determine sorting column and order
    $orderColumn = 'id';
    $orderDirection = 'ASC';
    
    switch($sort) {
        case 'idgiam': $orderColumn = 'id'; $orderDirection = 'DESC'; break;
        case 'idtang': $orderColumn = 'id'; $orderDirection = 'ASC'; break;
        case 'tengiam': $orderColumn = 'ten_kh'; $orderDirection = 'DESC'; break;
        case 'tentang': $orderColumn = 'ten_kh'; $orderDirection = 'ASC'; break;
        case 'emailgiam': $orderColumn = 'email'; $orderDirection = 'DESC'; break;
        case 'emailtang': $orderColumn = 'email'; $orderDirection = 'ASC'; break;
        case 'tonggiam': $orderColumn = 'tong_tien_muahang'; $orderDirection = 'DESC'; break;
        case 'tongtang': $orderColumn = 'tong_tien_muahang'; $orderDirection = 'ASC'; break;
    }

    // Base query for counting total records
    $total_query = "SELECT * FROM `khachhang`";
    
    // Add search condition if search query exists
    if (!empty($search_query)) {
        $total_query .= " WHERE `ten_kh` LIKE '%$search_query%' 
                          OR `email` LIKE '%$search_query%' 
                          OR `phone` LIKE '%$search_query%' 
                          OR `dia_chi` LIKE '%$search_query%'";
    }
    
    $totalRecords = mysqli_query($con, $total_query);
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);

    // Base query for customers
    $customer_query = "SELECT * FROM `khachhang`";
    
    // Add search condition if search query exists
    if (!empty($search_query)) {
        $customer_query .= " WHERE (`ten_kh` LIKE '%$search_query%' 
                              OR `email` LIKE '%$search_query%' 
                              OR `phone` LIKE '%$search_query%' 
                              OR `dia_chi` LIKE '%$search_query%')";
    }
    
    // Add sorting
    $customer_query .= " ORDER BY `$orderColumn` $orderDirection LIMIT $item_per_page OFFSET $offset";
    
    $khachhang = mysqli_query($con, $customer_query);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Khách hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .table-hover tbody tr:hover {
            background-color: rgba(0,0,0,0.075);
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
                        <h2 class="mb-0">Danh sách Khách hàng</h2>
                        <div class="d-flex align-items-center">
                            <!-- Search Form -->
                            <form action="admin.php" method="get" class="me-3">
                                <input type="hidden" name="muc" value="5">
                                <input type="hidden" name="tmuc" value="Khách hàng">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm khách hàng" 
                                           name="search" value="<?= htmlspecialchars($search_query) ?>">
                                    <button class="btn btn-light" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
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
                                                <a href="./admin.php?muc=5&tmuc=Khách%20hàng&sapxep=idgiam<?= $search_query ? '&search=' . urlencode($search_query) : '' ?>"><i class="fas fa-sort-down"></i></a>
                                                <a href="./admin.php?muc=5&tmuc=Khách%20hàng&sapxep=idtang<?= $search_query ? '&search=' . urlencode($search_query) : '' ?>"><i class="fas fa-sort-up"></i></a>
                                            </span>
                                        </th>
                                        <th>
                                            Tên khách hàng 
                                            <span class="sort-icons">
                                                <a href="./admin.php?muc=5&tmuc=Khách%20hàng&sapxep=tengiam<?= $search_query ? '&search=' . urlencode($search_query) : '' ?>"><i class="fas fa-sort-down"></i></a>
                                                <a href="./admin.php?muc=5&tmuc=Khách%20hàng&sapxep=tentang<?= $search_query ? '&search=' . urlencode($search_query) : '' ?>"><i class="fas fa-sort-up"></i></a>
                                            </span>
                                        </th>
                                        <th>
                                            Email 
                                            <span class="sort-icons">
                                                <a href="./admin.php?muc=5&tmuc=Khách%20hàng&sapxep=emailgiam<?= $search_query ? '&search=' . urlencode($search_query) : '' ?>"><i class="fas fa-sort-down"></i></a>
                                                <a href="./admin.php?muc=5&tmuc=Khách%20hàng&sapxep=emailtang<?= $search_query ? '&search=' . urlencode($search_query) : '' ?>"><i class="fas fa-sort-up"></i></a>
                                            </span>
                                        </th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>
                                            Tổng tiền mua hàng 
                                            <span class="sort-icons">
                                                <a href="./admin.php?muc=5&tmuc=Khách%20hàng&sapxep=tonggiam<?= $search_query ? '&search=' . urlencode($search_query) : '' ?>"><i class="fas fa-sort-down"></i></a>
                                                <a href="./admin.php?muc=5&tmuc=Khách%20hàng&sapxep=tongtang<?= $search_query ? '&search=' . urlencode($search_query) : '' ?>"><i class="fas fa-sort-up"></i></a>
                                            </span>
                                        </th>
                                        <th>Trạng thái</th>
                                        <th>Sửa</th>
                                        <th>Thay đổi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Display search results or "No results" message
                                    if (mysqli_num_rows($khachhang) > 0) {
                                        while ($row = mysqli_fetch_array($khachhang)) {
                                    ?>
                                    <tr>                              
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['ten_kh'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td><?= $row['dia_chi'] ?></td>
                                        <td><?= $row['phone'] ?></td>
                                        <td><?= $row['tong_tien_muahang'] ?></td>
                                        <td>
                                            <span class="badge <?= $row['trangthai']=='0' ? 'bg-success' : 'bg-secondary' ?>">
                                                <?= $row['trangthai']=='0' ? 'Hoạt động' : 'Bị khóa' ?>
                                            </span>
                                        </td>
                                        <td>
                                        <input type="checkbox" class="form-check-input me-2" 
                                                           name="trangthai" 
                                                           <?php if($row['trangthai']==0) echo "checked";?>>
                                        </td>
                                        <td>
                                            <form method="POST" action="./xulythem.php?id=<?= $row['id'] ?>">
                                                <div class="d-flex align-items-center">
                                                    
                                                    <input type="submit" class="btn btn-sm btn-outline-primary" 
                                                           name="btnkhtt" value="Thay đổi">
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php 
                                        } 
                                    } else {
                                    ?>
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">Không tìm thấy khách hàng nào</td>
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