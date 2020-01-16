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
            $sql ="DELETE FROM article_likes where article_fk_article_id = $articleid  AND user_fk_user_id = $userid";
            $userOBJ->queryInsert($sql);

            exit(json_encode(true));
        } else {
            $sql = "INSERT INTO article_likes (article_fk_article_id, user_fk_user_id) VALUES ('$articleid', '$userid');
            ";
            $userOBJ->queryInsert($sql);
        }
    }
    
    // echo var_dump($_POST);
    exit(json_encode($_POST));
} elseif (isset($_POST['user_reaction'])) {
    $userid = $_SESSION['user_id'];
    $articleid = $_POST['articleid'];
    $userOBJ= new USER();

    //check if the user has already liked the artices
    $sql= "SELECT * from article_likes WHERE article_fk_article_id = $articleid AND user_fk_user_id = $userid";
    if ($stmt = $userOBJ->conn()->prepare($sql)) {
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            exit(json_encode(true));
        } else {
            exit(json_encode(false));
        }
    }
} elseif (isset($_POST['loadlikes'])) {
    $id = $_POST['loadlikes'];
    $artOBJ = new ARTICLE();
    $sql = "SELECT  count(article_fk_article_id) FROM article_likes where article_fk_article_id = $id";
    $count = $artOBJ->countSpecific('article_fk_article_id', 'article_likes', $id);
    exit(json_encode($count['0']));
} elseif (isset($_POST['porpularArticles'])) {
    //get the ids and total likes of the most porpular arcticles
    $artOBJ = new ARTICLE();
    $art_data = $artOBJ->getArtPorpular();
    $art1 = $art_data[0]['articleID'];
    $art2 = $art_data[1]['articleID'];

   
    //get the details of the most porpupar articles
    $sql = "SELECT article_id,article_tittle,article_text,article_pub_date,articleimg,user_fname,user_lname,article_fk_user_id,likes,article_status,category_fk_category_name,verified_by  FROM article 
        inner join user on user_id = article_fk_user_id
        where article_status = 1 AND article_id = $art1 OR article_id = $art2";
    $data = $artOBJ->queryNone($sql);
    //COUNT THE total number of comments on each article
    $sql = "SELECT article_comment_fk_article_id AS articleID, COUNT(article_comment_fk_article_id) as total from 
    article_comments WHERE article_comment_fk_article_id = $art1 OR article_comment_fk_article_id = $art2 group by article_comment_fk_article_id  order by total DESC LIMIT 2 ";
    $artcount = $artOBJ->queryNone($sql);
    
    $article = array();
    $article[] = array(
        "content"=>$data[0],
        "comments"=>$artcount[0]['total'],
        "likes"=>$art_data[0]['total'],

    );
    $article[] = array(
        "content"=>$data[1],
        "comments"=>$artcount[1]['total'],
        "likes"=>$art_data[1]['total'],
    );
exit(json_encode($article));
} else {
    echo ' you are in the woring place';
    // redirect('../user.php');
}
