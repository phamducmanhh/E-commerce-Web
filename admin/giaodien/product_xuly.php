<?php
// Kết nối database và các file cấu hình
include_once("../config.php");
include_once("../connect_db.php");

// Hàm upload ảnh
function uploadImage($imageFile) {
    $uploadDir = "../img/";
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

    // Kiểm tra file ảnh
    if (!in_array($imageFile['type'], $allowedTypes)) {
        return false;
    }

    // Tạo tên file duy nhất
    $fileName = uniqid() . '_' . basename($imageFile['name']);
    $uploadPath = $uploadDir . $fileName;

    // Di chuyển file
    if (move_uploaded_file($imageFile['tmp_name'], $uploadPath)) {
        return $fileName;
    }

    return false;
}

// Xử lý thêm sản phẩm
function themSanPham($mysqli) {
    if (isset($_POST['btnadd'])) {
        $tenSp = mysqli_real_escape_string($mysqli, $_POST['name']);
        $giaBan = mysqli_real_escape_string($mysqli, $_POST['price']);
        $idTheLoai = mysqli_real_escape_string($mysqli, $_POST['idtl']);
        $idNhaCungCap = mysqli_real_escape_string($mysqli, $_POST['idncc']);
        $noiDung = mysqli_real_escape_string($mysqli, $_POST['content']);

        // Upload ảnh chính
        $hinhAnh = uploadImage($_FILES['image']);
        if ($hinhAnh === false) {
            echo "<script>
                window.onload = function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: 'Tải ảnh không thành công'
                    });
                }
            </script>";
            return;
        }

        // Chuẩn bị câu truy vấn
        $sqlThemSp = "INSERT INTO `sanpham` (
            `ten_sp`, 
            `hinh_anh`, 
            `don_gia`, 
            `noi_dung`,
            `so_luong`,
            `id_the_loai`,
            `id_nha_cc`,
            `trangthai`
        ) VALUES (
            '$tenSp', 
            '$hinhAnh', 
            " . str_replace('.', '', $giaBan) . ", 
            '$noiDung', 
            0, 
            '$idTheLoai', 
            '$idNhaCungCap', 
            0
        )";

        // Thực thi truy vấn
        if (mysqli_query($mysqli, $sqlThemSp)) {
            // Upload ảnh gallery (nếu có)
            if (!empty($_FILES['gallery']['name'][0])) {
                $idSanPham = mysqli_insert_id($mysqli);
                $uploadedGallery = [];

                foreach ($_FILES['gallery']['name'] as $key => $fileName) {
                    $galleryFile = [
                        'name' => $fileName,
                        'type' => $_FILES['gallery']['type'][$key],
                        'tmp_name' => $_FILES['gallery']['tmp_name'][$key],
                        'error' => $_FILES['gallery']['error'][$key],
                        'size' => $_FILES['gallery']['size'][$key]
                    ];

                    $uploadedImage = uploadImage($galleryFile);
                    if ($uploadedImage) {
                        $uploadedGallery[] = $uploadedImage;
                    }
                }

                // Chèn ảnh gallery
                if (!empty($uploadedGallery)) {
                    $galleryValues = implode(',', 
                        array_map(function($img) use ($idSanPham) {
                            return "($idSanPham, '$img')";
                        }, $uploadedGallery)
                    );
                    $sqlGallery = "INSERT INTO `hinhanhsp` (`id_sp`, `hinh_anh`) VALUES $galleryValues";
                    mysqli_query($mysqli, $sqlGallery);
                }
            }

            echo "<script>
                window.onload = function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công',
                        text: 'Thêm sản phẩm thành công'
                    }).then(() => {
                        window.location.href = 'admin.php?act=addsptc&dk=yes';
                    });
                }
            </script>";
        } else {
            echo "<script>
                window.onload = function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: 'Thêm sản phẩm không thành công'
                    });
                }
            </script>";
        }
    }
}

// Xử lý xóa sản phẩm
function xoaSanPham($mysqli) {
    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($mysqli, $_GET['id']);

        try {
            // Bắt đầu transaction
            mysqli_begin_transaction($mysqli);

            // Xóa chi tiết hóa đơn
            $sqlXoaCthoadon = "DELETE FROM cthoadon WHERE id_sanpham = '$id'";
            mysqli_query($mysqli, $sqlXoaCthoadon);

            // Xóa chi tiết phiếu nhập
            $sqlXoaCtphieunhap = "DELETE FROM ctphieunhap WHERE id_sp = '$id'";
            mysqli_query($mysqli, $sqlXoaCtphieunhap);

            // Xóa ảnh gallery
            $sqlXoaGallery = "DELETE FROM hinhanhsp WHERE id_sp = '$id'";
            mysqli_query($mysqli, $sqlXoaGallery);

            // Xóa sản phẩm
            $sqlXoaSanpham = "DELETE FROM sanpham WHERE id = '$id'";
            mysqli_query($mysqli, $sqlXoaSanpham);

            // Commit transaction
            mysqli_commit($mysqli);

            echo "<script>
                window.onload = function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công',
                        text: 'Xóa sản phẩm thành công'
                    }).then(() => {
                        window.location.href = '../admin.php?muc=7&tmuc=Sản%20phẩm';
                    });
                }
            </script>";

        } catch (Exception $e) {
            // Rollback nếu có lỗi
            mysqli_rollback($mysqli);
            
            // Lưu log lỗi (nếu cần)
            error_log("Lỗi xóa sản phẩm: " . $e->getMessage());
            
            echo "<script>
                window.onload = function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: 'Xóa sản phẩm không thành công'
                    }).then(() => {
                        window.location.href = '../admin.php?muc=7&tmuc=Sản%20phẩm&error=delete';
                    });
                }
            </script>";
        }
    }
}

// Thực thi các chức năng
themSanPham($mysqli);
xoaSanPham($mysqli);

// Đóng kết nối
mysqli_close($mysqli);
?>

<!-- Thêm thư viện SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>