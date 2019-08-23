<?php  require 'init.php';
if (!isset($_SESSION['user_id'])) {
  redirect("login.php");
}else {
    $logid =$_SESSION['user_id'];
    $objUser = new USER() ;
    $data = $objUser->getuserbyid($logid);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="images/logoicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MEMBER</title>
    <!--RESET SCSS-->
    <link rel="stylesheet" href="css/reset.css">
    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/admin.css">
    <!--MEDIA QUERIES-->
    <!-- <link rel="stylesheet" href="css/mq..css"> -->
    <!--FONT AWESOME-->
    <script src="js/all.js"></script>
    <style type="text/css">
        .bs-example {
            margin: 20px;
        }

        @media screen and (min-width: 768px) {

            .dropdown:hover .dropdown-menu,
            .btn-group:hover .dropdown-menu {
                display: block;
            }

            .dropdown-menu {
                margin-top: 0;
            }

            .dropdown-toggle {
                margin-bottom: 2px;
            }

            .navbar .dropdown-toggle,
            .nav-tabs .dropdown-toggle {
                margin-bottom: 0;
            }
        }
    </style>

</head>

<body>
  


    <nav class="navbar navbar-expand-sm text-white d-flex sticky-top p-0" style="background-color: #500d62;">
        <div id="sidebarCollapse" class="col-auto ">
            <i class="fas fa-bars"></i>
        </div>
        <div id="sidebarCollapse" class="col-auto d-flex">
            <!-- This link will lead to the home page -->
            <a class="dropdown-item text-white" href="../index.php "><i class="fas fa-home"></i></a>
            <!-- This link will lead to the admin page -->
            <?php
            //FIXME: NOT MAKING SENSE
                if ($objUser->isAdmin($logid)) {
                echo '<a class="dropdown-item text-white" href="index.php "><i class="fas fa-user-shield"></i></a>';
                } 
            ?>
            
        
            
        </div>
        <!-- Links -->
        <ul class="navbar-nav ">

            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle text-white mr-2" href="#" id="notification" data-toggle="dropdown">

                    <span style="font-size: smaller; position: absolute; top: 0px ;right:45%; width: 20px; background-color: #73fb59;
                    border-radius: 200px; padding-left: 7px; color: #000000">8</span>
                    <i class="fas fa-bell"></i>
                </a>

                <div class="dropdown-menu" style="position:absolute; transform: translateX(-110px); ">
                    <a class="dropdown-item" href="#">still</a>
                    <a class="dropdown-item" href="#">under</a>
                    <a class="dropdown-item" href="#">development</a>
                </div>


            </li>

            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white mr-2" href="#" id="navbardrop" data-toggle="dropdown">
                   <?php echo $data['user_fname']; ?>
                </a>
                <div class="dropdown-menu" style="position:absolute; transform: translateX(-110px); ">
                    <a class="dropdown-item" href="user.php">Profile</a>
                    <a class="dropdown-item" href="settings.php">Settings</a>
                    <a class="dropdown-item" href="includes/logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>