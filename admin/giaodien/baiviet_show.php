<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/admin_style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            height: 50px; /* Đặt chiều cao cố định cho thẻ td */
            vertical-align: top; /* Canh trên nội dung theo chiều dọc */
        }

        th {
            background-color: #f2f2f2;
        }

        .truncate-3-lines {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
    </style>
</head>

<body>
    <?php
    include_once("./connect_db.php");
    $sql_bv = "SELECT * FROM tbl_baiviet, tbl_danhmucbaiviet WHERE tbl_baiviet.id_danhmuc = tbl_danhmucbaiviet.id_danhmucbaiviet ORDER BY tbl_baiviet.id_baiviet DESC";
    $query_bv = mysqli_query($con, $sql_bv);
    ?>
        <div class="main-content">
            <h1>Danh sách bài viết</h1>
            <div class="product-items">
                <div class="buttons">
                    <a href="admin.php?act=them_bv">Thêm bài viết</a>
                </div>
                <div class="table-responsive-sm ">
                    <table class="table table-bordered table-striped table-hover">
                        <thead >
                            <tr>
                                <th>Id<a href="./admin.php?muc=16&tmuc=Bài%20viết"></a><a href="./admin.php?muc=16&tmuc=Bài%20viết"></a></th>
                    
                                <th>Tên bài viết<a href="./admin.php?muc=16&tmuc=Bài%20viết"></a><a href="./admin.php?muc=16&tmuc=Bài%20viết"></a></th>
                                
                                <th>Tóm tắt<a href="./admin.php?muc=16&tmuc=Bài%20viết"></a><a href="./admin.php?muc=16&tmuc=Bài%20viết"></a></th>
                                <!-- <th>Nội dung<a href="./admin.php?muc=16&tmuc=Bài%20viết"></a><a href="./admin.php?muc=16&tmuc=Bài%20viết"></a></th> -->
                                <th>Trạng thái<a href="./admin.php?muc=16&tmuc=Bài%20viết"></a><a href="./admin.php?muc=16&tmuc=Bài%20viết"></a></th>
                                <th>Hình ảnh<a href="./admin.php?muc=16&tmuc=Bài%20viết"></a><a href="./admin.php?muc=16&tmuc=Bài%20viết"></a></th>
                                <th>Quản lý<a href="./admin.php?muc=16&tmuc=Bài%20viết"></a><a href="./admin.php?muc=16&tmuc=Bài%20viết"></a></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            while ($row = mysqli_fetch_array($query_bv)) {
                            ?>
                                <tr>         
                                    <td style="border:1px solid #ddd; padding:8px; height:50px; vertical-align:middle;"><?php echo $row['id_baiviet'] ?></td>                     
                                    <td style="border:1px solid #ddd; padding:8px; height:50px; vertical-align:middle;"><?php echo $row['tenbaiviet'] ?></td>
                                    <td style="border:1px solid #ddd; padding:8px; height:50px; vertical-align:middle;"><?php echo $row['tomtat'] ?></td>
                                    
                                    <td>
                                    <?php 
                                        if($row['tinhtrang']==1){
                                            echo 'Kích hoạt';
                                            }else{
                                            echo 'Ẩn';
                                            }  
                                    ?> 
                                    </td>
                                    <td><img src="giaodien/upload/<?php echo $row['hinhanh']?>" width="150px" ></td>
                                    <td>
                                        <a href="admin.php?act=sua_bv&idbaiviet=<?php echo $row['id_baiviet'] ?>">Sửa</a> |
                                        <a href="giaodien/xulybaiviet.php?idbaiviet=<?php echo $row['id_baiviet'] ?>"onclick="return confirmDelete()">Xóa</a>
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
        <script>
function confirmDelete() {
    return confirm("Bạn có chắc chắn muốn xóa bài viết bài viết?");
}
</script>

</body>

</html>