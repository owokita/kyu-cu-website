<?php
require_once 'init.php';
if (isset($_POST['signup-submit'])) {
    $user_fname = ucfirst(strtolower($_POST['firstname'])) ;
    $user_lastname =ucfirst(strtolower($_POST['lastname'])) ;
    $user_email = strtolower($_POST['email']) ;
    $user_regno = $_POST['regno'];
    $user_pwd = $_POST['password'];
    $user_phone= "+254";
    $user_phone .= $_POST['phoneNo'];

    

    $user= new USER();

    if ($user->getuserbyEmail($user_email)) {
        $user->redirect("../signup.php?false");
        exit();
    } else {
        $sql=  "INSERT INTO user (user_email,user_fname,user_lname,user_phobeNo,user_regno,user_pwd)";
        $sql .= " VALUES(?,?,?,?,?,?)";
        if (!$stmt = $user->conn()->prepare($sql)) {
            echo "Server Error!!  Please Report This Error To The Admin Through The Feedback Form In The Home Page";
        } else {
            $hashedpwd = password_hash($user_pwd, PASSWORD_DEFAULT);
            if ($stmt->execute([$user_email,$user_fname,$user_lastname,$user_phone,$user_regno,$hashedpwd])) {

                //send email congaratutaling him for his signup
                require 'mailer.php';
                
                $message="Hi ". $user_fname  ." ". $user_lastname.", Congratulation for joining KYUCU Community. Login to your profile using the link below to post your first Article
                https://test.kyucu.co.ke/user/login.php
                ";
                $subject= "Welcome to Christian Union- KYU";
                $from= "info@kyucu.co.ke";
                sendmail($_POST['email'], $message, $from, $subject);

                $user->redirect("../signup.php?success");
            } else {
                echo "Unknown Error Ocurred During Registration Please Try Later";
                echo "If the error Persists, Please Report this Error to the ADMIN for Assistance";
            }
        }
    }
} elseif (isset($_POST['ADMINnewMemberReg'])) {
    $user_fname = $_POST['firstname'];
    $user_lastname = $_POST['lastname'];
    $user_email = $_POST['email'];
    $user_regno = $_POST['regno'];
    $user_phone= "+254";
    $user_phone .= $_POST['phoneNo'];
    $user_course = $_POST['course'];

    $user= new USER();

    
    if ($user->getuserbyEmail($user_email)) {
        $user->redirect("../allmembers.php?message=emailexists");
    } else {
        $sql=  "INSERT INTO user (user_email,user_fname,user_lname,user_phobeNo,user_regno,user_course,user_pwd)";
        $sql .= " VALUES(?,?,?,?,?,?,?)";
        if (!$stmt = $user->conn()->prepare($sql)) {
            echo "Server Error!!  Please Report This Error To The Admin Through The Feedback Form In The Home Page";
        } else {
            $user_pwd = "0";
            $user_pwd .= $_POST['phoneNo'];

            // echo $user_pwd;
            // exit();
            $hashedpwd = password_hash($user_pwd, PASSWORD_DEFAULT);
            if ($stmt->execute([$user_email,$user_fname,$user_lastname,$user_phone,$user_regno,$user_course,$hashedpwd])) {
    
                    //send email congaratutaling him for his signup
                require 'mailer.php';
                    
                $message="Hi ". $user_fname  ." ". $user_lastname.", Congratulation for joining KYUCU Community. <br>  ";
                $message .= " Your temporary Login Password is <strong>" . $user_pwd . "</strong> <br>";
                $message .= " You can Change this password Later. <br>";
                $message .=" Login to your profile using the link below to post your first Article 
                    https://test.kyucu.co.ke/user/login.php ";

                $subject= "Welcome to Christian Union- KYU";
                $from= "info@kyucu.co.ke";
                sendmail($_POST['email'], $message, $from, $subject);
    
                $user->redirect("../allmembers.php?message=success");
            } else {
                echo "Unknown Error Ocurred During Registration Please Try Later";
                echo "If the error Persists, Please Report this Error to the ADMIN for Assistance";
            }
        }
    }
} elseif (isset($_POST['checkAdmin'])) {
    $user_email = $_POST['email'];
    $userOBJ = new USER;
    //Check if there is such a user in the database
    if (!$userOBJ->getuserbyEmail($user_email)) {
        redirect("../admin.php?message=nouser");
    } else {
        // 1)Get the records of that user;
        $data =$userOBJ->getUserDataByEmail($user_email);
        $id= $data['user_id'];

        // 2)Check if the User is Already Admin
        $admData = $userOBJ->countSpecific('admin_fk_user_id','admin',$id);
        if ($admData['id'] == 1) {
            redirect("../admin.php?message=alreadyAdmin");
        } else{
            redirect("../admin.php?message=$id");
        }
        
    }
    
}
//Registration Of Admin
elseif (isset($_POST['registerAdmin'])) {
    $user_id = $_POST['id'];
    //get the session of the person who is logged in;
    $userOBJ= new USER();
    $sessID = $userOBJ->getSessionID();
    $sessdata =$userOBJ -> getuserbyid($sessID);
    $sessName = $sessdata['user_fname'] . $sessfname = $sessdata['user_lname'];    

    $sql = "INSERT INTO admin (admin_fk_user_id, admin_registered_by) VALUES ('$user_id','$sessName');";
    if ($userOBJ->queryInsert($sql)) {
        redirect("../admin.php");
    } else {
       echo " there was a server error 101-2000. Please Notify the admin of this Error"; 
       exit();
    }
    


    exit();
     

    

}

else {
    redirect("../signup.php");
}
