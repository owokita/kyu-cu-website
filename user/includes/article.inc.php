<?php
require_once 'init.php';
require_once 'article.php';




if (isset($_POST['post_article'])) {
    require_once('functions.php');

    //adding time stamp to the image
    $path_parts = pathinfo($_FILES["image"]["name"]);
    $new_file = $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];
    $target = "images/";
    $target = $target . $new_file ;
    // echo $new_file;
    $artOBJ = new ARTICLE();
    $artOBJ->setArt_title($_POST['post-title']);
    $artOBJ->setArt_content($_POST['content']);
    $artOBJ->setArt_poster($artOBJ->getSessionID());
    $artOBJ->setArt_img($new_file);
    $artOBJ->setArt_categ($_POST['category']);

    $artOBJ->insertArt();
    if (compress($_FILES['image']['tmp_name'], $target, 20)) {
    }
    
    redirect("../userpost.php");
} elseif (isset($_POST['update_article'])) {
    

    $artid=$_POST['artid'];
    $title =$_POST['post-title'];
    $content =$_POST['content2'];
    $category = $_POST['category'];

    //check if the user changed the image
    if (empty($_FILES["image"]["name"])) {
    } else {
        require_once('functions.php');
        //adding time stamp to the image
        $path_parts = pathinfo($_FILES["image"]["name"]);
        $new_file = $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];
        $target = "images/";
        $target = $target . $new_file ;

        $sql ="UPDATE article SET article_tittle = ?, article_text = ?, articleimg = ?, category_fk_category_name = ? WHERE (article_id = $artid)";
        $userOBJ = new USER();
        $stmt = $userOBJ->conn()->prepare($sql);
        $stmt->execute([$title,$content,$new_file,$category ]);
        
        if (compress($_FILES['image']['tmp_name'], $target, 20)) {

            echo "the image was compressed successfuly";
        } else {
            echo "there was an error NO 101000 compressing the image please repoer this to the admin: 0701702734 or dijiflex@gmail.com";
        }
    }
    

    exit();

    redirect("../userpost.php");
} else {
    echo "you are trying to access this page the wrong way";
}
