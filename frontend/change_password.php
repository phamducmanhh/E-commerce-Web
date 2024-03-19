
<?php
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    require_once('db/dbhelper.php');
    require_once('common/utility.php'); 

    // Check if the user is logged in
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['doimatkhau'])) {
    // Handle password change logic here
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the old password is correct
    $check_old_password_sql = 'SELECT * FROM khachhang WHERE ten_dangnhap = "'.$ten_dangnhap.'" AND mat_khau = "'.$old_password.'"';
    $result = executeSingleResult($check_old_password_sql);

    if ($result) {
        // Old password is correct, proceed with the change
        if ($new_password === $confirm_password) {
            // Update the password in the database (without hashing)
            $update_sql = 'UPDATE khachhang SET mat_khau = "'.$new_password.'" WHERE ten_dangnhap = "'.$ten_dangnhap.'"';
            execute($update_sql);

            // Set success message
            $success_message = 'Đổi mật khẩu thành công.';
            
            // You can redirect to another page if needed
            // header('Location: change_password_success.php');
            // exit();
        } else {
            $error_message = 'Mật khẩu mới và xác nhận mật khẩu không khớp.';
        }
    } else {
        $error_message = 'Mật khẩu cũ không đúng.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
<style>
    .change-password-container {
        max-width: 400px;
        margin: 30px auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        
    }

    .change-password-title {
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .change-password-input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        transition: border-color 0.3s;
    }

    .change-password-input:focus {
        border-color: #3498db;
    }

    .change-password-button {
        background-color: #3498db;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .change-password-button:hover {
        background-color: #2980b9;
    }
</style>


<!-- Google font -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">


<!-- Bootstrap -->
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

<!-- Slick -->
<link type="text/css" rel="stylesheet" href="css/slick.css"/>
<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

<!-- nouislider -->
<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

<!-- Font Awesome Icon -->
<link rel="stylesheet" href="css/font-awesome.min.css">

<!-- Custom stlylesheet -->
<link type="text/css" rel="stylesheet" href="css/style.css"/>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- jQuery library -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script type="text/javascript" src="js/jquery1.min.js"></script>
 <!-- Popper JS  -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
<script type="text/javascript" src="js/popper.min.js"></script> 
</head>
<body>
<div id="wapper">
        <div id="header">
            <?php require_once('frontend/header.php'); ?>
        </div>
        

        <div class="change-password-container">
        <form action='change_password.php' style="text-align:center;" class="change-password-form" method='POST'> 
            <h3 class="change-password-title">ĐỔI MẬT KHẨU</h3>
            
            <?php if (!empty($success_message)): ?>
                <p style="color: green;"><?php echo $success_message; ?></p>
                <script>
                    setTimeout(function(){
                        window.location.href = 'index.php';
                    }, 3000); // Redirect after 3 seconds
                </script>
            <?php endif; ?>
            
            <?php if (isset($error_message)): ?>
                <p style="color: red;"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <div class="form-group">
    <!-- Display the current username, which cannot be changed -->
    <span style="font-size: 18px; font-weight: bold;"><?php echo $ten_dangnhap; ?></span>
</div>
            
            <div class="form-group">
    <input class="change-password-input" type='password' name='old_password' placeholder="Mật khẩu cũ" required />
</div>
<div class="form-group">
    <input class="change-password-input" type='password' name='new_password' placeholder="Mật khẩu mới" required />
</div>
<div class="form-group">
    <input class="change-password-input" type='password' name='confirm_password' placeholder="Xác nhận mật khẩu mới" required />
</div>
<input class="change-password-button" type='submit' name="doimatkhau" value='Đổi mật khẩu' />
<a href="index.php" class="btn btn-primary">Thoát</a>
        </form>
    </div>
        <div id="footer">
        <?php require_once('frontend/footer.php'); ?>
        </div>
</div>

    
</body>
</html>