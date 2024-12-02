<?php

if (!empty($_SESSION['nguoidung'])) {
    ?>
    <div class="main-content">
        <h1>Xóa thể loại</h1>
        <div id="content-box">
            <?php
            $error = false;
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                include_once './connect_db.php';
                include_once './function.php';
                
                $result = execute("DELETE FROM `theloai` WHERE `id` = " . $_GET['id']);
                if (!$result) {
                    $error = "Không thể xóa thể loại.";
                }
                
                if ($error) {  // Only enter this block if $error contains an error message
                    ?>
                    <script>
                        Swal.fire({
                            title: 'Thất bại',
                            text: '<?php echo $error; ?>',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = './admin.php?tmuc=Thể loại';
                            }
                        });
                    </script>
                <?php } else { ?>
                    <script>
                        Swal.fire({
                            title: 'Thành công',
                            text: 'Xóa thể loại thành công',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = './admin.php?tmuc=Thể loại';
                            }
                        });
                    </script>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
    <?php
}
?>