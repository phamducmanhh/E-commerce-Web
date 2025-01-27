<?php
// Database Connection Configuration
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'bannuocdb';

// Database Connection and Query Execution Function
function executeQuery($host, $user, $password, $db, $strSQL) {
    $con = mysqli_connect($host, $user, $password, $db);
    if (!$con) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    $result = mysqli_query($con, $strSQL);
    mysqli_close($con);
    return $result;
}

// Route Handling and Month/Year Selection
$month2 = date('m'); // Default to current month
$year2 = date('Y'); // Default to current year

if (isset($_GET['month2']) && isset($_GET['year2'])) {
    // Validate month and year inputs
    $month2 = filter_var($_GET['month2'], FILTER_VALIDATE_INT, 
        ['options' => ['min_range' => 1, 'max_range' => 12]]) 
        ?: date('m');
    $year2 = filter_var($_GET['year2'], FILTER_VALIDATE_INT, 
        ['options' => ['min_range' => 2000, 'max_range' => date('Y')]]) 
        ?: date('Y');
}

// Queries for Dashboard Charts - Updated to include year filtering
$queries = [
    'customerTotals' => "SELECT id_khachhang, SUM(tong_tien) AS total 
        FROM hoadon 
        WHERE MONTH(ngay_tao) = '$month2' AND YEAR(ngay_tao) = '$year2'
        GROUP BY id_khachhang",
    
    'categoryTotals' => "SELECT theloai.ten_tl, 
        SUM(cthoadon.so_luong * sanpham.don_gia) AS tong 
        FROM cthoadon 
        JOIN hoadon ON hoadon.id = cthoadon.id_hoadon 
        JOIN sanpham ON cthoadon.id_sanpham = sanpham.id 
        JOIN theloai ON sanpham.id_the_loai = theloai.id
        WHERE MONTH(hoadon.ngay_tao) = '$month2' AND YEAR(hoadon.ngay_tao) = '$year2'
        GROUP BY theloai.ten_tl",
    
    'businessOverview' => "SELECT sanpham.id, 
        SUM(cthoadon.so_luong * sanpham.don_gia) as tongtien 
        FROM hoadon 
        JOIN cthoadon ON hoadon.id = cthoadon.id_hoadon 
        JOIN sanpham ON cthoadon.id_sanpham = sanpham.id 
        WHERE MONTH(hoadon.ngay_tao) = '$month2' AND YEAR(hoadon.ngay_tao) = '$year2'
        GROUP BY sanpham.id",
    
    'topProducts' => "SELECT 
    sp.id_sanpham, 
    sanpham.ten_sp as product_name, 
    MAX(sp.tong) as max_tong
    FROM (
        SELECT cthoadon.id_sanpham, 
               SUM(cthoadon.so_luong * sanpham.don_gia) as tong
        FROM cthoadon 
        JOIN hoadon ON cthoadon.id_hoadon = hoadon.id 
        JOIN sanpham ON cthoadon.id_sanpham = sanpham.id 
        WHERE MONTH(hoadon.ngay_tao) = '$month2' AND YEAR(hoadon.ngay_tao) = '$year2'
        GROUP BY cthoadon.id_sanpham
    ) as sp
    JOIN sanpham ON sp.id_sanpham = sanpham.id
    GROUP BY sp.id_sanpham, sanpham.ten_sp"
];

// Execute Queries and Process Results
$results = [];
foreach ($queries as $key => $query) {
    $result = executeQuery($host, $user, $password, $db, $query);
    $results[$key] = [];
    
    while($item = mysqli_fetch_assoc($result)) {
        switch($key) {
            case 'customerTotals':
                $results[$key]['labels'][] = $item['id_khachhang'];
                $results[$key]['data'][] = $item['total'];
                break;
            case 'categoryTotals':
                $results[$key]['labels'][] = $item['ten_tl'];
                $results[$key]['data'][] = $item['tong'];
                break;
            case 'businessOverview':
                $results[$key]['labels'][] = $item['id'];
                $results[$key]['data'][] = $item['tongtien'];
                break;
            case 'topProducts':
                $results[$key]['labels'][] = $item['product_name'];
                $results[$key]['data'][] = $item['max_tong'];
                break;
        }
    }
}

// Check for AJAX Request
$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
          && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

if($isAjax) {
    header('Content-Type: application/json');
    echo json_encode([
        'customerTotals' => $results['customerTotals'],
        'categoryTotals' => $results['categoryTotals'],
        'businessOverview' => $results['businessOverview'],
        'topProducts' => $results['topProducts'],
        'currentMonth' => $month2,
        'currentYear' => $year2
    ]);
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Báo Cáo Thống Kê - Tháng <?php echo $month2; ?> Năm <?php echo $year2; ?></title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            position: relative;
            height: 400px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-12 d-flex align-items-center">
            <select id="monthSelector" class="form-control w-25 mr-2">
                <?php for($m=1; $m<=12; $m++): ?>
                    <option value="<?php echo $m; ?>" <?php echo ($m == $month2) ? 'selected' : ''; ?>>
                        Tháng <?php echo $m; ?>
                    </option>
                <?php endfor; ?>
            </select>
            <select id="yearSelector" class="form-control w-25 ml-2">
                <?php 
                $currentYear = date('Y');
                for($y = $currentYear - 10; $y <= $currentYear; $y++): ?>
                    <option value="<?php echo $y; ?>" <?php echo ($y == $year2) ? 'selected' : ''; ?>>
                        Năm <?php echo $y; ?>
                    </option>
                <?php endfor; ?>
            </select>
            <button id="searchButton" class="btn btn-primary ml-2">Tìm Kiếm</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Tổng Tiền Hóa Đơn Theo Khách Hàng</div>
                <div class="card-body chart-container">
                    <canvas id="customerChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Thống Kê Tổng Tiền Theo Thể Loại</div>
                <div class="card-body chart-container">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Thống Kê Tình Hình Doanh Thu</div>
                <div class="card-body chart-container">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Sản Phẩm Bán Chạy Nhất</div>
                <div class="card-body chart-container">
                    <canvas id="topProductChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    const colorPalettes = {
        customerChart: 'rgba(75, 192, 192, 0.6)',
        categoryChart: [
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)'
        ],
        revenueChart: 'rgba(255, 99, 132, 1)',
        topProductChart: 'rgba(54, 162, 235, 0.6)'
    };

    let customerChart, categoryChart, revenueChart, topProductChart;

    function initCharts(data) {
        // Customer Chart
        if (customerChart) customerChart.destroy();
        customerChart = new Chart(document.getElementById('customerChart'), {
            type: 'bar',
            data: {
                labels: data.customerTotals.labels,
                datasets: [{
                    label: 'Tổng Tiền',
                    data: data.customerTotals.data,
                    backgroundColor: colorPalettes.customerChart
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Category Chart
        if (categoryChart) categoryChart.destroy();
        categoryChart = new Chart(document.getElementById('categoryChart'), {
            type: 'pie',
            data: {
                labels: data.categoryTotals.labels,
                datasets: [{
                    data: data.categoryTotals.data,
                    backgroundColor: colorPalettes.categoryChart
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Revenue Chart
        if (revenueChart) revenueChart.destroy();
        revenueChart = new Chart(document.getElementById('revenueChart'), {
            type: 'line',
            data: {
                labels: data.businessOverview.labels,
                datasets: [{
                    label: 'Doanh Thu',
                    data: data.businessOverview.data,
                    borderColor: colorPalettes.revenueChart,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Top Product Chart
        if (topProductChart) topProductChart.destroy();
        topProductChart = new Chart(document.getElementById('topProductChart'), {
            type: 'bar',
            data: {
                labels: data.topProducts.labels,
                datasets: [{
                    label: 'Doanh Số Sản Phẩm',
                    data: data.topProducts.data,
                    backgroundColor: colorPalettes.topProductChart
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    }

    // Initial Chart Loading
    initCharts({
        customerTotals: {
            labels: <?php echo json_encode($results['customerTotals']['labels'] ?? []); ?>,
            data: <?php echo json_encode($results['customerTotals']['data'] ?? []); ?>
        },
        categoryTotals: {
            labels: <?php echo json_encode($results['categoryTotals']['labels'] ?? []); ?>,
            data: <?php echo json_encode($results['categoryTotals']['data'] ?? []); ?>
        },
        businessOverview: {
            labels: <?php echo json_encode($results['businessOverview']['labels'] ?? []); ?>,
            data: <?php echo json_encode($results['businessOverview']['data'] ?? []); ?>
        },
        topProducts: {
            labels: <?php echo json_encode($results['topProducts']['labels'] ?? []); ?>,
            data: <?php echo json_encode($results['topProducts']['data'] ?? []); ?>
        }
    });

    // Search Button Handler
    function loadMonthlyData() {
        const selectedMonth = $('#monthSelector').val();
        const selectedYear = $('#yearSelector').val();
        
        // Construct URL
        const currentPath = window.location.pathname.replace(/\/[^/]+$/, '');
        const newUrl = `${currentPath}/admin.php?muc=15&tmuc=Thống%20kê&month2=${selectedMonth}&year2=${selectedYear}`;
        
        // Update browser history
        history.pushState({}, '', newUrl);
        
        $.ajax({
            url: window.location.href,
            method: 'GET',
            data: { 
                month2: selectedMonth,
                year2: selectedYear 
            },
            dataType: 'json',
            success: function(response) {
                if (response && response.customerTotals) {
                    initCharts(response);
                    document.title = `Báo Cáo Thống Kê - Tháng ${selectedMonth} Năm ${selectedYear}`;
                } else {
                    alert('Không tìm thấy dữ liệu cho tháng và năm này');
                }
            },
            error: function(xhr, status, error) {
                console.error("Chi tiết lỗi:", xhr.responseText, status, error);
                try {
                    const response = JSON.parse(xhr.responseText);
                    if (response && response.customerTotals) {
                        initCharts(response);
                        document.title = `Báo Cáo Thống Kê - Tháng ${selectedMonth} Năm ${selectedYear}`;
                    }
                } catch(e) {
                    console.error('Parsing error:', e);
                }
            }
        });
    }

    // Attach handler to search button
    $('#searchButton').click(loadMonthlyData);

    // Allow Enter key in month/year selectors
    $('#monthSelector, #yearSelector').keypress(function(e) {
        if (e.which == 13) { // Enter key
            loadMonthlyData();
        }
    });
});
</script>
</body>
</html>