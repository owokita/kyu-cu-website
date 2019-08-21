<?php require 'includes/topnav.php';
if ($_SESSION['user_type'] === "normal" ) {
    redirect("user.php");
} 
?>
<main class="wrapper">
    <!-- Right side navigation -->
    <?php require 'includes/sidenav.php'?>
    <!--  End of Right side navigation -->

    <div class="content container-fluid">
        <!-- Admin DashBoad -->
        <div class="row mt-4">
            

            <div class="col-sm-6 col-md-4 mt-2">
                <div class="card greenBgMid text-light p-3">
                    <div class="d-flex">
                        <div class="d-inline "> <i class="fas fa-question
                            fa-5x"></i></div>
                        <div class="flex-grow-1 ">
                            <h5 class="text-center">Unverified Posts</h5>
                            <h1 class="text-center">0</h1>
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
                        <?php 
                            $userOBJ = new USER();
                            $postCount = $userOBJ->count('article_id','article');
                             ?>
                            <h5 class="text-center">Total Posts</h5>                            
                            <h1 class="text-center"><?php echo $postCount['id'] ?></h1>
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
                        <?php 
                            $userOBJ = new USER();
                            $memberCount = $userOBJ->count('user_id','user');
                             ?>
                            <h5 class="text-center">Total Members</h5>
                            <h1 class="text-center"><?php echo $memberCount['id'] ?></h1>
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