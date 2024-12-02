<?php
//session_start();

// For demonstration purposes, we will set a session variable manually.
// In your actual application, this should be set upon user login.
$_SESSION['idnhanvien'] = 1;
require_once("./connect_db.php");

if (isset($_SESSION['cart'])) {
    if (isset($_GET['xoa'])) {
        if (isset($_GET['id'])) {
            unset($_SESSION['cart'][$_GET['id']]);
        }
    }
    if (isset($_POST['update_click'])) {
        if (isset($_POST['qty'])) {
            foreach ($_POST['qty'] as $key => $val1) {
                $_SESSION['cart'][$key]['qty'] = $val1;
                if ($_SESSION['cart'][$key]['qty'] <= 0) {
                    unset($_SESSION['cart'][$key]);
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý giỏ hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .product-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
        .cart-form {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .order-form {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-5">
        <form action="./admin.php?act=ncccartlist" method="POST" class="cart-form p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Giỏ hàng</h2>
                <div class="btn-group">
                    <a href="./admin.php?muc=9&tmuc=Nhà%20cung%20cấp" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Quay lại
                    </a>
                    <button type="submit" name="update_click" class="btn btn-primary">
                        <i class="fas fa-sync-alt me-2"></i>Cập nhật
                    </button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>STT</th>
                            <th>ID</th>
                            <th>Hình ảnh</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stt = 0;
                        $total = 0;
                        foreach ($_SESSION['cart'] as $key => $val) {
                            $stt++;
                            $subtotal = $val['qty'] * $val['price'];
                            $total += $subtotal;
                        ?>
                            <tr>
                                <td><?php echo $stt ?></td>
                                <td><?php echo $key ?></td>
                                <td>
                                    <img src="../img/<?php echo $val['Pic'] ?>" class="product-img rounded" alt="Product Image">
                                </td>
                                <td><?php echo number_format($val['price'], 0, ',', '.') ?> đ</td>
                                <td>
                                    <input type="number" name="qty[<?php echo $key ?>]" value="<?php echo $val['qty'] ?>" 
                                           class="form-control" style="width: 100px" min="0">
                                </td>
                                <td><?php echo number_format($subtotal, 0, ',', '.') ?> đ</td>
                                <td>
                                    <a href="./admin.php?act=ncccartlist&xoa=y&id=<?php echo $key ?>" 
                                       class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-end fw-bold">Tổng tiền:</td>
                            <td colspan="2" class="fw-bold"><?php echo number_format($total, 0, ',', '.') ?> đ</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="order-form">
                <h4 class="mb-4">Thông tin đặt hàng</h4>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="namenv" name="namenv" required>
                            <label for="namenv">Tên cơ sở</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="sdt" name="sdt" 
                                   pattern="[0]{1}[0-9]{9}" placeholder="VD: 0123456789" required>
                            <label for="sdt">Số điện thoại</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="diachi" name="diachi" required>
                            <label for="diachi">Địa chỉ</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="ghichu" name="ghichu" style="height: 100px"></textarea>
                            <label for="ghichu">Ghi chú</label>
                        </div>
                    </div>
                </div>
                <div class="text-end mt-4">
                    <button type="submit" name="order_click" class="btn btn-success btn-lg">
                        <i class="fas fa-shopping-cart me-2"></i>Đặt hàng
                    </button>
                </div>
            </div>
        </form>

        <?php
        if (isset($_POST['order_click'])) {
            if (!empty($_POST['namenv']) && !empty($_POST['diachi']) && !empty($_POST['sdt'])) {
                if (isset($_SESSION['idnhanvien']) && !empty($_SESSION['idnhanvien'])) {
                    $products = mysqli_query($con, "SELECT * FROM `sanpham` WHERE `id` IN (" . implode(",", array_keys($_POST['qty'])) . ")");
                    $total = 0;
                    $orderProducts = array();
                    while ($row = mysqli_fetch_array($products)) {
                        $orderProducts[] = $row;
                        $total += $row['don_gia'] * $_POST['qty'][$row['id']];
                    }

                    try {
                        $result1 = mysqli_query($con, "INSERT INTO `phieunhap`(`id_nv`, `tong_tien`, `nguoi_nhan`, `sdt`, `diachi`, `ghichu`) 
                                                     VALUES ('" . $_SESSION['idnhanvien'] . "'," . $total . ",'" . $_POST['namenv'] . "','" . 
                                                     $_POST['sdt'] . "','" . $_POST['diachi'] . "','" . $_POST['ghichu'] . "')");
                        if (!$result1) {
                            throw new Exception(mysqli_error($con));
                        }
                        $id_phieunhap = mysqli_insert_id($con);

                        $insertString = "";
                        foreach ($orderProducts as $key => $product) {
                            $insertString .= "('" . $id_phieunhap . "', '" . $product['id'] . "', '" . $_POST['qty'][$product['id']] . "')";
                            if ($key != count($orderProducts) - 1) {
                                $insertString .= ",";
                            }
                            $result2 = mysqli_query($con, "UPDATE `sanpham` SET `so_luong`=`so_luong`+" . $_POST['qty'][$product['id']] . " WHERE `id`=" . $product['id']);
                        }

                        $insertOrder = mysqli_query($con, "INSERT INTO `ctphieunhap` (`id_phieunhap`, `id_sp`, `so_luong`) VALUES " . $insertString . "");

                        if ($insertOrder) {
                            $listcate = executeResult('SELECT * FROM `theloai` WHERE 1');
                            foreach ($listcate as $item) {
                                $tongsanphamtheoloai = executeSingleResult('SELECT SUM(so_luong) AS sl FROM sanpham WHERE id_the_loai=' . $item['id'])['sl'];
                                execute('UPDATE theloai SET tong_sp="' . $tongsanphamtheoloai . '" WHERE id=' . $item['id']);
                            }
                            unset($_SESSION['cart']);
                            ?>
                            <div class="alert alert-success mt-4" role="alert">
                                <h4 class="alert-heading"><i class="fas fa-check-circle me-2"></i>Đặt hàng thành công!</h4>
                                <p class="mb-0">Click <a href="./admin.php?muc=6&tmuc=Phiếu%20nhập" class="alert-link">vào đây</a> để xem chi tiết phiếu nhập.</p>
                            </div>
                            <?php
                        }
                    } catch (Exception $e) {
                        ?>
                        <div class="alert alert-danger mt-4" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>Lỗi: <?php echo $e->getMessage(); ?>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="alert alert-warning mt-4" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>Session variable 'idnhanvien' is not set or invalid.
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="alert alert-warning mt-4" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>Vui lòng nhập đủ thông tin!
                </div>
                <?php
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php 
} else { 
?>
    <div class="container py-5">
        <div class="text-center">
            <div class="mb-4">
                <i class="fas fa-shopping-cart fa-4x text-muted"></i>
            </div>
            <h2 class="mb-4">Không có sản phẩm nào trong giỏ hàng</h2>
            <a href="./admin.php?muc=9&tmuc=Nhà%20cung%20cấp" class="btn btn-primary">
                <i class="fas fa-list me-2"></i>Danh sách nhà cung cấp
            </a>
        </div>
    </div>
<?php 
}
?>