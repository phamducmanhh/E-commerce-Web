<?php
require('../../db/config.php');

$code = isset($_GET['code']) ? intval($_GET['code']) : 0;

if ($code <= 0) {
    die('Mã đơn hàng không hợp lệ');
}

// Query to get order details
$stmt = $mysqli->prepare("
    SELECT 
        ct.id_hoadon,
        ct.id_sanpham,
        ct.so_luong,
        sp.ten_sp,
        sp.don_gia
    FROM cthoadon ct
    JOIN sanpham sp ON ct.id_sanpham = sp.id
    WHERE ct.id_hoadon = ?
    ORDER BY ct.id_hoadon ASC
");

$stmt->bind_param("i", $code);
$stmt->execute();
$result = $stmt->get_result();

// Calculate total
$total = 0;
$order_items = [];
while ($row = $result->fetch_assoc()) {
    $row['thanh_tien'] = $row['so_luong'] * $row['don_gia'];
    $total += $row['thanh_tien'];
    $order_items[] = $row;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn #<?= $code ?></title>
    <style>
        @media print {
            .no-print {
                display: none;
            }
            @page {
                margin: 0.5cm;
            }
        }
        
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 20px;
        }

        .company-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .order-info {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px 8px;
            text-align: center;
        }

        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .total-row {
            font-weight: bold;
            background-color: #f5f5f5;
        }

        .right {
            text-align: right;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            font-style: italic;
        }

        .print-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .print-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="no-print">
        <button onclick="window.print()" class="print-button">In hóa đơn</button>
    </div>

    <div class="header">
        <div class="company-name">CÔNG TY DKGENZ</div>
        <div>Địa chỉ: 217/10 Đường số 8, Quận Gò Vấp, TP.HCM</div>
        <div>Điện thoại: (+84) 38 3363 223</div>
        <h1>HÓA ĐƠN BÁN HÀNG</h1>
    </div>

    <div class="order-info">
        <p><strong>Mã đơn hàng:</strong> #<?= $code ?></p>
        <p><strong>Ngày:</strong> <?= date('d/m/Y') ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach ($order_items as $item): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= htmlspecialchars($item['ten_sp']) ?></td>
                <td><?= $item['so_luong'] ?></td>
                <td class="right"><?= number_format($item['don_gia']) ?> đ</td>
                <td class="right"><?= number_format($item['thanh_tien']) ?> đ</td>
            </tr>
            <?php endforeach; ?>

            <tr class="total-row">
                <td colspan="4" class="right">Tổng cộng:</td>
                <td class="right"><?= number_format($total) ?> đ</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p>Cảm ơn quý khách đã mua hàng tại cửa hàng của chúng tôi!</p>
        <p>Mọi thắc mắc xin vui lòng liên hệ: (+84) 38 3363 223</p>
        <p>Website: www.example.com</p>
    </div>

    <script>
        // Tự động in khi trang được tải (tùy chọn)
        // window.onload = function() {
        //     window.print();
        // }
    </script>
</body>
</html>