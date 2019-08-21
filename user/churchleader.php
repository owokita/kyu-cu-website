<?php require 'includes/topnav.php';
if ($_SESSION['user_type'] === "normal") {
    redirect("user.php");
}
?>

<main class="wrapper">
    <!-- Right side navigation -->
    <?php require 'includes/sidenav.php'?>
    <!--  End of Right side navigation -->

    <div class="content container-fluid ">
        <?php
        $userOBJ = new USER();
        //get all the positions from the db that are not oqupied
        $sql ="SELECT position_name from position 
                left outer join leaders on leaders_fk_position_name = position_name 
                WHERE leaders_fk_position_name is NULL;";
        $availablePositions = $userOBJ->queryNone($sql);
        ?>
        <div class="row mt-2">
            <div class="col ">
                <!-- Form to Request Registration Of A new Admin -->
                <form id="postuser" action="includes/register.inc.php" method="POST">
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group ">
                                <label for="firstName">Select Position</label>
                                <select id="inputState" name="position" class="form-control form-control-sm" required>
                                    <option disabled=="disabled" selected="selected">-- Select A Position --</option>
                                    <?php foreach ($availablePositions as $availablePosition):?>
                                        <option><?php echo $availablePosition['position_name'] ?></option>
                                    <?php endforeach?>

                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group ">
                                <label for="lastName">Enter Email</label>
                                <input type="email" class="form-control form-control-sm" id="lastName"
                                    aria-describedby="emailHelp" placeholder="Enter Email" name="email" required>

                            </div>
                        </div>
                    </div>
                </form>
                <div class="col ">
                    <button type="submit" id="showmodal" class="btn btn-outline-success btn-sm" form="postuser"
                        name="checkLeader"> <span><i class="fas fa-user-plus"></i></span>
                        Submit</button>
                </div>

            </div>
        </div>
        <?php
        $sql ="SELECT leaders_fk_user_id,user_fname,user_lname,leaders_fk_position_name,user_email,user_phobeNo,leader_added_by from leaders 
        inner join user on leaders_fk_user_id= user_id;";
        
        $leaders = $userOBJ->queryNone($sql);
        
        ?>
        <div class="row">
            <div class="col">
                <table class="table table-sm table-striped table-hover">
                    <thead class="greenBgDark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Position</th>
                            <th scope="col">Phone No.</th>
                            <th scope="col">Email</th>
                            <th scope="col">Added By</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($leaders as $leader):?>
                        <tr>

                            <th scope="row" class="w-auto"><?php echo $leader['leaders_fk_user_id']; ?>
                            </th>
                            <td class="text-capitalize"><?php echo ucwords($leader['user_fname']); echo " "; echo $leader['user_lname'];?>
                            </td>
                            <td><?php echo $leader['leaders_fk_position_name']; ?>
                            </td>
                            <td><?php echo $leader['user_phobeNo']; ?>
                            </td>
                            <td><?php echo $leader['user_email']; ?>
                            </td>
                            <td><?php echo $leader['leader_added_by']; ?>
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
                                echo '<p class =" text-white text-center" style=" background-color: red;border-radius:5px">Submitted Email is Already a Leader</p>';
                            } else {
                                //get the results from the url and seperate to get the user id and the position
                                $urlData= $_GET['message'];
                                $Data= explode("-",$urlData);
                                                                
                                echo '<p class =" text-white text-center" style=" background-color: green;border-radius:5px">Are you Sure?</p>';
                                //Fetch name of the id
                                $userOBJ = new USER();
                                $reslut = $userOBJ->getuserbyid($Data[0]);
                                
                                echo 'You want to make <strong>'. $reslut['user_fname'].' '. $reslut['user_lname'].' </strong> of email '. $reslut['user_email'].' the <strong>'. $Data[1].' </strong> ';
                             }
                        }
                        ?>
            </div>
            <div class="modal-footer">
                <!-- this form will register the leader -->
                
                <form id="registerLeader" action="includes/register.inc.php" method="POST">
                    <!-- The leader name -->
                    <input type="hidden" name="id"
                        value="<?php echo $reslut['user_id']?>">
                    <!-- The leader position-->
                    <input type="hidden" name="position"
                        value="<?php echo $Data[1]?>">
                </form>
                <?php
                    
                    if ($_GET['message'] !== "nouser" && $_GET['message'] !== "alreadyAdmin") {
                        echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>';

                        //this button will submit the form that will register the leaeder
                        echo '<button type="submit" class="btn btn-success" name="registerLeader" form="registerLeader">Yes</button>';
                    } elseif ($_GET['message'] == "nouser" || $_GET['message'] == "alreadyAdmin") {
                        echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
                    }
                ?>


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
