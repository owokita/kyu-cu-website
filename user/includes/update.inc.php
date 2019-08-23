<?php

if (isset($_POST['leaderquote'])) {
    require_once 'init.php';
    $quote = $_POST['quote'];

    echo $quote;

    echo "it is working";
    
    // exit();
    $userOBJ = new USER();
    //GET SESSION ID
    $sessID = $userOBJ->getSessionID();
    //TODO: USE PREPARED STATEMEMTS
    $sql = "UPDATE leaders SET leaders_quote = '$quote' WHERE (leaders_fk_user_id = '$sessID ');";

    $userOBJ->writeSpecific($sql, $sessID);

    redirect("../settings.php?message=updatesuccess");

} else {
    require_once 'init.php';
    redirect("../user.php");
}
