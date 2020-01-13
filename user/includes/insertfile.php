<?php

//insert.php

if (isset($_FILES["imageuserimage"])) {
    require 'init.php';
    $userOBJ = new USER();
    //1. GEt the session id of  the person who is logged in
    $id = $userOBJ->getSessionID();
    $data = $_FILES["imageuserimage"];
    //2. check if the user already
    

    //3.  compress and inser the file
    require_once('functions.php');
    //adding time stamp to the image
    $target = "../images/userimgs/";
    if (!empty($_FILES["imageuserimage"]["name"])) {
        $path_parts = pathinfo($_FILES["imageuserimage"]["name"]);
        $new_file = $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];
        $target1 = $target . $new_file ;
        if (compress($_FILES['imageuserimage']['tmp_name'], $target1, 50)) {
            //update the database
            $query = "UPDATE user SET user_img = '$new_file' WHERE (user_id = '$id');";
            $stmt= $userOBJ->conn()->prepare($query);
            $userOBJ->queryInsert($query);
        }
    }
} else {
    echo "you are accessing this place the wrong way";
}
