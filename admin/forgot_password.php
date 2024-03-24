<?php
// Include necessary files and configurations

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form submission
    $email = $_POST['forgot_email'];

    // Validate email and check if it exists in your database
    // ...

    // Generate a unique token (you might use a library for this)
    $token = bin2hex(random_bytes(32));

    // Store the token and associated email in your database
    // ...

    // Send an email to the user with a link to reset their password
    $reset_link = "http://yourwebsite.com/reset_password.php?email=$email&token=$token";
    
    $to = $email;
    $subject = 'Reset Your Password';
    $message = "Click the following link to reset your password: $reset_link";
    $headers = 'From: webmaster@example.com';

    mail($to, $subject, $message, $headers);
    echo 'An email with instructions to reset your password has been sent.';
}
?>

<div class="row1">
    <form method="post" action="forgot_password.php" style="text-align:center;">
        <br><h3 class="title1">QUÊN MẬT KHẨU</h3>
        <div class="form-group1">
            Email <br><input style="width:250px" class="input1" type="email" name="forgot_email" required placeholder="Nhập địa chỉ email" /><br>
        </div>
        <input class="btn btn-danger" type="submit" name="quenmatkhau" value="Gửi yêu cầu đặt lại mật khẩu" />
    </form>
</div>
