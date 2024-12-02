<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		/* CSS cho layout */
        .product_list {
            /* Sử dụng flexbox để hiển thị các mục ngang */
            display: flex;
            /* Cho phép cuộn ngang nếu cần */
            overflow-x: auto;
            /* Loại bỏ các khoảng trắng và đệm mặc định */
            padding: 0;
            /* Xóa định dạng của danh sách */
            list-style: none;
            /* Mỗi hàng chỉ hiển thị tối đa 4 mục */
            flex-wrap: wrap;
        }

        .product_list li {
            border-radius: 10px;
            background-color: whitesmoke;
            /* Kích thước cố định cho mỗi mục */
            width: calc(25% - 10px); /* 25% của chiều rộng của container, trừ đi khoảng cách giữa các mục */
            margin-right: 10px; /* Khoảng cách giữa các mục */
            margin-bottom: 10px; /* Khoảng cách dưới cùng */
        }

        /* CSS cho các phần tử bên trong */
        .product_list .article {
            /* Cài đặt kích thước và căn chỉnh của các mục */
            display: block;
            text-align: center;
            /* Xóa định dạng của các liên kết */
            text-decoration: none;
            /* Kích thước của các phần tử bên trong phải nhỏ hơn hoặc bằng kích thước của mục cha */
            width: 100%;
        }

        .product_list .article img {
            /* Đảm bảo hình ảnh không bị biến dạng */
            width: 100%;
            height: auto;
        }
        .product_list .article h3{
            font-size: 1.7rem

        }
        .product_list .article h3,
        .product_list .article p {
            text-align: center;
            /* Loại bỏ các khoảng trắng */
            margin: 0;
            /* Tạo khoảng cách giữa các dòng */
            padding: 5px 10px;
            /* Chiều dài tối đa của tiêu đề và mô tả */
            max-width: 100%;
            max-height: 100%;
            /* Cắt ngắn văn bản và thêm dấu ba chấm nếu vượt quá độ dài */
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .summary {
            max-height: 93px; /* Chiều cao tối đa */
            overflow: hidden; /* Ẩn phần nội dung vượt quá */
            text-overflow: ellipsis; /* Thêm dấu ba chấm nếu vượt quá */
            white-space: nowrap; /* Ngăn không cho nội dung xuống dòng */
        }
        
        .product_list .article p{
            max-height: 93%;
            /* Cắt ngắn văn bản và thêm dấu ba chấm nếu vượt quá độ dài */
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
	</style>
</head>
<body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    var summaries = document.querySelectorAll('.summary');
    summaries.forEach(function(summary) {
        if (summary.offsetHeight < summary.scrollHeight) {
            summary.textContent = summary.textContent.slice(0, -3) + '...';
        }
    });
});
</script>
<?php
    $sql_bv = "SELECT * FROM tbl_baiviet WHERE tinhtrang=1 ORDER BY id_baiviet DESC";
    $query_bv = mysqli_query($mysqli, $sql_bv);
?>
	<!-- SECTION -->
    <div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<h3>TẤT CẢ BÀI VIẾT <span></span></h3>
                <ul class="product_list" >
                    <?php
                        while($row_bv= mysqli_fetch_array($query_bv)){
                    ?>
                    <li style="height: 320px;">
                        <a class="article article-all" href="index.php?act=baiviet&idtintuc=<?php echo $row_bv['id_baiviet'] ?>">
                            <img style="height: 200px" src="admin/giaodien/upload/<?php echo $row_bv['hinhanh'] ?>">
                            <h3 class="tenbaiviet"><?php echo $row_bv['tenbaiviet'] ?></h3>
                            <p class="summary" ><?php echo $row_bv['tomtat'] ?></p>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
    </div>
    </div>
</body>
</html>
					<!-- /shop -->