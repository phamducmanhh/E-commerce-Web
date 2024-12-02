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
    $sql_slider = "SELECT * FROM tbl_slider ORDER BY id_thuonghieu DESC";
    $query_slider = mysqli_query($con, $sql_slider);
    ?>
        <div class="main-content">
            <h1>Danh sách Slider</h1>
            <div class="product-items">
                <div class="buttons">
                    <a href="admin.php?act=them_thuonghieu">Thêm thương hiệu</a>
                </div>
                <div class="table-responsive-sm ">
                    <table class="table table-bordered table-striped table-hover">
                        <thead >
                            <tr>
                                <th>Id<a href="./admin.php?muc=3&tmuc=Thương%20hiệu"></a><a href="./admin.php?muc=13&tmuc=Thương%20hiệu"></a></th>
                                <th>Ảnh thương hiệu<a href="./admin.php?muc=3&tmuc=Thương%20hiệu"></a><a href="./admin.php?muc=13&tmuc=Thương%20hiệu"></a></th>
                                <th>Tên thương hiệu<a href="./admin.php?muc=3&tmuc=Thương%20hiệu"></a><a href="./admin.php?muc=13&tmuc=Thương%20hiệu"></a></th>
                                <th>Quản lý<a href="./admin.php?muc=3&tmuc=Thương%20hiệu"></a><a href="./admin.php?muc=13&tmuc=Thương%20hiệu"></a></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            while ($row = mysqli_fetch_array($query_slider)) {
                            ?>
                                <tr>         
                                    <td><?php echo $row['id_thuonghieu'] ?></td>                     
                                    <td><img src="giaodien/upload/<?php echo $row['image_thuonghieu']?>" width="150px" ></td>
                                    <td>
                                    <?php echo $row['tenthuonghieu'] ?>
                                    </td>
                                    <td>
                                        <a href="admin.php?act=sua_thuonghieu&id_thuonghieu=<?php echo $row['id_thuonghieu'] ?>">Sửa</a> |
                                        <a href="giaodien/thuonghieu_xuly.php?id_thuonghieu=<?php echo $row['id_thuonghieu'] ?>">Xóa</a>
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