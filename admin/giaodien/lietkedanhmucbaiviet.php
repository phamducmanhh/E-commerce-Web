<?php
    
    $sql_lietke_danhmucbv = "SELECT *FROM tbl_danhmucbaiviet ORDER BY thutu DESC";
    $query_lietke_danhmucbv = mysqli_query($con, $sql_lietke_danhmucbv);
?>
<p>Liệt kê danh mục bài viết</p>
<table border=1 style="border-collapse:collapse;" width="100%">
  <tr>
    <th>ID</th>
    <th>Tên danh mục</th>
    <th>Quản lý</th>
  </tr>
  <?php
    $i=0;
    while($row = mysqli_fetch_array($query_lietke_danhmucbv)){
        $i++;
    
  ?>
  <tr>
    <td><?php echo $i ?> </td>
    <td><?php echo $row['tendanhmuc_baiviet'] ?> </td>
    <td>
      <a href="giaodien/xulydanhmucbaiviet.php?idbaiviet=<?php echo $row['id_baiviet'] ?>" class="btn btn-danger">Xóa</a>
      <a href="?action=quanlydanhmucbaiviet&tmuc=sua&idbaiviet=<?php echo $row['id_baiviet']?>" class="btn btn-primary">Sửa</a>
    </td>

  </tr>
    <?php
    }
    ?>

</table>