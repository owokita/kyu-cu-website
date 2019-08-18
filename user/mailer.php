<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //SMPT SERVER CONFIGURATION
    $mail->SMTPDebug = 2;    // Enable verbose debug output
    $mail->isSMTP();         // Set maile0791342771KYUCU.r to use SMTP
    $mail->Host = 'mail.kyucu.co.ke';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'info@kyucu.co.ke';                     // SMTP username
    $mail->Password   = '0791342771KYUCU.';
    $mail->SMTPSecure = 'ssl';     // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;

    //RECEPIENTS
    $mail->setFrom('info@kyucu.co.ke', 'CHRISTIAN UNION - KYU');
    $mail->addAddress('dijiflex@gmail.com');
    $mail->addReplyTo('info@kyucu.co.ke','KYU_CU');
    
    
    //CONTENT
    $mail->isHTML(true);
    $mail->Subject = 'welcome To Kirinyaga Christian Union';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

    $mail->send();

    echo 'message has been sent';
} catch (Exception $e) {
    echo 'error while sending the message . Error:', $mail->ErrorInfo;
}

?>