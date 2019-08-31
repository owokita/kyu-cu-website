<?php
require 'init.php';
require 'article.php';

if (isset( $_SESSION['user_id'])) {
    if (isset($_POST['comment'])) {
        $comment = $_POST['comment_content'];
        $articleID = $_POST['artid'];
    
       
        $sess = new SESSION();
        $sessId = $sess->getSessionID();
    
        $sql = "INSERT INTO article_comments (comment, article_comment_fk_article_id, article_comments_fk_user_id) VALUES ('$comment', '$articleID ', '$sessId')";
        $artOBJ = new ARTICLE();
        $artOBJ->queryInsert($sql);

       


    
        redirect("http://localhost/cuweb/article.php?id=$articleID");
    } else {
        redirect("index.php");
    }
} else {
    redirect("../login.php?login");
}
exit();

