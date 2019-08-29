<?php

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

} else {
    require_once 'init.php';
    redirect("../user.php");
}
