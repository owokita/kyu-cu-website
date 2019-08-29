<?php

//insert.php
require 'init.php';
if (isset($_POST["image"])) {
    $userOBJ = new USER();
    $id = $userOBJ->getSessionID();

    $data = $_POST["image"];

    $image_array_1 = explode(";", $data);
   
    $image_array_2 = explode(",", $image_array_1[1]);
   
    $data = base64_decode($image_array_2[1]);
   
    $imageName = time() . '.png';
   
    file_put_contents($imageName, $data);
   
    $image_file = addslashes(file_get_contents($imageName));
   

    
    $query = "UPDATE leaders SET leaders_img = '$image_file' WHERE (leaders_fk_user_id = '$id');";
   
  
    $stmt= $userOBJ->conn()->prepare($query);
  
   
    if($stmt->execute())
    {
     echo 'Your Has been Updated Successfuly Please Confirm it on the homepage';
     unlink($imageName);
    }
}
