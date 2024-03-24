		<!-- MAIN HEADER -->
		<div id="nd">
			<?php 
				include('./connect_db.php');
				include('./function.php');	
				$text = "Xin chào: " . $_SESSION['nguoidung'];
				echo '<div style="text-transform:uppercase;margin-right:5px">' .$text ."</div>";
				
			?>
		</div>
		<a style="float: left;
				  color: white;
				  margin-left: 20px;" 
		   href="./index.php?logout=yes" >Đăng xuất</a>
		