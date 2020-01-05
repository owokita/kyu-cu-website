<?php require 'includes/topnav.php';
    $sess = new SESSION();
    $sessId = $sess->getSessionID();
   
?>

<main class="wrapper">
    <!-- Right side navigation -->
    <?php require 'includes/userSidenav.php'?>
    <!--  End of Right side navigation -->
    <div class="content container-fluid">
        <!-- User Dashboard -->
        <div class="row mt-4">
            <div class="col-sm-6 col-md-4 mt-2">
                <div class="card greenBgMid  text-light p-3">
                    <div class="d-flex">
                        <div class="d-inline "> <i class="fas fa-newspaper fa-5x"></i></div>
                        <div class="flex-grow-1 ">
                            <h5 class="text-center">Your Posts</h5>
                            <?php  $userOBJ = new USER();
                          $postCount=$userOBJ->countSpecific('article_fk_user_id', 'article', $sessId)
                            
                            ?>
                            <h1 class="text-center"><?php echo $postCount['id'] ?></h1>
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
                            <h1 class="text-center">0</h1>
                        </div>
                    </div>
                </div>
            </div>

        

        </div>
    </div>
</main>







<script src="js/lib/jquery-3.2.1.min.js"></script>
<script src="js/lib/popper.min.js"></script>
<script src="js/lib/bootstrap.min.js"></script>
<script src="js/lib/admin.js"></script>
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

<?php
/*this  code will pop up the modal immediately the page
 loads incase there is a new message in the form*/
if (isset($_GET['message'])) {
    echo '<script>
        $("#confirmUser").modal();
    
    </script>';
}
    ?>