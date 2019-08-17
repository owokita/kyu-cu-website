<?php
    $msg = "";
    use PHPMailer\PHPMailer\PHPMailer;

    include_once "PHPMailer/PHPMailer.php";
    include_once "PHPMailer/Exception.php";
    include_once "PHPMailer/SMTP.php";

    if (isset($_POST['sendmail'])) {
        $subject = $_POST['subject'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        if (isset($_FILES['attachment']['name']) && $_FILES['attachment']['name'] != "") {
            $file = "attachment/" . basename($_FILES['attachment']['name']);
            move_uploaded_file($_FILES['attachment']['tmp_name'], $file);
        } else {
            $file = "";
        }

        $mail = new PHPMailer();

        //if we want to send via SMTP
        $mail->Host = "smtp.gmail.com";
        //$mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Username = "senaidbacinovic@gmail.com";
        $mail->Password = "5C1bcnPkDI4Wd%#";
        $mail->SMTPSecure = "tls"; //TLS
        $mail->Port = 465; //587

        $mail->addAddress('hello@codingpassiveincome.com');
        $mail->setFrom($email);
        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->Body = $message;
        $mail->addAttachment($file);

        if ($mail->send()) {
            $msg = "Your email has been sent, thank you!";
        } else {
            $msg = "Please try again!";
        }

        unlink($file);
    }
