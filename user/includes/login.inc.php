<?php
if (isset($_POST['login-submit'])) {
    require 'init.php';
    $user_email = $_POST['email'];
    $user_pwd = $_POST['password'];
    
    //Ckecks if the Email Address Exists
    $user= new USER();
    if (!$user->getuserbyEmail($user_email)) {
        $user->redirect("../login.php?false");
    //get full details of the email
    } else {
        $sql = ("SELECT user_email,user_pwd,user_id FROM user WHERE user_email = ?");
        if ($stmt = $user->conn()->prepare($sql)) {
            $stmt->execute([$user_email]);
            $row =$stmt->fetch();
            //check if the pwd match else reject and notify
            $pwdCheck= password_verify($user_pwd, $row['user_pwd']);
            if (!$pwdCheck== true) {
                $user->redirect("../login.php?wrong");
            } else {
                //store id of the email
                $id = $row['user_id'];
                $sess = new SESSION();
                //set session of the user id
                $sess->login($id);

                //Check if the user is an admin
                if (!$sess->isAdmin($id)) {
                    $user->redirect("../user.php");
                    $_SESSION['user_type']= "normal";
                    echo "you are not admin";
                    exit();
                } elseif ($user->isAdmin($id)) {
                    //set userType session to  admin
                    $_SESSION['user_type']= "admin";
                    //get the admin type
                    if (!$sess->admintypeSuper($id)) {
                        echo "normal";
                    } else {
                        echo "super";
                    }
                   
                    $sess->redirect("../index.php");
                    
                }
            }
        } else {
            # code...
        }
    }
} else {
    require 'init.php';
    redirect("../login.php");
}
