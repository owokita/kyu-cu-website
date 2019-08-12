<?php
require 'includes/init.php';
$sess = new SESSION();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
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
            <form class="logform p-2 " action="includes/login.inc.php" method="POST">
                <div>
                    <img src="images/logoicon.ico" alt="" class="log-img ">
                    <h4 class=" text-center">Login Here</h4>
                    <?php
                    if (isset($_GET['false'])) {
                        echo '<p class =" text-white text-center" style=" background-color: red;border-radius:5px"> No User With That Email</p>';
                    } elseif (isset($_GET['wrong'])) {
                        echo '<p class =" text-white text-center" style=" background-color: red;border-radius:5px"> Wrong Password</p>';
                    }
                    
                    ?>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                        placeholder="Enter email" name="email" required>

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password"
                        name="password" required>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                </div>
                <button type="login" class="btn btn-success d-flex mx-auto" name="login-submit">Login</button>
                <p class="text-center">New User? <a href="signup.php" class="text-white">Register Here </a></p>
            </form>
        </div>
    </div>
    

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>