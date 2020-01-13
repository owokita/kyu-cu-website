<?php
//this will update the leaders quotes
if (isset($_POST['leaderquote'])) {
    require 'init.php';
    $quote = $_POST['quote'];

    // exit();
    $userOBJ = new USER();
    //GET SESSION ID
    $sessID = $userOBJ->getSessionID();
    //TODO: USE PREPARED STATEMEMTS
    $sql = "UPDATE leaders SET leaders_quote = '$quote' WHERE (leaders_fk_user_id = '$sessID ');";

    // $userOBJ->writeSpecific($sql, $sessID);
    $stmt = $userOBJ->conn()->prepare($sql);
    $stmt->execute();

    redirect("../settings.php?message=updatesuccess");

    echo $quote;

    echo "it is working";
} elseif (isset($_POST['updatephone'])) {
    require 'init.php';
    $phone = "+254";
    $phone .= $_POST['phoneNo'];
    //get the session of the person who is logged in
    $sess = new SESSION();
    $sessId = $sess->getSessionID();

    $sql = "UPDATE user SET user_phobeNo = '$phone' WHERE (user_id = $sessId);";
    
  
    $userOBJ = new USER();
    $stmt = $userOBJ->conn()->prepare($sql);
    $stmt->execute();

    redirect("../settings.php?message=updatesuccess");
} else {
    require_once 'init.php';
    redirect("../user.php");
}
