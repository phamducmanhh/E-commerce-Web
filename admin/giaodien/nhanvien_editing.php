
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
    table{
    width: 700px;
        border:1px solid #868585;
        border-collapse:collapse;
        margin-left:30px;
        font-size:25px;
        text-align:left;
       
    }
    table, th {height: 500px}
    
    
    input {
    color:#868585;

    width:100%;

    }
    td, th {
    padding: 20px;
}
button{
    border-radius: 10px;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    background-color:#91C8EB;
    border: 2px solid #91C8EB
}
button:hover{
    background-color:  #67b1e0;
  cursor: pointer;
}
    </style>
    </style>
</head>
<body>
<?php
if (!empty($_GET['id'])) {
    $result = mysqli_query($con, "SELECT * FROM `nhanvien` WHERE `id` = " . $_GET['id']);
    $nhanvien = $result->fetch_assoc();
    $tk=mysqli_query($con,"SELECT `username` FROM `taikhoang` WHERE `taikhoang`.`trang_thai`=0 AND NOT EXISTS (SELECT `ten_dangnhap`FROM `nhanvien` WHERE `taikhoang`.`username`= `nhanvien`.`ten_dangnhap`)");

}
?>



<div class="blog_section layout_padding">
    <div class="container-fluid">
      <!-- <h2 class="blog_taital" style=" margin-left:30px;  margin-top:30px;">Chào mừng bạn đến trang Quản lý nhân viên </h2> -->
    
<center>
<h2 class="blog_taital" style="   margin-top:30px;">Chào mừng bạn đến trang Quản lý nhân viên </h2>
  <h2>Sửa Nhân Viên</h2> 
  
   <form name="nhanvien-formsua" method="POST" action="./xulythem.php?id=<?= $_GET['id'] ?>" enctype="multipart/form-data">
        <table style="margin:auto text-align:left width:100% " >
            <tr>
                <td><label>Username: </label></td>
                <td>
                <input type="text" name="tendangnhap" value="<?= (!empty($nhanvien) ? $nhanvien['ten_dangnhap'] : "") ?>" />
               
                </td>
            </tr>
            <tr>
                <td><label>Tên Nhân Viên: </label></td>
              <td> 
              <input type="text" name="name" value="<?= (!empty($nhanvien) ? $nhanvien['ten_nv'] : "") ?>" />
              </td>   
            </tr>
            
           
            <tr>
                <td> <label>Email: </label></td>
                <td> <input type="email" name="email" value="<?= (!empty($nhanvien) ? $nhanvien['email'] : "") ?>" /></td>
                
            </tr>
           
            <tr>
                    <td><label>Số Điện Thoại: </label></td> 
                    <td> <input type="tel" name="sdt" pattern="[0]{1}[0-9]{9}" placeholder="VD: 0123456789" value="<?= (!empty($nhanvien) ? $nhanvien['phone'] : "") ?>" /></td>
               
            </tr>
            <tr>
                <td><label>Password: </label></td>
                <td>
                <input type="text" name="mat_khau" value="<?= (!empty($nhanvien) ? $nhanvien['mat_khau'] : "") ?>" />
                    
</td>
            </tr>
            
            <tr>
                <td></td>
                <td> <center>
                <button name="btnnvsua" type="submit"title="Lưu nhân viên" value="Cập nhật">Cập nhật</button>
                <button type="reset" value="Hủy">Hủy</button>
              
                
                </center>
            </td>
            </tr>
        </table>
    </form>
    </center>
    </body>
</html>