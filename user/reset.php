<?php
require 'includes/init.php';
$sess = new SESSION();
//redirects the user to the home page if the session is active
if (isset($_SESSION['user_id'])) {
    redirect("../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="images/logoicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset</title>
    <!--RESET SCSS-->
    <link rel="stylesheet" href="css/reset.css">
    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- main.css -->
    <link rel="stylesheet" href="css/login.css">


</head>

<body>

    <div class="container-fluid">
        <div class="col-md-4 mx-auto logdiv">
            <form class="logform p-2 " action="includes/reset.inc.php" method="POST">
                <div>
                    <img src="images/logoicon.ico" alt="" class="log-img ">
                    <h4 class=" text-center">Reset Password Request</h4>
                    <p class=" text-center">An Email will be sent to you with instructions on how to reset your password</p>
                    <?php
                    
                    if (isset($_GET['reset'])) {
                        if ($_GET['reset'] == "success") {
                            echo '<p class =" text-white text-center" style=" background-color: green;border-radius:5px"> Check Your Email</p>';
                        }
                        
                    } elseif (isset($_GET['wrong'])) {
                        echo '<p class =" text-white text-center" style=" background-color: red;border-radius:5px"> Wrong Password</p>';
                    }
                    
                    ?>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Your Email Address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                        placeholder="Enter email" name="email" required>

                </div>
                <button type="login" class="btn btn-success d-flex mx-auto" name="reset-pwd">Request Password Reset</button>
                <p class="text-center"><a href="login.php" class="text-white">Back To LOGIN </a></p>
            </form>
        </div>
    </div>
    


</body>

</html>