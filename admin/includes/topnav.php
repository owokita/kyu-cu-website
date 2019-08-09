

<?php  require 'init.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN</title>
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
        <!-- Links -->
        <ul class="navbar-nav ">
            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle text-white mr-2" href="#" id="notification" data-toggle="dropdown">

                    <span style="font-size: smaller; position: absolute; top: 0px ;right:45%; width: 20px; background-color: #73fb59;
                    border-radius: 200px; padding-left: 7px; color: #000000">8</span>
                    <i class="fas fa-bell"></i>
                </a>
                <div class="dropdown-menu" style="position:absolute; transform: translateX(-110px); ">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Logout</a>
                </div>


            </li>

            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white mr-2" href="#" id="navbardrop" data-toggle="dropdown">
                    Felix
                </a>
                <div class="dropdown-menu" style="position:absolute; transform: translateX(-110px); ">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Logout</a>
                </div>
            </li>
        </ul>
    </nav>