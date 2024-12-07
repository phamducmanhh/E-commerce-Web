<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">GIỎ hÀNG</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Trang chủ</a></li>
							<li class="active">Giỏ hàng</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row " style="padding-right:5%; padding-left:5%">

					

					<!-- Order Details -->
					<div class="col col-lg-12 order-details" >
						<div class="section-title text-center">
							<h3 class="title">Giỏ Hàng</h3>
						</div>
						<div class="order-summary">
							<div class="order-products">
								<?php
								echo '<table class="row" style="width:100%;vertical-align:middle;">
								<tr>
									<td></td>
									<td><strong>SẢN PHẨM</strong></td>
									<td><strong>GIÁ</strong></td>
									<td  align=center ><strong>SỐ LƯỢNG</strong></td>
									<td></td>
								</tr>';
								$total=0;
									if(isset($_SESSION['cart'])){
										
										$cart=$_SESSION['cart'];
										foreach($cart as $key =>$value){
											$soLuongTonKho=executeSingleResult('SELECT so_luong FROM sanpham WHERE id='.$key)['so_luong'];
											echo '
												<tr>
													<td width=60px>
														
														<img src="./img/'.$value['img'].'" width="100%">
														
													</td>
													<td width=40%>'.$value['name'].'</td>
													<td>'.currency_format($value['price']).'</td>
													<td  align=center style="width:100px">
														<div class="row" style="display: inline-block;">
															<input type="button" value="-" onclick="addCart('.$key.',0);location.reload();">
															<input style="width:40px;" type="number"  id="soLuong'.$key.'" value="'.$value['qty'].'" min=1 style="width:30px;" readonly onchange="kiemTraSoLuong1('.$soLuongTonKho.','.$key.');" >
															<input type="button" value="+" onclick="addCart('.$key.',1);kiemTraSoLuong1('.$soLuongTonKho.','.$key.');location.reload();">
														</div>
														<p id="tbQty'.$key.'" style="color:red"></p>
													</td>
													<td width=10% align=right>
														
														<button class="delete" onclick="addCart('.$key.',-1);location.reload();"><i class="fa fa-close fa-xs"></i></button>
													</td>
												</tr>';
											

											$shippingFee = 15000;
											$totalPrice = $value['price'] * $value['qty'];
											$total += $totalPrice + $shippingFee;

											// Kiểm tra nếu tổng giá trị mua hàng vượt qua 1000000
											if ($totalPrice > 1000000) {
												// Giảm phí vận chuyển
												$total -= $shippingFee;
											}

											// $total giờ chứa tổng số tiền cần thanh toán, đã áp dụng giảm phí nếu tổng giá trị mua hàng vượt qua 1000000

										}
									}
									echo '</table>';
								?>
							</div>
							<div class="order-col">
							<div>PHÍ GIAO HÀNG</div>
							<?php
							if ($total > 1000000) {
								echo '<div><strong>Miễn phí vận chuyển</strong></div>';
							} else {
								echo '<div><strong>' . currency_format(15000) . '</strong></div>';
							}
							?>
							</div>
							
								<!-- <div class="form-check">
									<input class="form-check-input" type="radio" name="payment" id="exampleRadios4" value="vnpay" >
									<img src="img/vnpay.png" style="width:94px; height: 36px">
									<label class="form-check-label" for="exampleRadios4">
										
									</label>
								</div> -->
							
							
							<div class="order-col">
								<div><strong>TỔNG TIỀN</strong></div>
								<div><strong class="order-total"><?=currency_format($total)?></strong></div>
							</div>
						</div>
						
						
						<!-- <button id="btnThanhToanThanhCong"style="width:100% ;display:none;" class="btn-success btn order-submit" >ĐẶT HÀNG THÀNH CÔNG</button>
						<?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
							if(isset($_SESSION['ten_dangnhap']) && !empty($_SESSION['ten_dangnhap']))
								echo '<button style="width:100%" onclick="thanhtoan(\''.$_SESSION['ten_dangnhap'].'\'); thanhToanThanhCong();" name = class="primary-btn order-submit" >Tiến Hành THanh Toán</button>';
								else echo '<button style="width:100%" class="primary-btn order-submit" >Vui Lòng đăng nhập để Tiến Hành THanh Toán</button>';
							//<a href="frontend/thanh_toan.php" class="primary-btn order-submit" >Tiến Hành THanh Toán</a>
						}
							?> -->

<?php 
	if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
		if(isset($_SESSION['ten_dangnhap']) && !empty($_SESSION['ten_dangnhap'])){
?>
<form action="?act=xulythanhtoan" method="POST">
<div class="form-check">
      <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="tienmat" checked>
      <!-- <img src="images/tienmat.jpg" style="width:47px; height: 33px"> -->
      <label class="form-check-label" for="exampleRadios1">
        Tiền mặt
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="payment" id="exampleRadios4" value="vnpay" >
      <img src="img/vnpay.png" style="width:94px; height: 36px">
      <label class="form-check-label" for="exampleRadios4">
        
      </label>
    </div>
    <input type="submit" value="Thanh toán" name="redirect" id="redirect" class="btn btn-danger">
    <p></p>
	</form>
	<?php
      $tongtien=0;
	  $shipping = 15000;
	  
      foreach($_SESSION['cart'] as $key => $value){
        $thanhtien = $value['qty']*$value['price'] ;
        $tongtien+= $thanhtien + $shipping;
		
		if($thanhtien>1000000){
			$tongtien -= $shipping;
		}
      }
      $tongtien_vnd = $tongtien;
      $tongtien_usd = round($tongtien/23677);
	  

	  
    ?>
	<input type="hidden" name="" value="<?php echo $tongtien_vnd ?>" id="tongtien">
	<!-- <div id="paypal-button-container"></div> -->
	<!-- <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="frontend/xulythanhtoanmomo.php">
      <input type="hidden" value="<?php echo $tongtien_vnd ?>" name = "tongtien_vnd">
      <input type="submit" name="momo" value="Thanh toán MOMO QRcode" class="btn btn-danger">
    </form>
    <p></p>
	<form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="frontend/xulythanhtoanmomo_atm.php">
      <input type="hidden" value="<?php echo $tongtien_vnd ?>" name = "tongtien_vnd">  
      <input type="submit" name="momo" value="Thanh toán MOMO ATM" class="btn btn-danger">
    </form> -->
	

	<?php
		} else {
			echo '<a style="width:100%" class="primary-btn order-submit" href="?index.php&act=login">Vui lòng đăng nhập để thanh toán</a>';
			//echo '<button style="width:100%" onclick="window.location.href=\'http://localhost:8088/CNM/index.php?act=login\'" class="primary-btn order-submit">Vui lòng đăng nhập để tiến hành thanh toán</button>';
		}
	}
	?>


					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			</form>
			<!-- /container -->
		</div>
		<!-- /SECTION -->