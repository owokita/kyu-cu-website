<?php
require 'init.php';
if (isset($_GET['position'])) {
    $id = $_GET['position'];
    echo $id;
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
   
} else {
    redirect("../user.php");
}
