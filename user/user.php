<?php require 'includes/topnav.php';
    $sess = new SESSION();
    $sess->is_admin();
?>

<main class="wrapper">
    <!-- Right side navigation -->
    <?php require 'includes/userSidenav.php'?>
    <!--  End of Right side navigation -->
    <div class="content container-fluid">
        <!-- Admin DashBoad -->
        <div class="row mt-4">
            <div class="col-sm-6 col-md-4 mt-2">
                <div class="card greenBgMid  text-light p-3">
                    <div class="d-flex">
                        <div class="d-inline "> <i class="fas fa-newspaper fa-5x"></i></div>
                        <div class="flex-grow-1 ">
                            <h5 class="text-center">Your Posts</h5>
                            <h1 class="text-center">8</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 mt-2">
                <div class="card greenBgMid  text-light p-3">
                    <div class="d-flex">
                        <div class="d-inline "> <i class="fab fa-monero fa-5x"></i></div>
                        <div class="flex-grow-1 ">
                            <h5 class="text-center">Your Ministries</h5>
                            <h1 class="text-center">2</h1>
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="text-danger">THIS PAGE IS STILL UNDER DEVELOPMENT</h3>

        </div>
    </div>
</main>







<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/admin.js"></script>
<!-- Side Navigation Scripts -->
<script>
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
    document.querySelector('.content').addEventListener('click', function() {
        document.getElementById('sidebar').classList.remove('active');

    })
    document.querySelector('.navbar-nav').addEventListener('click', function() {
        document.getElementById('sidebar').classList.remove('active');

    })
</script>





</body>

</html>