<?php
// Include necessary files and configurations

// Validate the email and token from the URL
$email = $_GET['email'];
$token = $_GET['token'];

// Check if the email and token combination exists in your database
// ...

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form submission (reset password)
    $new_password = $_POST['new_password'];

    // Validate and update the password in your database
    // ...

    echo 'Your password has been reset successfully.';
}
?>

<div class="row1">
    <form method="post" action="reset_password.php" style="text-align:center;">
        <br><h3 class="title1">ĐẶT LẠI MẬT KHẨU</h3>
        <div class="form-group1">
            New Password <br><input style="width:250px" class="input1" type="password" name="new_password" required placeholder="Nhập mật khẩu mới" /><br>
        </div>
        <input class="btn btn-danger" type="submit" name="reset_password" value="Đặt lại mật khẩu" />
    </form>
</div>
