

<div class="row1">
<form method="post" action="index.php?act=register" style="text-align:center;">

		<br><h3 class="title1">ĐĂNG KÝ TÀI KHOẢN</h3>
        <div class="form-group1">
        Username <br><input style="width:250px"class="input1" type="text" name="ten_dangnhap" value="" required placeholder="Tên đăng nhập" ><br>
        </div>
        <div class="form-group1">
        Password <br><input style="width:250px"class="input1" type="password" name="mat_khau" value="" required placeholder="Mật khẩu" /><br>
        </div>
        <div class="form-group1">
        Email <br><input style="width:250px"class="input1" type="email" name="email" value="" required placeholder="Email" /><br>
        </div>
        <div class="form-group1">
        Phone <br><input style="width:250px"class="input1" type="text" name="phone" value="" pattern="[0][0-9]{9}" id="phone" required placeholder="Số điện thoại=0xxxxxxxxx" /><br>
        </div>
        <div class="form-group1">
                Address <br>
                <input style="width:250px" class="input1" type="text" name="address" value="" required placeholder="Địa chỉ" /><br>
            </div>
		<input class="btn btn-danger"type="submit" name="dangky" value="Đăng Ký"/>
        <a href="index.php" class="btn btn-primary">Thoát</a>
		<?php require 'xulydangky.php';?>
		</form>
      
</div><br><br><br><br><br><br>
<style>
body {
    font-family: 'Helvetica', sans-serif;
    background-color: #f4f4f4;
    background: url('./img/1.jpg');
    background-size: 1400px 1000px; /* Set the size of the background image */
}

.row1 {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
    padding: 20px;
    margin: 50px auto;
}

h3.title1 {
    color: #333;
}

.form-group1 {
    margin-bottom: 15px;
}

.input1 {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    box-sizing: border-box;
}

.btn {
    background-color: #d9534f;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 10px; /* Adjust the margin as needed */
}

.btn:hover {
    background-color: #c9302c;
}

/* Styles for the "Thoát" button */
.btn-primary {
    background-color: #5bc0de;
}

.btn-primary:hover {
    background-color: #46b8da;
}

</style>
