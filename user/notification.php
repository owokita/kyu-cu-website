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
    <?php
                        if (isset($_GET['message'])) {
                            if ($_GET['message'] == "success") {
                                echo '<p class =" text-white text-center mt-2" style=" background-color: green;border-radius:5px">The first 150 Emails Sent Successfully . Please wait for 1 hour to send The next Email</p>';
                            }
                        }
                        ?>
        <!-- Admin DashBoad -->
        <script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
        <form method="post" action="includes/sendnotification.php" >
        <div class=" form-group">
            <label for="exampleFormControlInput1">Subject</label>
            <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="subject"
                name="subject"></div>

            <textarea name="editor1"></textarea>
            <script>
                CKEDITOR.replace('editor1');
            </script>
            <button type="btn" name="sendmail" class="btn btn-success">Send</button>
    </form>
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
<!-- //ck editor  -->






</body>

</html>