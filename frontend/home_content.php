<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		.product .add-to-cart{
			background-color: #7f0000;
		}
		.slider{
			
			position: relative;
			left: 25%;
		}
		.slider img {
			
  display: none; /* Ẩn tất cả các hình ảnh */
  max-width: 75%%;
  height: 400px;
}

.slider img.active {
  display: block; /* Hiển thị hình ảnh hiện tại */
}



	</style>
</head>
<body>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
  const images = document.querySelectorAll('.slider img');
  let index = 0;

  function nextImage() {
    images.forEach(img => img.classList.remove('active')); // Ẩn tất cả các hình ảnh
    images[index].classList.add('active'); // Hiển thị hình ảnh tiếp theo
    index++;
    if (index === images.length) {
      index = 0; // Quay lại hình ảnh đầu tiên nếu đã hiển thị hết
    }
  }

  setInterval(nextImage, 3000); // Chuyển đổi hình ảnh sau mỗi 3 giây
});


	</script>
	<!-- SECTION -->
<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/banner1.jpg" alt="">
							</div>
							<div class="shop-body">
								<a href="index.php?act=tintuc"> <h3>Tin tức</h3> </a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/banner2.jpg" alt="">
							</div>
						<div class="shop-body">
							<a href="index.php?act=thuonghieu"> <h3>Thương Hiệu</h3> </a>
						</div>
					</div>
				</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/banner3.jpg" alt="">
							</div>
							<div class="shop-body">
								<a href="index.php?act=lienhe"><h3>Liên Hệ</h3></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->

			 <!-- Banner -->
			 
    <!-- /Banner -->
		</div>
		<!-- /SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Sản Phẩm Mới nhất</h3>
							
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
                                        <!-- product -->
                                        <?php
                                        $sql='select * from sanpham LIMIT 8';
                                        $list=executeResult($sql);
                                        foreach($list as $item){
											if($item['so_luong']==0 && $item['trangthai']==0){ // Hết hàng 
												echo '
												<div class="product">
												<div class="product-img" style="height:250px">
													<img src="./img/'.$item['hinh_anh'].'" alt="" style="height:100%">
													<div class="product-label">
														
														<span class="new">HẾT HÀNG</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category">SẢN PHẨM</p>
													<h3 class="product-name"><a href="?act=product&id='.$item['id'].'">'.$item['ten_sp'].'</a></h3>
													<h4 class="product-price">'.currency_format($item['don_gia']).' </h4>
													<div class="product-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													
												</div>
												<div class="add-to-cart">
													<button class="add-to-cart-btn" >SẢN PHẨM ĐÃ HẾT</button>
												</div>
											</div>';
											}else if($item['trangthai']==0)// Còn hàng
                                            echo '<div class="product" >
											<div class="product-img" style="height:250px" onclick="location=\'index.php?act=product&id='.$item['id'].'\'">
												<img src="./img/'.$item['hinh_anh'].'" alt="" style="height:100%">
												<div class="product-label">
													
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><small>'.$item['sl_da_ban'].' đã bán</small></p>
												<h3 class="product-name"><a href="?act=product&id='.$item['id'].'">'.$item['ten_sp'].'</a></h3>
												<h4 class="product-price">'.currency_format($item['don_gia']).'</h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn" onclick="addCart('.$item['id'].',1);themThanhCong('.$item['id'].');"><i class="fa fa-shopping-cart"></i> <span id="messAddCart'.$item['id'].'">thêm vào giỏ</span></button>
											</div>
										</div>';
                                        }
                                        ?>
										<!-- /product -->
										
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
        <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Tất cả Sản Phẩm</h3>
							
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
                                        <!-- product -->
                                        <?php
                                        $sql='select * from sanpham limit 8 offset 16';
                                        $list=executeResult($sql);
                                        foreach($list as $item){
											if($item['so_luong']==0 && $item['trangthai']==0){ // Hết hàng 
												echo '
												<div class="product">
												<div class="product-img" style="height:250px">
													<img src="./img/'.$item['hinh_anh'].'" alt="" style="height:100%">
													<div class="product-label">
														
														<span class="new">HẾT HÀNG</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category">SẢN PHẨM</p>
													<h3 class="product-name"><a href="?act=product&id='.$item['id'].'">'.$item['ten_sp'].'</a></h3>
													<h4 class="product-price">'.currency_format($item['don_gia']).' </h4>
													<div class="product-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													
												</div>
												<div class="add-to-cart">
													<button class="add-to-cart-btn" >SẢN PHẨM ĐÃ HẾT</button>
												</div>
											</div>';
											}else if($item['trangthai']==0)// Còn hàng
                                            echo '<div class="product" >
											<div class="product-img" style="height:250px" onclick="location=\'index.php?act=product&id='.$item['id'].'\'">
												<img src="./img/'.$item['hinh_anh'].'" alt="" style="height:100%">
												<div class="product-label">
													
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><small>'.$item['sl_da_ban'].' đã bán</small></p>
												<h3 class="product-name"><a href="?act=product&id='.$item['id'].'">'.$item['ten_sp'].'</a></h3>
												<h4 class="product-price">'.currency_format($item['don_gia']).'</h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn" onclick="addCart('.$item['id'].',1);themThanhCong('.$item['id'].');"><i class="fa fa-shopping-cart"></i> <span id="messAddCart'.$item['id'].'">thêm vào giỏ</span></button>
											</div>
										</div>';
                                        }
                                        ?>
										<!-- /product -->
										
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<div class="col-md-12" style="margin-top: 80px">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
                                        <!-- product -->
                                        <?php
                                        $sql='SELECT * FROM sanpham WHERE 1 limit 17, 70 ';
                                        $list=executeResult($sql);
                                        foreach($list as $item){
											if($item['so_luong']==0 && $item['trangthai']==0){ // Hết hàng 
												echo '
												<div class="product">
												<div class="product-img" style="height:250px">
													<img src="./img/'.$item['hinh_anh'].'" alt="" style="height:100%">
													<div class="product-label">
														
														<span class="new">HẾT HÀNG</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category">SẢN PHẨM</p>
													<h3 class="product-name"><a href="?act=product&id='.$item['id'].'">'.$item['ten_sp'].'</a></h3>
													<h4 class="product-price">'.currency_format($item['don_gia']).' </h4>
													<div class="product-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													
												</div>
												<div class="add-to-cart">
													<button class="add-to-cart-btn" >SẢN PHẨM ĐÃ HẾT</button>
												</div>
											</div>';
											}else if($item['trangthai']==0)// Còn hàng
                                            echo '<div class="product" >
											<div class="product-img" style="height:250px" onclick="location=\'index.php?act=product&id='.$item['id'].'\'">
												<img src="./img/'.$item['hinh_anh'].'" alt="" style="height:100%">
												<div class="product-label">
													
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><small>'.$item['sl_da_ban'].' đã bán</small></p>
												<h3 class="product-name"><a href="?act=product&id='.$item['id'].'">'.$item['ten_sp'].'</a></h3>
												<h4 class="product-price">'.currency_format($item['don_gia']).'</h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"  onclick="addCart('.$item['id'].',1);themThanhCong('.$item['id'].');"><i class="fa fa-shopping-cart"></i> <span id="messAddCart'.$item['id'].'">thêm vào giỏ</span></button>
											</div>
										</div>';
                                        }
                                        ?>
										<!-- /product -->
										
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

</body>
</html>

