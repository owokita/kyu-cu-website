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
    $mail->Host = '   smtp25.elasticemail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = '1kyuc.cu@gmail.com';                     // SMTP username
    $mail->Password   = 'e91bc04e-8734-4243-bb3d-0b13bc6deab3';
    $mail->SMTPSecure = 'ssl';     // Enable TLS encryption, `ssl` also accepted
    $mail->Port       =
    25;

    //RECEPIENTS
    $mail->setFrom('info@kyucu.co.ke', 'CHRISTIAN UNION - KYU');
    $mail->addAddress('dijiflex@gmail.com');
    $mail->addReplyTo('info@kyucu.co.ke', 'KYU_CU');
    
    
    //CONTENT
    $mail->isHTML(true);
    $mail->Subject = 'welcome To Kirinyaga Christian Union';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

    $mail->send();

    echo 'message has been sent';
} catch (Exception $e) {
    echo 'error while sending the message . Error:', $mail->ErrorInfo;
}
