<?php

if (isset($_POST['submit'])) {
    $name= $_POST['name'];
    $subject= $_POST['subject'];
    $mailfrom= $_POST['mail'];
    $message= $_POST['message'];

    $mailto = "info@kyucu.co.ke";
    $header = "From: ".$mailfrom;
    $txt = "You have recived an email from".$name.".\n\n".$message;

    // this is the mail function
    mail($mailto, $subject, $txt, $header);

    header("Location: index.php?Mailsent");


} else {
   echo "You need to click the submit button";
}
