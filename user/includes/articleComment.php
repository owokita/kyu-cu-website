<?php
require 'init.php';
require 'article.php';
$artOBJ = new ARTICLE();
$error = '';


    if (isset($_POST['comment_content'])) {
        if (isset($_SESSION['user_id'])) {
            $comment = $_POST['comment_content'];
            $articleID = $_POST['artid'];
            $parentComment = $_POST['comment_id'];

            //GET ID of the peron who is logged in
            $sess = new SESSION();
            $sessId = $sess->getSessionID();
    
            $sql = "INSERT INTO article_comments (comment, article_comment_fk_article_id, article_comments_fk_user_id,parent_comment_id) VALUES (?,?,?,?)";
            $stmt = $artOBJ->conn()->prepare($sql);
            $stmt->execute([$comment, $articleID , $sessId, $parentComment]);
            $error = '<p class="text-success">Comment Added</p> ';
            $data = array(
            'error'=> $error
                );

            exit(json_encode($data));
        } else {
            $error = '<p class="text-warning">You Must be Logged in To Comment. <a href="user/login.php"> Here</a> to LOG IN</p> ';
            $data = array(
            'error'=> $error
                );

            exit(json_encode($data));
        }
    } elseif (isset($_POST['artid'])) {

        $articleID = $_POST['artid'];
        $sql ="SELECT * from article_comments inner join user on article_comments_fk_user_id = user_id
         WHERE parent_comment_id = '0' AND article_comment_fk_article_id = $articleID ORDER BY article_comments_id DESC" ;
        $output = '';
        $result =$artOBJ->queryNone($sql);
        foreach ($result as $row) {
            $output .= '
            <div class="row flex-row">
            <!-- <div class="col-1"><img loading="lazy" src="user/images/userimgs/user.jpg"
                    class="img-fluid rounded-circle" alt=""></div> -->
                    <!-- comment -->
            <div class="col-11">
                <div class="row p-0 m-0 flex-column ">
                    <div class="col px-0 "><span class="text-primary"> '.$row["user_fname"]. ' '.$row["user_fname"] .' </span> - <span class="font-weight-lighter font-italic timeago">'.$row["article_comment_date"]. '</span> </div>
                    <div class="col px-0"> '.$row["comment"]. '
                        Blanditiis, corporis? </div>
                        <div class="col px-0 d-flex justify-content-end"> <input class="btn btn-primary btn-sm py-0 reply" id="'.$row["article_comments_id"].'" type="submit" value="Reply"> </div>
                </div>
            </div>

        </div>
         ';
            $output .= $artOBJ->get_reply_comment($row["article_comments_id"]);
        }

        echo $output;
    } else {
        echo 'NONE IS WORKING';
    }


exit();
