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
    // Check if the requested  leader is in the Database
} elseif (isset($_POST['checkLeader'])) {
    $user_email = $_POST['email'];
    $user_position = $_POST['position'];
    
    $userOBJ = new USER;
    //Check if there is such a user in the database
    if (!$userOBJ->getuserbyEmail($user_email)) {
        redirect("../churchleader.php?message=nouser");
    } else {
        // 1)Get the records of that user;
        $data =$userOBJ->getUserDataByEmail($user_email);
        $id= $data['user_id'];

        //combine the user id and the user position with a hyphen separating them then store
        //the varible will be retured in the url
        $retrun= $id . "-" . $user_position;

        // 2)Check if the User is Already a leader
        $leaderData = $userOBJ->countSpecific('leaders_fk_user_id', 'leaders', $id);
        if ($leaderData['id'] == 1) {
            redirect("../churchleader.php?message=alreadyAdmin");
        } else {
            redirect("../churchleader.php?message=$retrun");
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
        $admData = $userOBJ->countSpecific('admin_fk_user_id', 'admin', $id);
        if ($admData['id'] == 1) {
            redirect("../admin.php?message=alreadyAdmin");
        } else {
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
    $sessdata =$userOBJ->getuserbyid($sessID);
    $sessName = $sessdata['user_fname'] . ' '. $sessfname = $sessdata['user_lname'];

    $sql = "INSERT INTO admin (admin_fk_user_id, admin_registered_by) VALUES ('$user_id','$sessName');";
    if ($userOBJ->queryInsert($sql)) {
        redirect("../admin.php");
    } else {
        echo " there was a server error 101-2000. Please Notify the admin of this Error";
        exit();
    }
    exit();
}
//TODO: REGISTER LEADER
elseif (isset($_POST['registerLeader'])) {
    $user_id = $_POST['id'];
    $requested_position = $_POST['position'];

    //get the session of the person who is logged in;
    $userOBJ= new USER();
    $sessID = $userOBJ->getSessionID();
    $sessdata =$userOBJ->getuserbyid($sessID);
    $sessName = $sessdata['user_fname'] . ' '. $sessfname = $sessdata['user_lname'];

    $sql = "INSERT INTO leaders (leaders_fk_user_id, leaders_fk_position_name, leader_added_by) VALUES ('$user_id', '$requested_position', '$sessName');";
    if ($userOBJ->queryInsert($sql)) {
        redirect("../churchleader.php");
    } else {
        echo " there was a server error 101-2000. Please Notify the admin of this Error";
        exit();
    }
    exit();
} 
//ADD POSITION
elseif (isset($_POST['addPosition'])) {
    $position = $_POST['position'];
    $userOBJ= new USER();
    //check if the position already exits

    $data = $userOBJ->countSpecific('position_name', 'position', $position);

    if ($data['id'] == 1) {
        echo "yu";
    //TODO: return the user with message
    } elseif (($data['id'] == 0)) {
        #Enter the recods to the database
        $sql = "INSERT INTO position (position_name) VALUES ('$position');";
        $userOBJ->queryInsert($sql);
        //TODO: return the user with message
        redirect("../addposition.php");
    }
} else {
    redirect("../signup.php");
}
