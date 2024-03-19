

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
        text-align:left
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
   
</head>
<body>
<?php 
    $tk=mysqli_query($con,"SELECT `username` FROM `taikhoang` WHERE `taikhoang`.`trang_thai`=0 AND NOT EXISTS (SELECT `ten_dangnhap`FROM `nhanvien` WHERE `taikhoang`.`username`= `nhanvien`.`ten_dangnhap`)");
?>

<div class="blog_section layout_padding">
    <div class="container-fluid">
      <h2 class="blog_taital" style=" margin-left:30px;  margin-top:30px;">Chào mừng bạn đến trang Quản lý nhân viên </h2>
    
<center>
  <h2>Thêm Nhân Viên</h2> 
   
    <form name="nhanvien-formadd" method="POST" action="./xulythem.php" enctype="multipart/form-data">
        <table >
            <tr>
                <td>Username</td>
                <td>
                    <input type="text" name="tendangnhap" value="" />
                     <!-- <input type="text" name="tendangnhap" value="" /> -->
                </td>
            </tr>
            <tr>
                <td>Tên Nhân Viên</td>
              <td> 
              <input type="text" name="name" value="" />
              </td>   
            </tr>
            
           
            <tr>
                <td> Email </td>
                <td><input type="email" name="email" value="" placeholder="VD: lyphuc823@gmail.com"/></td>
                
            </tr>
           
            <tr>
                        <td>SĐT </td> 
                    <td> <input type="tel" name="sdt" value="" pattern="[0]{1}[0-9]{9}" placeholder="VD: 0123456789" /></td>
               
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="mat_khau" ></td>
            </tr>
            
            <tr>
                <td></td>
                <td > 
                    <center>
                        <button name="btnnvadd" type="submit"title="Lưu nhân viên" value="Thêm">Thêm</button>
                        <button type="reset" value="Hủy">Hủy</button>
              
                    </center>
                    
            </td>
            </tr>
        </table>
    </form>
    </center>
</body>
</html>