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

    //NOTIFY THE AMDIN OF THE NEW POST
    $sql = "SELECT user_email from admin inner join user on 
    user_id =admin_fk_user_id";
    $emails =$artOBJ->queryNone($sql);
    require 'mailer.php';
    $subject = "POST FROM A MEMBER";
    $message = '
     <p>There is a new POST from a member on the Kirinyaga University Christian Union Website.</p>

        <p>Please use the link&nbsp;or button below to verify the POST.</p>

        <p><a href="https://test.kyucu.co.ke/user/unverified.php">https://test.kyucu.co.ke/user/unverified.php</a></p>

        <p><a href="https://test.kyucu.co.ke/user/unverified.php"><span style="font-size:18px"><span style="color:#27ae60"><strong><span style="background-color:#f1c40f">VERIFY POST</span></strong></span></span></a></p>

        <p>&nbsp;</p>
     ';
    foreach ($emails as $email) {
        sendmail($email, $subject, $message);
    }
    
    redirect("../userpost.php");
} elseif (isset($_POST['update_article'])) {
    $artid=$_POST['artid'];
    $title =$_POST['post-title'];
    $content =$_POST['content2'];
    $category = $_POST['category'];


    //check if the user changed the image
    if (empty($_FILES["image"]["name"])) {
        $sql ="UPDATE article SET article_tittle = ?, article_text = ?,  category_fk_category_name = ? WHERE (article_id = $artid)";
        $userOBJ = new USER();
        $stmt = $userOBJ->conn()->prepare($sql);
        $stmt->execute([$title,$content,$category ]);
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
    
    redirect("../userpost.php");
} elseif (isset($_POST['verify_article'])) {
    $artid=$_POST['artid'];
    $userid=$_POST['userid'];


    $userOBJ= new USER();
    $sessID = $userOBJ->getSessionID();
    $sessdata =$userOBJ->getuserbyid($sessID);
    $sessName = $sessdata['user_fname'] . ' '. $sessfname = $sessdata['user_lname'];

    $sql ="UPDATE article SET article_status = '1', verified_by = '$sessName' WHERE (article_id =  $artid);
    ";

    $artOBJ = new ARTICLE();
    if ($artOBJ->queryInsert($sql)) {
        redirect('../unverified.php');
    } else {
        echo  "no";
    }

    //reject the artcle
} elseif (isset($_POST['reject_article'])) {
    $artid=$_POST['artid'];
    $userid=$_POST['userid'];


    $userOBJ= new USER();
    $sessID = $userOBJ->getSessionID();
    $sessdata =$userOBJ->getuserbyid($sessID);
    $sessName = $sessdata['user_fname'] . ' '. $sessfname = $sessdata['user_lname'];

    $sql ="UPDATE article SET article_status = '0', verified_by = '$sessName' WHERE (article_id =  $artid);
    ";

    $artOBJ = new ARTICLE();
    if ($artOBJ->queryInsert($sql)) {
        redirect('../unverified.php');
    } else {
        echo  "no";
    }
} elseif (isset($_POST['post_likes'])) {

    $articleid = $_POST['articleid'];
    $react = $_POST['react'];
    $userid = $_SESSION['user_id'];

    $userOBJ= new USER();


    //check if the user has already liked the artices
    $sql= "SELECT * from article_likes WHERE article_fk_article_id = $articleid AND user_fk_user_id = $userid";
    if ($stmt = $userOBJ->conn()->prepare($sql)) {
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            $sql = "INSERT INTO article_likes (article_fk_article_id, user_fk_user_id) VALUES ('$articleid', '$userid');
            ";
            $userOBJ->queryInsert($sql);
        }
    }
    
    // echo var_dump($_POST);
    exit(json_encode($_POST));
} else {
    echo ' you are in the woring place';
    redirect('../user.php');
}
