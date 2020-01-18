<?php require 'includes/topnav.php';
if ($_SESSION['user_type'] === "normal") {
    redirect("user.php");
}
?>

<main class="wrapper">
    <!-- Right side navigation -->
    <?php require 'includes/sidenav.php'?>
    <!--  End of Right side navigation -->

    <div class="content container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col">
                        <form id="signupform" class="logform px-2 " action="includes/register.inc.php" method="POST">

                            <div class="img-div">

                                <h4 class=" text-center">Register Event Here</h4>



                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail">Event Name</label>
                                <input type="text" class="form-control form-control-sm" id="email"
                                    aria-describedby="emailHelp" placeholder="" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail">Event Date</label>
                                <input type="date" class="form-control form-control-sm" id="email"
                                    aria-describedby="emailHelp" placeholder="" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Enter Event Description</label>
                                <textarea class="form-control"  name="shopdesc" form-control-sm" id="shopdesc"
                                    required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enter Event Poster </label>
                                <input type="file" name="shopimage" class="form-control form-control-sm" id="shopimage"
                                    required>
                            </div>
                            <button id="submitReg" type="submit" class="btn btn-success d-flex mx-auto "
                                name="signup-submit">Post</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus animi architecto doloribus veniam
                ipsam saepe eum labore quaerat modi quos, est, atque alias nisi recusandae porro rem reiciendis
                consectetur vel.

            </div>

        </div>
    </div>
</main>








<script src="js/lib/jquery-3.2.1.min.js"> </script>
<script src="js/lib/popper.min.js">
</script>
<script src="js/lib/bootstrap.min.js"> </script>
<script src="js/lib/admin.js"> </script>
<script src="js/app/event.js"> </script> 
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