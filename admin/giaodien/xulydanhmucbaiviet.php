
<?php
    include("../config.php");
    $tendanhmucbv = $_POST['tendanhmuc_bv'];
    if(isset($_POST['btn_add'])){
        $sql_them = "INSERT INTO tbl_danhmucbaiviet(tendanhmuc_baiviet) VALUES ('".$tendanhmucbv."')";
        mysqli_query($mysqli, $sql_them);
        header('Location:../admin.php?muc=2&tmuc=Danh%20mục%20bài%20viết');
    }elseif(isset($_POST['btn_edit'])){
        $sql_update = "UPDATE tbl_danhmucbaiviet SET tendanhmuc_baiviet='".$tendanhmucbv."' WHERE id_danhmucbaiviet = '$_GET[idbaiviet]'";
        mysqli_query($mysqli, $sql_update);
        header('Location:../admin.php?muc=2&tmuc=Danh%20mục%20bài%20viết');
    }
    else{
        $id = $_GET['idbaiviet'];
        $sql_xoa = "DELETE FROM tbl_danhmucbaiviet WHERE id_danhmucbaiviet = '".$id."'";
        mysqli_query($mysqli, $sql_xoa);
        header('Location:../admin.php?muc=2&tmuc=Danh%20mục%20bài%20viết');
    }
?>