		<!-- MAIN HEADER -->
		<div id="nd">
			<?php 
				include('./connect_db.php');
				include('./function.php');	
				$text = "<i class='fa fa-user fa-fw'> </i>" . $_SESSION['nguoidung'];
				echo '<div style="text-transform:uppercase;margin-right:5px">' .$text ."</div>";
				
			?>
		</div>
		<a style="float: left;
				  color: black;
				  margin-left: 20px;
				  font-size:19px"  href="../index.php"> <i class="fa fa-home"></i>Trang chủ</a> 
		
		<a style="float: left;
				  color: black;
				  margin-left: 20px;
				  font-size:19px" 
		   href="./index.php?logout=yes" ><i class="fa fa-sign-out" aria-hidden="true"></i>Đăng xuất</a>
		 