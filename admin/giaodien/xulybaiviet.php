<?php
    include("../config.php");
    $tenbaiviet = $_POST['tenbaiviet'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh = time().'_'.$hinhanh;
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $tinhtrang = $_POST['tinhtrang'];
    $danhmuc = $_POST['danhmuc'];
    if(isset($_POST['btn_add'])){
        $sql_them = "INSERT INTO tbl_baiviet(tenbaiviet, hinhanh, tomtat, noidung, tinhtrang, id_danhmuc) 
        VALUES ('".$tenbaiviet."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."','".$danhmuc."')";
        mysqli_query($mysqli, $sql_them);
        move_uploaded_file($hinhanh_tmp, 'upload/'.$hinhanh);
        header('Location:../admin.php?muc=16&tmuc=Bài%20viết');
    } elseif(isset($_POST['btn_edit'])){
        if(!empty($_FILES['hinhanh']['name'])){
            move_uploaded_file($hinhanh_tmp, 'upload/'.$hinhanh);
            $sql_update = "UPDATE tbl_baiviet SET tenbaiviet=?, hinhanh=?, tomtat=?, noidung=?, tinhtrang=?, id_danhmuc=? WHERE id_baiviet = ?";
            $stmt = $mysqli->prepare($sql_update);
            $stmt->bind_param("ssssssi", $tenbaiviet, $hinhanh, $tomtat, $noidung, $tinhtrang, $danhmuc, $_GET['idbaiviet']);
        } else {
            $sql_update = "UPDATE tbl_baiviet SET tenbaiviet=?, tomtat=?, noidung=?, tinhtrang=?, id_danhmuc=? WHERE id_baiviet = ?";
            $stmt = $mysqli->prepare($sql_update);
            $stmt->bind_param("sssssi", $tenbaiviet, $tomtat, $noidung, $tinhtrang, $danhmuc, $_GET['idbaiviet']);
        }
        
        $stmt->execute();
        header('Location:../admin.php?muc=16&tmuc=Bài%20viết');
    }else{
        $id = $_GET['idbaiviet'];
        $sql = "SELECT * FROM tbl_baiviet WHERE id_baiviet = '$id' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while($row = mysqli_fetch_array($query)){
            unlink('upload/'.$row['hinhanh']);
        }
        $sql_xoa = "DELETE FROM tbl_baiviet WHERE id_baiviet = '".$id."'";
        mysqli_query($mysqli, $sql_xoa);
        header('Location:../admin.php?muc=16&tmuc=Bài%20viết');
    }
?>