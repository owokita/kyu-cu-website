<?php
require 'init.php';
if (isset($_POST['sendmail'])) {
    $subject = $_POST['subject'];
    $message = $_POST['editor1'];
    $sql = "SELECT user_email from user ";

    $userOBJ = new USER();
    $emails = $userOBJ->queryNone($sql);
    echo print_r($emails);


    require 'mailer.php';
    foreach ($emails  as $email) {
        sendmail($email['user_email'], $subject, $message);
    }
    
} else {
  
}
