<?php
    include_once("./connect_db.php");
    if (!empty($_SESSION['nguoidung'])) {
        $con = mysqli_connect($host, $user, $password, $database);
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        $totalRecords = mysqli_query($con, "SELECT `trang_thai`, `id_quyen`, `username`, `pass`, `fullname`,`id`, `ten_quyen` FROM `taikhoang`, `quyen` WHERE `id`=`id_quyen`");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        $taikhoang = mysqli_query($con, "SELECT `trang_thai`, `id_quyen`, `username`, `pass`, `fullname`,`id`, `ten_quyen` FROM `taikhoang`, `quyen` WHERE `id`=`id_quyen` ORDER BY `username` ASC LIMIT " . $item_per_page . " OFFSET " . $offset."");
        $quyen1=mysqli_query($con,"SELECT `id`, `ten_quyen` FROM `quyen`"); 
        $data=$quyen1->fetch_all(MYSQLI_ASSOC);

    ?>
<div class="main-content">
            <h1>Tài khoản</h1>
            <div class="product-items">
            <div class="buttons">
                    <a href="admin.php?act=addtk">Thêm tài khoản</a>
                </div>
                <div class="table-responsive-sm ">
                    <table class="table table-bordered table-striped table-hover">
                        <thead >
                            <tr>
                                <th>Username</th>
                                <th>Pass</th>
                                <th>Fullname</th>
                                <th>Quyền</th>
                                <th>Trạng thái</th>
                                <th>Thay đổi</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                            while ($row = mysqli_fetch_array($taikhoang)) {
                            ?>
                                <tr>                              
                                    <td><?= $row['username'] ?></td>
                                    <td><?= $row['pass'] ?></td>
                                    <td><?= $row['fullname'] ?></td>
                                    <td><form method="POST" action="./xulythem.php?id=<?= $row['username'] ?>">
                                    <select name="quyen"><option value="<?=$row['id_quyen']?>"><?=$row['ten_quyen']?></option><?php foreach($data as $quyen2){?><option value="<?= $quyen2['id']?>"><?=$quyen2['ten_quyen']?></option><?php } ?></select></td>
                                    <td>
                                        <input type="checkbox" name="trangthai"<?php if($row['trang_thai']==0) echo "checked";?> >
                                        <?php if($row['trang_thai']==0) echo "Bình thường"; else echo"Bị khóa";?>
                                    </td>
                                    <td><input type="submit" name="btntksua"value="Thay đổi"></td></form>                                
                                    <td><?php if($row['trang_thai']==1){?><a href="admin.php?act=xoatk&id=<?= $row['username'] ?>" onclick="return confirm('Are you sure you want to delete this item?');">Xóa</a><?php }?></td>
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