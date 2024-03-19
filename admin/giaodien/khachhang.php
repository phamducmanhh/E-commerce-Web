<?php
    include_once("./connect_db.php");
    if (!empty($_SESSION['nguoidung'])) {
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        $totalRecords = mysqli_query($con, "SELECT * FROM `khachhang`");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        $khachhang = mysqli_query($con, "SELECT * FROM `khachhang` ORDER BY `id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);

        mysqli_close($con);
    ?>
<style>
     table, th, td{
        border:1px solid #868585;
        height:50px;
        padding:10px;
       
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
    tr:hover{
    background-color:rgb(191, 197, 201);
    cursor:pointer;
    }
</style>
<div class="main-content">
    <center>

    
            <h1>Khách hàng</h1>
            <div >
                <div>
                    <table width="95%;">
                        <thead >
                            <tr>
                                <th>Tên khách hàng</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>SĐT</th>
                                <th>Số tiền đã mua hàng</th>
                                <th>Trạng thái</th>
                                <th>Password</th>
                                <th>Tên đăng nhập </th>
                                <th>Thay đổi</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            while ($row = mysqli_fetch_array($khachhang)) {
                            ?>
                                <tr>                              
                                    <td><?= $row['ten_kh'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['dia_chi'] ?></td>
                                    <td><?= $row['phone'] ?></td>
                                    <td><center>
                                    <?= $row['tong_tien_muahang'] ?>
                                    </center></td>
                                    <td><center>
                                            <form method="POST" action="./xulythem.php?id=<?= $row['id'] ?>">
                                                <input type="checkbox" name="trangthai"<?php if($row['trangthai']==0) echo "checked";?> >
                                    </center>
                                    </td>
                                    <td><?= $row['mat_khau'] ?></td>
                                    <td><?= $row['ten_dangnhap'] ?></td>
                                    <td><center>
                                    <button type="submit" name="btnkhtt">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                    </center></td></form>                                
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
        </center>
        </div>
    <?php
    }
    ?>