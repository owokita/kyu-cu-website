<?php
 
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


    function sendmail($to,$subject,$message){

        //Load Composer's autoloader
        require 'vendor/autoload.php';
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //SMPT SERVER CONFIGURATION
        // $mail->SMTPDebug = 2;    // Enable verbose debug output
        $mail->isSMTP();         // Set maile0791342771KYUCU.r to use SMTP
        $mail->Host = '**************';
            $mail->SMTPAuth   = true;
            $mail->Username   = '*****************8';        // SMTP username
            $mail->Password   = '***************';
            $mail->SMTPSecure = 'ssl';     // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 465;
          

            
            //RECEPIENTS
            $mail->setFrom('noreply@kyucu.co.ke', 'Christian Union - KYU');
            $mail->addAddress($to);

        
            //CONTENT
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();

            echo 'message has been sent';
        } catch (Exception $e) {
            echo 'error while sending the message . Error:', $mail->ErrorInfo;
        }


    }
   
