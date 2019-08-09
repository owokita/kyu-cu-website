<?php require 'includes/topnav.php'?>

<main class="wrapper">
    <!-- Right side navigation -->
    <?php require 'includes/sidenav.php'?>
    <!--  End of Right side navigation -->

    <div class="content container-fluid">
        <!-- Admin DashBoad -->
        <div class="row mt-4">
            <?php $obj= new USER();
// $obj->display();
?>

            <div class="col-sm-6 col-md-4 mt-2">
                <div class="card greenBgMid text-light p-3">
                    <div class="d-flex">
                        <div class="d-inline "> <i class="fas fa-question
                            fa-5x"></i></div>
                        <div class="flex-grow-1 ">
                            <h5 class="text-center">Unverified Posts</h5>
                            <h1 class="text-center">1</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 mt-2">
                <div class="card greenBgMid text-light p-3">
                    <div class="d-flex">
                        <div class="d-inline "> <i class="fas fa-newspaper
                            fa-5x"></i></div>
                        <div class="flex-grow-1 ">
                            <h5 class="text-center">Total Posts</h5>
                            <h1 class="text-center">120</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 mt-2">
                <div class="card greenBgMid text-light p-3">
                    <div class="d-flex">
                        <div class="d-inline "> <i class="fas fa-users
                            fa-5x"></i></i></div>
                        <div class="flex-grow-1 ">
                            <h5 class="text-center">Total Members</h5>
                            <h1 class="text-center">2,000</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>







<script src="js/jquery-3.2.1.min.js"> </script>
<script src="js/popper.min.js">
</script>
<script src="js/bootstrap.min.js"> </script>
<script src="js/admin.js"> </script> <!-- Side Navigation Scripts -->
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