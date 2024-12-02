<?php
    include_once './connect_db.php';
    include_once './function.php';
    include("../config.php");
    if(isset($_POST['btnadd'])){
        $namei = $_POST['name'];
        $price = $_POST['price'];
                                                // $image=$_FILES['image'];
        $idtl = $_POST['idtl'];
        $idncc = $_POST['idncc'];
        $content = $_POST['content'];
        if ($_FILES['image']['name'] != NULL) {
            // Kiểm tra file up lên có phải là ảnh không
            if ($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/gif") {

                // Nếu là ảnh tiến hành code upload
                $path1 = ""; // Ảnh sẽ lưu vào thư mục images
                $path2 = "../img/";
                $tmp_name = $_FILES['image']['tmp_name'];
                $name = $_FILES['image']['name'];
                // Upload ảnh vào thư mục images
                move_uploaded_file($tmp_name, $path2 . $name);
                $image_url = $path1 . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                // Insert ảnh vào cơ sở dữ liệu
                $sql1 = "INSERT INTO `sanpham` (`ten_sp`, `hinh_anh`, `don_gia`, `noi_dung`,`so_luong`,`id_the_loai`,`id_nha_cc`,`trangthai`) VALUES ('$namei','$image_url', " . str_replace('.', '', $price) . ", '$content',0,'$idtl','$idncc',0);";
                $result1 = mysqli_query($mysqli, $sql1);
                if (isset($_FILES['gallery']))
                    if ($_FILES['gallery'] != '') {
                        $uploadedFiles = $_FILES['gallery'];
                        $result = uploadFiles($uploadedFiles);
                        if ($result) {
                            $galleryImages = $result['uploaded_files'];
                            if (!empty($galleryImages)) {
                                $product_id = $conn->insert_id;
                                $insertValues = "";
                                foreach ($galleryImages as $path) {
                                    if (empty($insertValues)) {
                                        $insertValues = "( " . $product_id . ", '" . $path . "')";
                                    } else {
                                        $insertValues .= ",( " . $product_id . ", '" . $path . "')";
                                    }
                                }
                                $result = mysqli_query($conn, "INSERT INTO `hinhanhsp` ( `id_sp`, `hinh_anh`) VALUES " . $insertValues . ";");
                            }
                        } else "ko them duoc";
                    }
                if ($result1) {
                    // $result2 = mysqli_query($conn,"SELECT COUNT(`id_the_loai`) AS cid_the_loai FROM `sanpham` WHERE `id_the_loai`='$idtl'");
                    // $r=mysqli_fetch_array($result2);
                    // $result3 = mysqli_query($conn,"UPDATE `theloai` SET `tong_sp`=".$r['cid_the_loai']." WHERE `id`=$idtl");
                    // if ($result3) { 
                    header('location:admin.php?act=addsptc&dk=yes');
                    // }else header("location:./admin.php?act=addsptc&dk=no");
                } else header("location:./admin.php?act=addsptc&dk=no");
            }
        }
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM sanpham, ctphieunhap WHERE sanpham.id = ctphieunhap.id_sp AND sanpham.id = '$id'";
        $query = mysqli_query($mysqli, $sql);

        // Delete from ctphieunhap first
        $sql_xoa_ctphieunhap = "DELETE FROM ctphieunhap WHERE id_sp = '".$id."'";
        mysqli_query($mysqli, $sql_xoa_ctphieunhap);

        // Then delete from sanpham
        $sql_xoa_sanpham = "DELETE FROM sanpham WHERE id = '".$id."'";
        mysqli_query($mysqli, $sql_xoa_sanpham);

        header('Location:../admin.php?muc=7&tmuc=Sản%20phẩm');
    }
?>


