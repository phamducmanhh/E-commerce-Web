<?php
if (!empty($_SESSION['nguoidung'])) {
    ?>
    <div class="main-content">
        <h1>Xóa nhà cung cấp</h1>
        <div id="content-box">
            <?php
            $error = false;
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                include_once './connect_db.php';
                include_once './function.php';
                
                // Bắt đầu transaction
                mysqli_begin_transaction($con);
                
                try {
                    // Xóa các sản phẩm của nhà cung cấp
                    $deleteProducts = mysqli_query($con, "DELETE FROM `sanpham` WHERE `id_nha_cc` = " . $_GET['id']);
                    
                    // Xóa nhà cung cấp
                    $deleteSupplier = mysqli_query($con, "DELETE FROM `nhacungcap` WHERE `id` = " . $_GET['id']);
                    
                    // Nếu cả hai truy vấn đều thành công, commit transaction
                    mysqli_commit($con);
                } catch (Exception $e) {
                    // Nếu có lỗi, rollback transaction
                    mysqli_rollback($con);
                    $error = true;
                }
            }
            ?>
            
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                <?php if ($error): ?>
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: 'Không thể xóa nhà cung cấp.',
                        confirmButtonText: 'Đóng'
                    });
                <?php else: ?>
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công',
                        text: 'Xóa nhà cung cấp và các sản phẩm liên quan thành công.',
                        confirmButtonText: 'Đóng'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = './admin.php?tmuc=Nhà cung cấp';
                        }
                    });
                <?php endif; ?>
            });
            </script>
        </div>
    </div>
    <?php
}
?>