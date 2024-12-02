<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../carbon/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnGoiLoiNhan'])) {
    $email = htmlspecialchars($_POST['email']);
    $title = htmlspecialchars($_POST['title']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.example.com';  // Replace with your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'phamducmanh2406932gmail.com'; // Replace with your SMTP username
        $mail->Password   = 'fkqwtvnkkwhlvgww';   // Replace with your SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('phamducmanh240693@gmail.com', 'CNM'); // Replace with your email address and company name
        $mail->addAddress($email);     // Add the user's email address
        //$mail->addReplyTo('your-email@example.com', 'Information');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Cảm ơn bạn đã liên hệ với chúng tôi';
        $mail->Body    = "Xin chào,<br><br>Cảm ơn bạn đã liên hệ với chúng tôi. Chúng tôi sẽ phản hồi bạn sớm nhất có thể.<br><br>Tiêu đề: " . $title . "<br>Lời nhắn:<br>" . nl2br($message);
        $mail->AltBody = "Xin chào,\n\nCảm ơn bạn đã liên hệ với chúng tôi. Chúng tôi sẽ phản hồi bạn sớm nhất có thể.\n\nTiêu đề: " . $title . "\nLời nhắn:\n" . $message;

        $mail->send();
        echo "Email đã được gửi. Cảm ơn bạn đã liên hệ với chúng tôi.";
    } catch (Exception $e) {
        echo "Email không thể gửi. Lỗi: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request method.";
}
