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
            <form class="logform p-2 " action="includes/reset.inc.php" method="POST">
                <div>
                    <img src="images/logoicon.ico" alt="" class="log-img ">
                    <h5 class=" text-center">Enter New Password Here</h5>
                    <?php
                    $selector = $_GET['selector'];
                    $validator = $_GET['validator'];

                    if (empty($selector) || empty($validator)) {
                        echo '<p class =" text-white text-center" style=" background-orange: green;border-radius:5px"> Could NOT Validate Yor Resqest <br>
                        Please Report This Error To The Admin</p>';
                    } else {

                        //Check if the tokens are legit
                        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                        } else {
                            echo "Error 101-505 Please Report This Error to the Admin";
                            exit();
                        }
                    }
                    
                    
                    ?>
                </div>
                <input type="hidden" name="selector" value="<?php echo $selector;?>">
                <input type="hidden" name="validator" value="<?php echo $validator;?>">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control form-control-sm" id="password"
                        placeholder="Password" name="password" required>
                       
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Password Confirm</label>
                    <input type="password" class="form-control form-control-sm" id="confirmPassword"
                        placeholder="assword" name="passordconfirm" required>   
                </div>

                <button type="login" class="btn btn-success d-flex mx-auto" name="new-pwd">Reset Password</button>
                <p class="text-center"><a href="login.php" class="text-white">Back To LOGIN </a></p>
                
            </form>
        </div>
    </div>

    <script src="js/lib/bootstrap-validate.js"></script>
    <script >
    
    bootstrapValidate('#confirmPassword','matches:#password:Password Must Match'
 );
    
    </script>    
</body>

</html>


                                