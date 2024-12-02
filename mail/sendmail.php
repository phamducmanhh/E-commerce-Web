<?php
// Include PHPMailer files
include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/OAuth.php";
include "PHPMailer/src/POP3.php";
include "PHPMailer/src/SMTP.php";
include "CustomPHPMailer.php"; // Include file CustomPHPMailer.php

use PHPMailer\PHPMailer\CustomPHPMailer;
use PHPMailer\PHPMailer\Exception;
class Mailer{
    public function dathangmail($tieude, $noidung, $maildathang){
    $mail = new CustomPHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'phamducmanh240693@gmail.com';      // SMTP username
    $mail->Password = 'xhhptghvnqrnykpj';                // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    // Recipients
    $mail->setFrom('phamducmanh240693@gmail.com', 'Mailer');
    $mail->addAddress($maildathang, 'Duc Manh');  // Add a recipient
    $mail->addCC('phamducamnh240693@gmail.com');

    // Attachments (if any)
    // $mail->addAttachment('/var/tmp/file.tar.gz');       // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');  // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $tieude;
    $mail->Body    = $noidung;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}}
}


?>
