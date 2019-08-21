<?php
require 'init.php';
if (isset($_GET['position'])) {
    $id = $_GET['position'];
    if (!empty($id)) {
        $sql = "DELETE FROM position WHERE (position_name = '$id');";
        $userOBJ = new USER();
        //FIXME: Redirect with a Message
        if ($userOBJ->queryInsert($sql)) {
            redirect("../addposition.php");
        } else {
         //FIXME: Redirect with a Message
            redirect("../addposition.php");
        }
    } 
} elseif (isset($_GET['leader'])) {
    $id = $_GET['leader'];
    $sql = "DELETE FROM leaders WHERE (leaders_fk_user_id = '$id'); ";
    $userOBJ = new USER();
    $userOBJ->queryInsert($sql);
    redirect("../churchleader.php");

}  elseif (isset($_GET['user'])) {
    $id = $_GET['user'];

    $sql = "DELETE FROM user WHERE (user_id = '$id'); ";
    $userOBJ = new USER();
    $userOBJ->queryInsert($sql);
    //TODO: Redirect with a Message
    redirect("../allmembers.php");
}
 else {
    redirect("../user.php");
}
