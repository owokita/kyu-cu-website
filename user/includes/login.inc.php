<?php
if (isset($_POST['login-submit'])) {
    require 'init.php';
    $user_email = $_POST['email'];
    $user_pwd = $_POST['password'];
    
    //Ckecks if the Email Address Exists
    $user= new USER();
    if (!$user->getuserbyEmail($user_email)) {
        $user->redirect("../login.php?false");
    } else {
        $sql = ("SELECT user_email,user_pwd,user_id,user_type FROM user WHERE user_email = ?");
        if ($stmt = $user->conn()->prepare($sql)) {
            $stmt->execute([$user_email]);
            $row =$stmt->fetch();
            $pwdCheck= password_verify($user_pwd, $row['user_pwd']);
            if (!$pwdCheck== true) {
                $user->redirect("../login.php?wrong");
            } else {
                //check if user clicked remeber me
                $id = $row['user_id'];
                $sess = new SESSION();
                $sess->login($id);
                //Check if the user is an admin
                if ($row['user_type'] === "normal") {
                    $user->redirect("../user.php");
                    $_SESSION['user_type']= "normal";
                } elseif ($row['user_type'] === "admin") {
                    $user->redirect("../index.php");
                    $_SESSION['user_type']= "admin";
                }
                
            }
        } else {
            # code...
        }
    }
} else {
    $user->redirect("../login.php?false");
}
