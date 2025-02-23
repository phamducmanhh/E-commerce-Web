<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- Google font -->
     
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/admin_style.css">

</head>

<body>


    <?php
    include_once('function.php');
    include_once('connect_db.php');
    if (isset($_POST['btnadd'])) {
        if (isset($_POST['name']))
            if ($_POST['name'] != '') {
                if (isset($_POST['price']))
                    if ($_POST['price'] != '') {
                        if (isset($_POST['idtl']))
                            if ($_POST['idtl'] != '') {
                                if (isset($_POST['idncc']))
                                    if ($_POST['idncc'] != '') {
                                        if (isset($_POST['content']))
                                            if ($_POST['content'] != '') {
                                                $conn = mysqli_connect("localhost", "root", "", "bannuocdb");
                                                $namei = $_POST['name'];
                                                $price = $_POST['price'];
                                                $soluong = $_POST['soluong'];
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
                                                        $sql1 = "INSERT INTO `sanpham` (`ten_sp`, `hinh_anh`, `don_gia`, `noi_dung`,`so_luong`,`id_the_loai`,`id_nha_cc`,`trangthai`) VALUES ('$namei','$image_url', " . str_replace('.', '', $price) . ", '$content','$soluong','$idtl','$idncc',0);";
                                                        $result1 = mysqli_query($conn, $sql1);
                                                        if (isset($_FILES['gallery']))
                                                            if ($_FILES['gallery'] != '') {
                                                                $uploadedFiles = $_FILES['gallery'];
                                                                @$result = uploadFiles($uploadedFiles);
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
                                            } else header("location:./admin.php?act=addsptc&dk=no");
                                    } else header("location:./admin.php?act=addsptc&dk=no");
                            } else header("location:./admin.php?act=addsptc&dk=no");
                    } else header("location:./admin.php?act=addsptc&dk=no");
            } else header("location:./admin.php?act=addsptc&dk=no");
    }
    if (isset($_POST['btnsua'])) {
        if (isset($_POST['name']))
            if ($_POST['name'] != '') {
                if (isset($_POST['price']))
                    if ($_POST['price'] != '') {
                        if (isset($_POST['soluong']))
                            if ($_POST['soluong'] != '') {
                                if (isset($_POST['idtl']))
                                    if ($_POST['idtl'] != '') {
                                        if (isset($_POST['idncc']))
                                            if ($_POST['idncc'] != '') {
                                                if (isset($_POST['content']))
                                                    if ($_POST['content'] != '') {
                                                        if (isset($_POST['trangthai']) == "on") $trangthai = 0;
                                                        if (isset($_POST['trangthai']) == NULL) $trangthai = 1;
                                                        include_once('function.php');
                                                        $con = mysqli_connect("localhost", "root", "", "bannuocdb");
                                                        $result4 = mysqli_query($con, "SELECT `id_the_loai` FROM `sanpham` WHERE `id`=" . $_GET['id'] . "");
                                                        $r2 = mysqli_fetch_array($result4);
                                                        if (isset($_FILES['gallery']) && !empty($_FILES['gallery']['name'][0])) {
                                                            $uploadedFiles = $_FILES['gallery'];
                                                            $result = uploadFiles($uploadedFiles);
                                                            $galleryImages = $result['uploaded_files'];
                                                        }
                                                        if (!empty($_POST['gallery_image'])) {
                                                            $galleryImages = array_merge($galleryImages, $_POST['gallery_image']);
                                                        }
                                                        if (!isset($image_url) && !empty($_POST['image'])) {
                                                            $image_url = $_POST['image'];
                                                        }
                                                        if ($_FILES['image']['name'] != NULL) {
                                                            // Kiểm tra file up lên có phải là ảnh không
                                                            if ($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/gif") {

                                                                // Nếu là ảnh tiến hành code upload
                                                                $path1 = "";
                                                                $path = "../img/"; // Ảnh sẽ lưu vào thư mục images
                                                                $tmp_name = $_FILES['image']['tmp_name'];
                                                                $name = $_FILES['image']['name'];
                                                                // Upload ảnh vào thư mục images
                                                                move_uploaded_file($tmp_name, $path . $name);
                                                                $image_url = $path1 . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                                                                // Insert ảnh vào cơ sở dữ liệu
                                                            }
                                                        }
                                                        $result1 = mysqli_query($con, "UPDATE `sanpham` SET `ten_sp` = '" . $_POST['name'] . "',`hinh_anh` =  '$image_url', `don_gia` = " . str_replace('.', '', $_POST['price']) . ",`so_luong` =  '".$_POST['soluong']."', `noi_dung` = '" . $_POST['content'] . "', `ngay_sua` = " . time() . ",`id_the_loai` =" . $_POST['idtl'] . ",`id_nha_cc`=" . $_POST['idncc'] . ",`trangthai`=" . $trangthai . " WHERE `sanpham`.`id` = " . $_GET['id']);
                                                        if (!empty($galleryImages)) {
                                                            $product_id = ($_GET['act'] == 'sua' && !empty($_GET['id'])) ? $_GET['id'] : $con->insert_id;
                                                            $insertValues = "";
                                                            foreach ($galleryImages as $path) {
                                                                if (empty($insertValues)) {
                                                                    $insertValues = "( " . $product_id . ", '" . $path . "')";
                                                                } else {
                                                                    $insertValues .= ",( " . $product_id . ", '" . $path . "')";
                                                                }
                                                            }
                                                            $result = mysqli_query($con, "INSERT INTO `hinhanhsp` ( `id_sp`, `hinh_anh`) VALUES " . $insertValues . ";");
                                                            echo "cap nhat thanh cong";
                                                        }
                                                        if ($result1) {
                                                            // $result5 = mysqli_query($con,"SELECT COUNT(`id_the_loai`) AS cid_the_loai FROM `sanpham` WHERE `id_the_loai`=".$r2['id_the_loai']."");
                                                            // $r5=mysqli_fetch_array($result5);
                                                            // $result6 = mysqli_query($con,"UPDATE `theloai` SET `tong_sp`=".$r5['cid_the_loai']." WHERE `id`=".$r2['id_the_loai']."");
                                                            // $result2 = mysqli_query($con,"SELECT COUNT(`id_the_loai`) AS cid_the_loai FROM `sanpham` WHERE `id_the_loai`=".$_POST['idtl']."");
                                                            // $r=mysqli_fetch_array($result2);
                                                            // $result3 = mysqli_query($con,"UPDATE `theloai` SET `tong_sp`=".$r['cid_the_loai']." WHERE `id`=".$_POST['idtl']."");
                                                            // if ($result6&&$result3) { 
                                                            header("location:./admin.php?act=suasptc&dk=yes");
                                                            // else header("location:./admin.php?act=suasptc&dk=no"); 
                                                        } else header("location:./admin.php?act=suasptc&dk=no");
                                                    } else header("location:./admin.php?act=suasptc&dk=no");
                                            } else header("location:./admin.php?act=suasptc&dk=no");
                                    } else header("location:./admin.php?act=suasptc&dk=no");
                                }else header("location:./admin.php?act=suasptc&dk=no");
                                } else header("location:./admin.php?act=suasptc&dk=no");
                    } else header("location:./admin.php?act=suasptc&dk=no");
            }
            if (isset($_POST['btntladd'])) {
                if (!empty($_POST['name']) && !empty($_POST['ten_thuonghieu']) && !empty($_FILES['image']['name'])) {
                    // Check if the uploaded file is an image
                    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
                    if (in_array($_FILES['image']['type'], $allowed_types)) {
                        // Define paths for saving the image
                        $path1 = ""; // Path for database
                        $path2 = "../img/"; // Folder to save uploaded image
                        $tmp_name = $_FILES['image']['tmp_name'];
                        $name = $_FILES['image']['name'];
                        
                        // Upload the image
                        if (move_uploaded_file($tmp_name, $path2 . $name)) {
                            $image_url = $path1 . $name; // Image URL for database
                            
                            // Insert data into the database
                            $sql = "INSERT INTO `theloai` (`ten_tl`, `tenthuonghieu`, `image_theloai`) VALUES ('" . mysqli_real_escape_string($con, $_POST['name']) . "', '" . mysqli_real_escape_string($con, $_POST['ten_thuonghieu']) . "', '" . mysqli_real_escape_string($con, $image_url) . "')";
                            $result = mysqli_query($con, $sql);
                            
                            // Redirect based on the query result
                            if ($result) {
                                header("Location: ./admin.php?act=addtltc&dk=yes");
                                exit();
                            } else {
                                header("Location: ./admin.php?act=addtltc&dk=no");
                                exit();
                            }
                        } else {
                            header("Location: ./admin.php?act=addtltc&dk=no");
                            exit();
                        }
                    } else {
                        // Invalid file type
                        header("Location: ./admin.php?act=addtltc&dk=no");
                        exit();
                    }
                } else {
                    // Missing required fields
                    header("Location: ./admin.php?act=addtltc&dk=no");
                    exit();
                }
            }
            
            if (isset($_POST['btntlsua'])) {
                if (!empty($_POST['name']) && !empty($_POST['ten_thuonghieu'])) {
                    // Sanitize input values
                    $name = mysqli_real_escape_string($con, $_POST['name']);
                    $ten_thuonghieu = mysqli_real_escape_string($con, $_POST['ten_thuonghieu']);
                    $id = mysqli_real_escape_string($con, $_GET['id']); // Ensure the ID is sanitized
                    
                    // Check if a new image file is uploaded
                    if (!empty($_FILES['image']['name'])) {
                        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
                        
                        // Validate file type
                        if (in_array($_FILES['image']['type'], $allowed_types)) {
                            $path1 = ""; // For database storage
                            $path2 = "../img/"; // Folder for uploaded images
                            $tmp_name = $_FILES['image']['tmp_name'];
                            $file_name = $_FILES['image']['name'];
                            
                            // Upload the new image
                            if (move_uploaded_file($tmp_name, $path2 . $file_name)) {
                                $image_url = $path1 . $file_name;
                                
                                // Update database with new image and correct values
                                $sql = "UPDATE `theloai` SET `ten_tl` = '$name', `tenthuonghieu` = '$ten_thuonghieu', `image_theloai` = '$image_url' WHERE `id` = $id";
                                $result = mysqli_query($con, $sql);
                                
                                if ($result) {
                                    header("Location: ./admin.php?act=suatltc&dk=yes");
                                    exit();
                                } else {
                                    header("Location: ./admin.php?act=suatltc&dk=no");
                                    exit();
                                }
                            }
                        } else {
                            // Invalid file type
                            header("Location: ./admin.php?act=suatltc&dk=no");
                            exit();
                        }
                    } else {
                        // Keep existing image if no new one is uploaded
                        $image_url = mysqli_real_escape_string($con, $_POST['image']);
                        $sql = "UPDATE `theloai` SET `ten_tl` = '$name', `tenthuonghieu` = '$ten_thuonghieu', `image_theloai` = '$image_url' WHERE `id` = $id";
                        $result = mysqli_query($con, $sql);
                        
                        if ($result) {
                            header("Location: ./admin.php?act=suatltc&dk=yes");
                            exit();
                        } else {
                            header("Location: ./admin.php?act=suatltc&dk=no");
                            exit();
                        }
                    }
                } else {
                    // Missing required fields
                    header("Location: ./admin.php?act=suatltc&dk=no");
                    exit();
                }
            }
    if (isset($_POST['btnnccadd'])) {
        if (isset($_POST['name']))
            if ($_POST['name'] != '') {
                if (isset($_POST['email']))
                    if ($_POST['email'] != '') {
                        if (isset($_POST['website']))
                            if ($_POST['website'] != '') {
                                if (isset($_POST['sdt']))
                                    if ($_POST['sdt'] != '') {
                                        $sql = "INSERT INTO `nhacungcap`(`ten_ncc`, `email`, `web_site`,`phone`) VALUES ('" . $_POST['name'] . "','" . $_POST['email'] . "','" . $_POST['website'] . "','" . $_POST['sdt'] . "')";
                                        $result = execute($sql);
                                        header("location:./admin.php?act=nccaddtc&dk=yes");
                                    } else header("location:./admin.php?act=nccaddtc&dk=no");
                            } else header("location:./admin.php?act=nccaddtc&dk=no");
                    } else header("location:./admin.php?act=nccaddtc&dk=no");
            } else header("location:./admin.php?act=nccaddtc&dk=no");
    }
    // if (isset($_POST['btnnccdat'])) {
    //     if ($_POST['sldat'] != "") {
    //         if (is_int(intval($_POST['sldat']))) {
    //             $con = mysqli_connect("localhost", "root", "", "bannuocdb");
    //             $sanpham = mysqli_query($con, "SELECT `so_luong` FROM `sanpham` WHERE `id` = " . $_GET['id'] . "");
    //             $b = mysqli_fetch_array($sanpham);
    //             $a = $_POST['sldat'] + $b['so_luong'];
    //             $result1 = execute("UPDATE `sanpham` SET `so_luong` = '$a' WHERE `sanpham`.`id` = " . $_GET['id'] . " ");
    //         }

    //     }

    //     echo "xin chao";
    // }
    if (isset($_POST['btnkhtt'])) {
        if (isset($_POST['trangthai']) == "on") $trangthai = 0;
        if (isset($_POST['trangthai']) == NULL) $trangthai = 1;
        $sql = "UPDATE `khachhang` SET `trangthai` = '" . $trangthai . "' WHERE `khachhang`.`id` = " . $_GET['id'] . " ";
        $result = execute($sql);
        header("location:./admin.php?act=khtttc&dk=yes");
    }
    if (isset($_POST['btnnvadd'])) {
        if (isset($_POST['name']))
            if ($_POST['name'] != '') {
                // if (isset($_POST['tendangnhap'])) {
                //     if ($_POST['tendangnhap'] != '') {
                        if (isset($_POST['sdt']))
                            if ($_POST['sdt'] != '') {
                                if (isset($_POST['email']))
                                    if ($_POST['email'] != '') {
                                        if ($_POST['tendangnhap'] != '') $tendangnhap=null;
                                        $sql1 = "INSERT INTO `nhanvien`(`ten_nv`,`ten_dangnhap`,`email`,`phone`) VALUES ('" . $_POST['name'] . "','" . $_POST['tendangnhap'] . "','" . $_POST['email'] . "','" . $_POST['sdt'] . "')";
                                        $result = mysqli_query($con, $sql1);
                                        if ($result)
                                            header("location:./admin.php?act=addnvtc&dk=yes");
                                        else header("location:./admin.php?act=addnvtc&dk=no");
                                    } else header("location:./admin.php?act=addnvtc&dk=no");
                            } else header("location:./admin.php?act=addnvtc&dk=no");
                //     } else header("location:./admin.php?act=addnvtc&dk=no");
                // } else header("location:./admin.php?act=addnvtc&dk=no");
            } else header("location:./admin.php?act=addnvtc&dk=no");
    }
    if (isset($_POST['btnnvsua'])) {
        if (isset($_POST['name']))
            if ($_POST['name'] != '') {
                if (isset($_POST['sdt']))
                    if ($_POST['sdt'] != '') {
                        // if (isset($_POST['tendangnhap']))
                        //     if ($_POST['tendangnhap'] != '') {
                                if (isset($_POST['email']))
                                    if ($_POST['email'] != '') {
                                        if ($_POST['tendangnhap'] != '') $tendangnhap=null;
                                        $con = mysqli_connect("localhost", "root", "", "bannuocdb");
                                        $result1 = mysqli_query($con, "UPDATE `nhanvien` SET `ten_nv` = '" . $_POST['name'] . "',`email` = '" . $_POST['email'] . "',`phone` = '" . $_POST['sdt'] . "',`ten_dangnhap` = '" . $_POST['tendangnhap'] . "' WHERE `nhanvien`.`id` = " . $_GET['id'] . " ");
                                        if ($result1)
                                            header("location:./admin.php?act=suanvtc&dk=yes");
                                        else header("location:./admin.php?act=suanvtc&dk=no");
                                    } else header("location:./admin.php?act=suanvtc&dk=no");
                            // } else header("location:./admin.php?act=suanvtc&dk=no");
                    } else header("location:./admin.php?act=suanvtc&dk=no");
            } else header("location:./admin.php?act=suanvtc&dk=no");
    }
    if (isset($_POST['btntkmk'])) {
        if (isset($_POST['matkhaumoi']))
            if ($_POST['matkhaumoi'] != '') {
                $result1 = mysqli_query($con, "UPDATE `taikhoang` SET `pass` = '" . $_POST['matkhaumoi'] . "' WHERE `username` = '" . $_GET['user'] . "'");
                var_dump($result1);
                if ($result1)
                    header("location:./admin.php?act=tkmktc&dk=yes");
                else header("location:./admin.php?act=tkmktc&dk=no");
            } else header("location:./admin.php?act=tkmktc&dk=no");
    }
    if (isset($_POST['btntkadd'])) {
        $tendangnhap = mysqli_real_escape_string($con, $_POST['tendangnhap']);
        $matkhau = mysqli_real_escape_string($con, $_POST['matkhau']);
        $name = mysqli_real_escape_string($con, $_POST['name']);
    
        // Check if username already exists
        $check_username = mysqli_query($con, "SELECT * FROM `taikhoang` WHERE `username` = '$tendangnhap'");
        
        if (mysqli_num_rows($check_username) > 0) {
            // Username already exists
            echo "
            <!DOCTYPE html>
            <html>
            <head>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js'></script>
            </head>
            <body>
                <script>
                    swal({
                        title: 'Lỗi!',
                        text: 'Tên đăng nhập đã tồn tại. Vui lòng chọn tên đăng nhập khác.',
                        icon: 'error',
                        button: 'Quay lại'
                    }).then((value) => {
                        window.location.href = './admin.php?act=addtk';
                    });
                </script>
            </body>
            </html>";
            exit();
        }
    
        // If username is unique, proceed with account creation
        $sql2 = "INSERT INTO `taikhoang`(`id_quyen`,`username`,`pass`,`fullname`) VALUES (3,'$tendangnhap','$matkhau','$name')";
        $result1 = mysqli_query($con, $sql2);
    
        if ($result1) {
            echo "
            <!DOCTYPE html>
            <html>
            <head>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js'></script>
            </head>
            <body>
                <script>
                    swal({
                        title: 'Thành công!',
                        text: 'Tài khoản đã được tạo thành công.',
                        icon: 'success',
                        button: 'OK'
                    }).then((value) => {
                        window.location.href = './admin.php?act=addtktc&dk=yes';
                    });
                </script>
            </body>
            </html>";
        } else {
            echo "
            <!DOCTYPE html>
            <html>
            <head>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js'></script>
            </head>
            <body>
                <script>
                    swal({
                        title: 'Lỗi!',
                        text: 'Không thể tạo tài khoản. Vui lòng thử lại.',
                        icon: 'error',
                        button: 'Quay lại'
                    }).then((value) => {
                        window.location.href = './admin.php?act=addtktc&dk=no';
                    });
                </script>
            </body>
            </html>";
        }
    }
    if (isset($_POST['btntksua'])) {
        if (isset($_POST['quyen']))
            if ($_POST['quyen'] != '') {
                if (isset($_POST['trangthai']) == "on") $trangthai = 0;
                if (isset($_POST['trangthai']) == NULL) $trangthai = 1;
                var_dump(intval($_POST['quyen']));
                // if ($_POST['quyen'] == '1' || $_POST['quyen'] == '2' || $_POST['quyen'] == '3' || $_POST['quyen'] == '4') {
                    $result1 = mysqli_query($con, "UPDATE `taikhoang` SET `id_quyen` = '" . $_POST['quyen'] . "', `trang_thai` = ' " . $trangthai . "' WHERE `username` = '" . $_GET['id'] . "'");
                    if ($result1)
                        header("location:./admin.php?act=suatktc&dk=yes");
                    else header("location:./admin.php?act=suatktc&dk=no");
                // } else header("location:./admin.php?act=suatktc&dk=no");
            } else header("location:./admin.php?act=suatktc&dk=no");
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'xnhd') {
            if (isset($_GET['cuser']))
                if ($_GET['cuser'] == '') {
                    $conn = mysqli_connect("localhost", "root", "", "bannuocdb");
                    //$sql="SELECT `hoadon`.`id`, `id_khachhang`, `tong_tien`, `hoadon`.`ngay_tao`, `id_nhanvien`, `trangthai`, `ten_dangnhap`, `ten_nv`,`nhanvien`.`id` AS `idnv` FROM (`hoadon` LEFT JOIN `nhanvien` ON `nhanvien`.`id`=`id_nhanvien` ) WHERE `hoadon`.`id` = " . $_GET['id'] . "";
                    $taikhoan = mysqli_query($conn, "SELECT `id`, `ten_dangnhap` FROM `nhanvien` WHERE `id`='" . $_GET['iduser'] . "'");
                    // $hoadon=mysqli_query($conn,$sql);var_dump($hoadon);
                    $row = mysqli_fetch_array($taikhoan);
                    $result1 = mysqli_query($conn, "UPDATE `hoadon` SET `trang_thai` = '1' ,`id_nhanvien` = '" . $row['id'] . "',`ngay_tao`=`ngay_tao` WHERE `id` = '" . $_GET['id'] . "'");
                    if ($result1)
                        header("location:./admin.php?act=xnhdtc&dk=yes");
                    else header("location:./admin.php?act=xnhdtc&dk=no");
                } else header("location:./admin.php?act=xnhdtc&dk=no");
        }
    }
    // if (isset($_POST['btndm1'])) {
    //     $data=$_POST;
    //     $inserts="";
    //     $deleted=mysqli_query($con,"DELETE FROM `quyendahmuc` WHERE `id_quyen`=1");
    //     foreach($data['row1'] as $insertid){
    //         $inserts .= !empty($inserts) ? "," : "";
    //         $inserts .= "(1,".$insertid.")";
    //     }
    //     $inserted=mysqli_query($con,"INSERT INTO `quyendahmuc`(`id_quyen`, `id_danhmuc`) VALUES ".$inserts."");
    //     header("location:./admin.php?act=btndmtc&dk=yes");
    // }
    // if (isset($_POST['btndm2'])) {
    //     $data=$_POST;
    //     $inserts="";
    //     $deleted=mysqli_query($con,"DELETE FROM `quyendahmuc` WHERE `id_quyen`=2");
    //     foreach($data['row2'] as $insertid){
    //         $inserts .= !empty($inserts) ? "," : "";
    //         $inserts .= "(2,".$insertid.")";
    //     }
    //     $inserted=mysqli_query($con,"INSERT INTO `quyendahmuc`(`id_quyen`, `id_danhmuc`) VALUES ".$inserts."");
    //     header("location:./admin.php?act=btndmtc&dk=yes");
    // }
    // if (isset($_POST['btndm3'])) {
    //     $data=$_POST;
    //     $inserts="";
    //     $deleted=mysqli_query($con,"DELETE FROM `quyendahmuc` WHERE `id_quyen`=3");
    //     foreach($data['row3'] as $insertid){
    //         $inserts .= !empty($inserts) ? "," : "";
    //         $inserts .= "(3,".$insertid.")";
    //     }
    //     $inserted=mysqli_query($con,"INSERT INTO `quyendahmuc`(`id_quyen`, `id_danhmuc`) VALUES ".$inserts."");
    //     header("location:./admin.php?act=btndmtc&dk=yes");
    // }
    // if (isset($_POST['btndm4'])) {
    //     $data=$_POST;
    //     var_dump($data);
    //     $inserts="";
    //     $deleted=mysqli_query($con,"DELETE FROM `quyendahmuc` WHERE `id_quyen`=4");
    //     foreach($data['row4'] as $insertid){
    //         $inserts .= !empty($inserts) ? "," : "";
    //         $inserts .= "(4,".$insertid.")";
    //     }
    //     $inserted=mysqli_query($con,"INSERT INTO `quyendahmuc`(`id_quyen`, `id_danhmuc`) VALUES ".$inserts."");

    // }
    if (isset($_POST['btndmadd'])) {
        $data = $_POST;
        $inserts = "";
        if(isset($data['row'])){
        $them = mysqli_query($con, "INSERT INTO `quyen`(`ten_quyen`) VALUES ('" . $_POST['tendanhmuc'] . "')");
        $id_quyen = mysqli_insert_id($con);
        foreach ($data['row'] as $insertid) {
            $inserts .= !empty($inserts) ? "," : "";
            $inserts .= "(" . $id_quyen . "," . $insertid . ")";var_dump($data['row']);
        }
        
        $inserted = mysqli_query($con, "INSERT INTO `quyendahmuc`(`id_quyen`, `id_danhmuc`) VALUES " . $inserts . "");
        if($inserted) header("location:./admin.php?act=btndmaddtc&dk=yes");
        else header("location:./admin.php?act=btndmaddtc&dk=no");
        }else header("location:./admin.php?act=btndmaddtc&dk=no");
        
        // $deleted=mysqli_query($con,"DELETE FROM `quyendahmuc` WHERE `id_quyen`=1");
        // foreach($data['row1'] as $insertid){
        //     $inserts .= !empty($inserts) ? "," : "";
        //     $inserts .= "(1,".$insertid.")";
        // }
        // $inserted=mysqli_query($con,"INSERT INTO `quyendahmuc`(`id_quyen`, `id_danhmuc`) VALUES ".$inserts."");
        // header("location:./admin.php?act=btndmtc&dk=yes");
    }
    if (isset($_POST['btndmsua'])) {
        $data = $_POST;
        $inserts = "";
        if(isset($_POST['tendanhmuc']))
        if($_POST['tendanhmuc']!=''){
            if(isset($data['row'])){
        $sua = mysqli_query($con, "UPDATE `quyen` SET `ten_quyen`='" . $_POST['tendanhmuc'] . "' WHERE `id`=".$_GET['idq']."");
        $deleted=mysqli_query($con,"DELETE FROM `quyendahmuc` WHERE `id_quyen`=".$_GET['idq']."");
        foreach ($data['row'] as $insertid) {
            $inserts .= !empty($inserts) ? "," : "";
            $inserts .= "(".$_GET['idq']."," . $insertid . ")";var_dump($inserts);
        }
        
        $inserted = mysqli_query($con, "INSERT INTO `quyendahmuc`(`id_quyen`, `id_danhmuc`) VALUES " . $inserts . "");
        var_dump($inserted);
        if($inserted) header("location:./admin.php?act=btndmsuatc&dk=yes");
        else header("location:./admin.php?act=btndmsuatc&dk=no");
        }else header("location:./admin.php?act=btndmsuatc&dk=no");
        }else header("location:./admin.php?act=btndmsuatc&dk=no");
        
    }
    ?>
</body>

</html>