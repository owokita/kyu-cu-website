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
        <!-- Admin DashBoad -->
        <form method="post" action="includes/sendmail.php" enctype="multipart/form-data"">
        <div class="form-group">
                <label for="exampleFormControlInput1">Subject</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Subject" name="subject">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Attachment</label>
                <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="File" name="attachment">
            </div>
            <button type="btn" name="sendmail"  class="btn btn-success">Send</button>
        </form>
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