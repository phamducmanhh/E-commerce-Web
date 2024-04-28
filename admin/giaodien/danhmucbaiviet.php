<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/admin_style.css">
</head>

<body>
    <?php
    include_once("./connect_db.php");
    $sql_dmbv = "SELECT * FROM tbl_danhmucbaiviet";
    $query_dmbv = mysqli_query($con, $sql_dmbv);
    ?>
        <div class="main-content">
            <h1>Danh sách danh mục</h1>
            <div class="product-items">
                <div class="buttons">
                    <a href="admin.php?act=them_dmbv">Thêm danh mục</a>
                </div>
                <div class="table-responsive-sm ">
                    <table class="table table-bordered table-striped table-hover">
                        <thead >
                            <tr>
                                <th>Id<a href="./admin.php?muc=2&tmuc=Danh%20mục%20bài%20viết"></a><a href="./admin.php?muc=2&tmuc=Danh%20mục%20bài%20viết"></a></th>
                    
                                <th>Tên danh mục<a href="./admin.php?muc=2&tmuc=Danh%20mục%20bài%20viết"></a><a href="./admin.php?muc=2&tmuc=Danh%20mục%20bài%20viết"></a></th>
                                
                                <th>Trạng thái</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            while ($row = mysqli_fetch_array($query_dmbv)) {
                            ?>
                                <tr>         
                                    <td><?php echo $row['id_danhmucbaiviet'] ?></td>                     
                                    <td><?php echo $row['tendanhmuc_baiviet'] ?></td>
                                    <td>
                                        <a href="admin.php?act=sua_dmbv&idbaiviet=<?php echo $row['id_danhmucbaiviet'] ?>">Sửa</a> |
                                        <a href="giaodien/xulydanhmucbaiviet.php?idbaiviet=<?php echo $row['id_danhmucbaiviet'] ?>">Xóa</a>
                                    </td>
                            
                                    <div class="clear-both"></div>
                                </tr>
                                <?php 
                            } 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
       
        <div class="clear-both"></div>
        </div>
    
</body>

</html>