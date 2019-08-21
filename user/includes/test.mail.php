<?php

class MAILER {

    private $username = 'info@kyucu.co.ke';
    private $password = '***************';
    private $host = 'mail.kyucu.co.ke';
    private $port = 465;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    function sendmail($to, $message, $from,$subject)
    {
    
        //Load Composer's autoloader
        require 'vendor/autoload.php';
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //SMPT SERVER CONFIGURATION
            $mail->SMTPDebug = 2;    // Enable verbose debug output
            $mail->isSMTP();         // Set maile0791342771KYUCU.r to use SMTP
            $mail->Host = $this->host;
            $mail->SMTPAuth   = true;
            $mail->Username   = $this->username;       // SMTP username
            $mail->Password   = $this->password;
            $mail->SMTPSecure = 'ssl';     // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = $this->port;

            
            //RECEPIENTS
            $mail->setFrom($from, 'Christian Union - KYU');
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


}