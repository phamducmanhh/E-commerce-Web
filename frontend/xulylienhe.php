<?php
require('../mail/sendmail.php');
require('../db/config.php');
if(isset($_POST['btnGoiLoiNhan'])){
    $mail = $_POST['email'];
    $_SESSION['maillienhe'] = $mail;
    $tieude ="THANK YOU - SHOP MY PHAM";
            $noidung = "<div>  
                            <p>Cảm ơn bạn đã phản hồi về chúng tôi</p>
                            <p>Chúng tôi sẽ cố gắn liên hệ với bạn trong thời gian sớm nhất</p>
                            <p></p>
                            <p>Trân trọng</p>
                        </div>";
            $maildathang = $_SESSION['maillienhe'];
            var_dump($maildathang);
            $mail=new Mailer();
            $mail->dathangmail($tieude, $noidung, $maildathang);
            
        header("Location: ../index.php?act=lienhe");
}
?>