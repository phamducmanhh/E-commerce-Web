<?php
    include("../config.php");
    
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh = time().'_'.$hinhanh;
    
    $tenthuonghieu = $_POST['tenthuonghieu'];
    
    if(isset($_POST['btn_add'])){
        $sql_them = "INSERT INTO tbl_slider(image_thuonghieu, tenthuonghieu) 
        VALUES ('".$hinhanh."','".$tenthuonghieu."')";
        mysqli_query($mysqli, $sql_them);
        move_uploaded_file($hinhanh_tmp, 'upload/'.$hinhanh);
        header('Location:../admin.php?muc=3&tmuc=Thương%20hiệu');
    } elseif(isset($_POST['btn_edit'])){
        if(!empty($_FILES['hinhanh']['name'])){
            move_uploaded_file($hinhanh_tmp, 'upload/'.$hinhanh);
            $sql_update = "UPDATE tbl_slider SET image_thuonghieu='".$hinhanh."', tenthuonghieu='".$tenthuonghieu."'
            WHERE id_thuonghieu = '$_GET[id_thuonghieu]'";
            $sql = "SELECT * FROM tbl_slider WHERE id_thuonghieu = '$_GET[id_thuonghieu]' LIMIT 1";
            $query = mysqli_query($mysqli, $sql);
            while($row = mysqli_fetch_array($query)){
                unlink('upload/'.$row['image_thuonghieu']);
            }
        }else{
            $sql_update = "UPDATE tbl_slider SET tenthuonghieu='".$tenthuonghieu."'
            WHERE id_thuonghieu = '$_GET[id_thuonghieu]'";
        }
        
        mysqli_query($mysqli, $sql_update);
        header('Location:../admin.php?muc=3&tmuc=Thương%20hiệu');
    }
    else{
        $id = $_GET['id_thuonghieu'];
        $sql = "SELECT * FROM tbl_slider WHERE id_thuonghieu = '$id' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while($row = mysqli_fetch_array($query)){
            unlink('upload/'.$row['image_thuonghieu']);
        }
        $sql_xoa = "DELETE FROM tbl_slider WHERE id_thuonghieu = '".$id."'";
        mysqli_query($mysqli, $sql_xoa);
        header('Location:../admin.php?muc=3&tmuc=Thương%20hiệu');
    }
?>