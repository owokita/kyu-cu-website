<?php require 'includes/topnav.php';
if ($_SESSION['user_type'] === "normal") {
    redirect("user.php");
}
?>

<main class="wrapper">
    <!-- Right side navigation -->
    <?php require 'includes/usersidenav.php'?>
    <!--  End of Right side navigation -->

    <div class="content container-fluid ">
        <div class="col "> <button type="button" class="btn btn-outline-success" data-toggle="modal"
                data-target="#RegNewMemberModal"> <span><i class="fas fa-user-plus"></i></span>
                Add New Member</button></div>

    </div>
</main>

<!--member new post Modal -->
<div class="modal fade" id="RegNewMemberModal" tabindex="-1" role="dialog" aria-labelledby="RegNewMemberModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Create A New Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <script src="ckeditor/ckeditor.js"></script>

            <div class="modal-body py-0 px-1">
            <!-- //form to create a new post -->
                <form  id="usernewpost"  action="includes/article.inc.php" method="post">
                    <div class="form-group ">
                       
                        <input type="text" class="form-control form-control-sm" id="lastName"
                            aria-describedby="emailHelp" placeholder="Enter Article Title" name="post-title" required>

                    </div>

                    <textarea name="editor1" placeholder="Enter Article Content"></textarea>
                    <script>
                        CKEDITOR.replace('editor1');
                    </script>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancle</button>
                <button type="submit" class="btn btn-success" form="usernewpost"
                    name="post_article">Register</button>
            </div>
        </div>
    </div>
</div>




<!-- Confirm Deletion Modal -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col p-2">
                        <h6 class="text-white text-center py-2 rounded" style="background: red"><span><i
                                    class="fas fa-exclamation-triangle"></i></span> WARNING</h6>
                        <p>Removing this Leader will delete his/her leadership records but not his/her Membership</p>
                        <p>Are you sure you want to continue?</p>

                        <button type="button" data-dismiss="modal" class="btn btn-secondary  btn-sm">NO</button>
                        <a id="demo" class="btn btn-danger btn-sm" href="">YES </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
    //this function will get the value of he button clicked and insert it inthe modal
    function reply_click(clicked_id) {
        x = clicked_id;
        document.getElementById("demo").href = "includes/delete.inc.php?leader=" + x;

    }
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
