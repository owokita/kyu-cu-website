<?php
require 'init.php';

if (isset($_POST['addministry'])) {
   $ministry =  ucfirst(strtolower($_POST['ministry'])) ;
   $userOBJ= new USER();
   //check if the position already exits

   $data = $userOBJ->countSpecific('mty_id', 'ministries',  $ministry);

   if ($data['id'] == 1) {
       echo "This ministry is already registered";
   //TODO: return the user with message
   } elseif (($data['id'] == 0)) {
       #Enter the recods to the database
       $sql = "INSERT INTO ministries (mty_id) VALUES ('$ministry');";
       $userOBJ->queryInsert($sql);
       //TODO: return the user with message
       redirect("../addministy.php");
   }

} else {
    redirect("../addministy.php");
}
