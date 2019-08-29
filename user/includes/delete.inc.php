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
} elseif (isset($_GET['user'])) {
    $id = $_GET['user'];

    $sql = "DELETE FROM user WHERE (user_id = '$id'); ";
    $userOBJ = new USER();
    $userOBJ->queryInsert($sql);
    //TODO: Redirect with a Message
    redirect("../allmembers.php");
}

//remove ethe leader
elseif (isset($_GET['ministry'])) {
    $ministry = $_GET['ministry'];

    $sql = "DELETE FROM ministries WHERE (mty_id = '$ministry');";
    $userOBJ = new USER();
    $userOBJ->queryInsert($sql);
    //TODO: Redirect with a Message
    redirect("../addministy.php");
}
//remove CATEGORY
elseif (isset($_GET['category'])) {
    $category = $_GET['category'];

    $sql = "DELETE FROM category WHERE (category_name = '$category');";
    $userOBJ = new USER();
    $userOBJ->queryInsert($sql);
    //TODO: Redirect with a Message
    redirect("../addCategory.php");
}

//delete post
elseif (isset($_GET['article'])) {
    $articleID = $_GET['article'];

    $sql = "SELECT articleimg FROM article WHERE article_id =  ?";
    $userOBJ = new USER();
    $data =  $userOBJ-> query_1($sql, $articleID);

    $image = $data['articleimg'];
    $target = "images/" . $image;

 

    if (unlink($target )) {
        
        echo ("Error deleting $image ");
      } else {
        echo ("Deleted $image ");
      }
    
    


    $sql = "DELETE FROM article WHERE (article_id = '$articleID');";
    $userOBJ = new USER();
    $userOBJ->queryInsert($sql);
    //TODO: Redirect with a Message
    redirect("../userpost.php");
} else {
     redirect("../user.php");
 }
