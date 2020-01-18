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
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil minima cumque repellat. Quos dolor consequatur earum, beatae cum velit est fuga perferendis temporibus reiciendis tempora eaque. Iusto culpa quos dolor?

            </div>
            <div class="col-lg-6">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus animi architecto doloribus veniam ipsam saepe eum labore quaerat modi quos, est, atque alias nisi recusandae porro rem reiciendis consectetur vel.

            </div>

        </div>
    </div>
</main>








<script src="js/lib/jquery-3.2.1.min.js"> </script>
<script src="js/lib/popper.min.js">
</script>
<script src="js/lib/bootstrap.min.js"> </script>
<script src="js/lib/admin.js"> </script> <!-- Side Navigation Scripts -->
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