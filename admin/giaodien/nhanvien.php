<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .iconn1{
        color: red;
    }
    .aaa{
       
    }
    /* ffff */
    table, th, td{
        border:1px solid #868585;
        height:50px;
        padding:100px;
    }
    table{
        border-collapse:collapse;
    }
    table tr:nth-child(odd){
        background-color: 
        /* rgb(191, 197, 201); */
        
        #eee;
        
    }
    table tr:nth-child(even){
        background-color:white;
    }
   
    table th{
        background-color:#B48E82;
        text-align:center; 
    }
    table tr:hover{
    background-color:rgb(191, 197, 201);
    cursor:pointer;
    }
    
</style>
<link rel="stylesheet" href="css/font-awesome.min.css">

<link rel="stylesheet" href="css/admin_style.css">
<!-- Google font -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">


<!-- Bootstrap -->
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

<!-- Slick -->
<link type="text/css" rel="stylesheet" href="css/slick.css"/>
<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

<!-- nouislider -->
<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

</head>
<body>
<?php
    include_once("./connect_db.php");
    if (!empty($_SESSION['nguoidung'])) {
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        $totalRecords = mysqli_query($con, "SELECT * FROM `nhanvien`");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        $nhanvien = mysqli_query($con, "SELECT * FROM `nhanvien` ORDER BY `id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);

        mysqli_close($con);
    ?>
<div class="main-content">
            <h1>Quản lý nhân viên</h1>
            
            <div class="buttons">
                    <a   href="admin.php?act=addnv">
                        <i class="fa fa-plus" aria-hidden="true" style="color:black"> Thêm mới </i> 

                       </a>
                </div>
                
            <div class="product-items">
                <div >
                    <table width="100%;" >
                        <thead >
                            <tr>
                                <th>ID</th>
                                <th>Tên nhân viên</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>PassWord</th>
                                
                                <th>SĐT</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            while ($row = mysqli_fetch_array($nhanvien)) {
                            ?>
                                <tr>                 
                                    <td><center>
                                    <?= $row['id'] ?>
                                    </center></td>         
                                    <td><?= $row['ten_nv'] ?></td>
                                    <td><?= $row['ten_dangnhap'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['mat_khau'] ?></td>
                                  
                                    <td><center>
                                    <?= $row['phone'] ?>
                                    </center></td>
                                    <td><center><a  href="admin.php?act=suanv&id=<?= $row['id'] ?>" > 
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a></center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="admin.php?act=xoanv&id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </center>
                                         
                                      
                                    </td>                              
                                    <div class="clear-both"></div>
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php
        include './pagination.php';
        ?>
        <div class="clear-both"></div>
        </div>
    <?php
    }
    ?>
</body>
</html>

