<?php require 'includes/topnav.php';
if ($_SESSION['user_type'] === "normal") {
    redirect("user.php");
}
?>

<main class="wrapper">
    <!-- Right side navigation -->
    <?php require 'includes/sidenav.php'?>
    <!--  End of Right side navigation -->

    <div class="content container-fluid mt-2 ">
        <div class="row ">
            <div class="col d-flex">
                <!-- Form to Request Registration Of A new Admin -->
                <form id="postuser" action="includes/register.inc.php" method="POST">
                    <input type="email" class="form-control form-control-sm" name="email" id="admin" required
                        placeholder="Enter User Email Here To Make Admin">

                </form>
                <div class="col ">
                    <button type="submit" id="showmodal" class="btn btn-outline-success btn-sm" form="postuser"
                        name="checkAdmin"> <span><i class="fas fa-user-plus"></i></span>
                        Submit</button>
                </div>

            </div>
        </div>
        <?php
        $userOBJ = new USER();
        $results = $userOBJ->getAdmins()
        
        
        ?>
        <div class="row">
            <div class="col">
                <table class="table table-sm table-striped table-hover">
                    <thead class="greenBgDark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone No.</th>
                            <th scope="col">Email</th>
                            <th scope="col">Authorised By</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $result):?>
                        <tr>

                            <th scope="row" class="w-auto"><?php echo $result['user_id']; ?>
                            </th>
                            <td class="text-capitalize"><?php echo ucwords($result['user_fname']); echo " "; echo $result['user_lname'];?>
                            </td>
                            <td><?php echo $result['user_phobeNo']; ?>
                            </td>
                            <td><?php echo $result['user_email']; ?>
                            </td>
                            <td><?php echo $result['admin_registered_by']; ?>
                            </td>


                        </tr>
                        <?php endforeach?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<!--Confrim User Modal Modal -->
<div class="modal fade" id="confirmUser" tabindex="-1" role="dialog" aria-labelledby="confirmUser" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Confirmation</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php

                        if (isset($_GET['message'])) {
                            if ($_GET['message'] == "nouser") {
                                echo '<p class =" text-white text-center" style=" background-color: red;border-radius:5px">There is NO member with that Email Address!!</p>';
                            } elseif ($_GET['message'] == "alreadyAdmin") {
                                echo '<p class =" text-white text-center" style=" background-color: red;border-radius:5px">Submitted Email is Already an  Admin</p>';
                            } else {
                                $id= $_GET['message'];
                                echo '<p class =" text-white text-center" style=" background-color: green;border-radius:5px">Are you Sure?</p>';
                                $userOBJ = new USER();
                                $reslut = $userOBJ->getuserbyid($id);
                                
                                echo 'You want to make <strong>'. $reslut['user_fname'].' '. $reslut['user_lname'].' </strong> of email '. $reslut['user_email'].' an ADMIN? ';
                            }
                        }
                        ?>
            </div>
            <div class="modal-footer">
                <!-- this form will register the admin -->
                <form id="registerAdmin" action="includes/register.inc.php" method="POST">
                    <input type="hidden" name="id"
                        value="<?php echo $reslut['user_id']?>">
                </form>
                <?php
                    
                    if ($_GET['message'] !== "nouser" && $_GET['message'] !== "alreadyAdmin") {
                        echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>';

                        //this button will submit the form that will register the form
                        echo '<button type="submit" class="btn btn-success" name="registerAdmin" form="registerAdmin">Yes</button>';
                    } elseif ($_GET['message'] == "nouser" || $_GET['message'] == "alreadyAdmin") {
                        echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
                    }
                ?>


            </div>
        </div>
    </div>
</div>

<script src="js/lib/jquery-3.2.1.min.js"> </script>
<script src="js/lib/popper.min.js">
</script>
<script src="js/lib/bootstrap.min.js"> </script>
<script src="js/lib/admin.js"> </script>

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

    });
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
