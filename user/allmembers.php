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
        <!-- List OF ALL Members -->
        <div class="row ">
            <div class="col "> <button type="button" class="btn btn-outline-success" data-toggle="modal"
                    data-target="#RegNewMemberModal"> <span><i class="fas fa-user-plus"></i></span>
                    Add New Member</button></div>
        </div>
        <div class="row">
            <div class="col">
                <?php
                    $userOBJ = new USER();
                    $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 50;
                    
                    $page = isset($_GET['page']) ? $_GET['page']:  1;
                    $start = ($page - 1) * $limit;
                    $results = $userOBJ->getAllUsers($start, $limit);
                    $count=$start;


                    $countResult = $userOBJ->count('user_id', 'user');
                    $count = $countResult['id'];
                    $pages = ceil($count/$limit) ;

                    $previous =$page -1;
                    $next = $page + 1;
            
            ?>
                <!-- //PAGINATION navigation bar -->
                <nav aria-label="Page navigation example bg-transparent">
                    <ul class="pagination bg-transparent">
                        <li class="page-item "><a class="page-link bg-transparent py-1"
                                href="allmembers.php?page=<?php echo $previous; ?>">Previous</a>
                        </li>

                        <?php for ($i=1; $i <=$pages ; $i++): ?>
                        <li class="page-item"><a class="page-link bg-transparent py-1 "
                                href="allmembers.php?page=<?php echo $i; ?>"><?php echo $i ;?></a></li>

                        <?php endfor ?>

                        <li class="page-item bg-transparent"><a class="page-link bg-transparent py-1"
                                href="allmembers.php?page=<?php echo $next; ?>"
                                href="#">Next</a></li>
                        <li class="ml-4">
                            <!-- Limit the Number of Records From The Databse -->
                            <form action="#" method="post">
                                <select name="limit-records" id="limit-records">
                                    <option disabled=="disabled" selected="selected">--Limit Records--</option>
                                    <?php foreach ([5,50,100,200] as $limit): ?>
                                    <option <?php if (isset($_POST["limit-records"]) && $_POST["limit-records"] == $limit) {
                                            echo "selected";
                                        } ?>
                                        value="<?php echo $limit ?>">
                                        <?php echo $limit ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </form>
                        </li>
                        <li>
                            <a href="includes\phpspreadsheet\spreadsheetTEMPLATE.php"
                                class=" ml-5 btn btn-primary btn-sm"> <span><i class="fas fa-print"></i></span>
                                Print</a>
                        </li>
                    </ul>
                </nav>

                <div class="" style="overflow-x:auto; max-height:70vh;">
                    <table class="table table-sm table-striped table-hover ">
                        <thead class="greenBgDark " style="">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">RGNo</th>
                                <th scope="col">Phone No.</th>
                                <th scope="col">Email</th>
                                <th scope="col">Course</th>
                                <th scope="col">Join Date</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($results as $result):?>
                            <tr>
                                <?php   $date= explode(" ", $result['user_joindate'], 2);  ?>
                                <th scope="row" class="w-auto"><?php echo $result['user_id'];?>
                                </th>
                                <td class="text-capitalize"><?php echo ucwords($result['user_fname']); echo " "; echo $result['user_lname'];?>
                                </td>
                                <td><?php echo $result['user_regno']; ?>
                                </td>
                                <td><?php echo '0'. substr($result['user_phobeNo'], -9); ?>
                                </td>
                                <td><?php echo $result['user_email']; ?>
                                </td>
                                <td><?php echo $result['user_course']; ?>
                                </td>
                                <td><?php echo $date[0] ?>
                                </td>
                                <td>
                                    <button
                                        id="<?php echo $result['user_id']; ?>"
                                        type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        onclick="reply_click(this.id)"
                                        data-target=".bd-example-modal-sm">Remove</button>
                                </td>
                            </tr>
                            <?php endforeach?>

                        </tbody>
                    </table>

                </div>
                <hr style=" border-top: 3px solid black">
            </div>

        </div>
    </div>

</main>
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
                        <p>Removing this Member will delete all of his/her data in the database</p>
                        <p>Are you sure you want to continue?</p>

                        <button type="button" data-dismiss="modal" class="btn btn-secondary  btn-sm">NO</button>
                        <a id="demo" class="btn btn-danger btn-sm" href="">YES </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--member reg  Modal -->
<div class="modal fade" id="RegNewMemberModal" tabindex="-1" role="dialog" aria-labelledby="RegNewMemberModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Register New Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="newMemberReg" action="includes/register.inc.php" method="POST">
                        <?php
                        if (isset($_GET['message'])) {
                            if ($_GET['message'] == "emailexists") {
                                echo '<p class =" text-white text-center" style=" background-color: red;border-radius:5px"> Email Address You Submitted is  Already Registered !!</p>';
                            } elseif ($_GET['message'] == "success") {
                                echo '<p class =" text-white text-center" style=" background-color: green;border-radius:5px"> Member Registered Successfully</p>';
                            }
                        }
                        ?>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group ">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control " id="firstName"
                                        aria-describedby="emailHelp" placeholder="Enter First Name" name="firstname"
                                        required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group ">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control form-control-sm" id="lastName"
                                        aria-describedby="emailHelp" placeholder="Enter Last Name" name="lastname"
                                        required>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Email address</label>
                            <input type="email" class="form-control form-control-sm" id="email"
                                aria-describedby="emailHelp" placeholder="Enter email" name="email" required>


                        </div>
                        <div class="form-group">
                            <label for="phoneNo">Phone No</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">+254</span>
                                </div>
                                <input type="number" id="phoneNo" class="form-control" placeholder=" e.g 701702734"
                                    aria-label="phoneNo" aria-describedby="basic-addon1" name="phoneNo" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="regno">Reg No</label>
                            <input type="text" class="form-control form-control-sm" id="regno"
                                aria-describedby="emailHelp" placeholder="Enter Reg-No. If Student" name="regno"
                                required>

                        </div>
                        <div class="form-group ">
                            <label for="course">Course Name</label>
                            <input type="text" class="form-control form-control-sm" id="firstName"
                                aria-describedby="emailHelp" placeholder="Enter Course Name" name="course" required>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success" form="newMemberReg"
                    name="ADMINnewMemberReg">Register</button>
            </div>
        </div>
    </div>
</div>
<script src="js/bootstrap-validate.js"></script>
<script src="js/admin.js"></script>
<script src="js/jquery-3.2.1.min.js"> </script>
<script src="js/popper.min.js"></script>
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
        document.getElementById("demo").href = "includes/delete.inc.php?user=" + x;
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#limit-records").change(function() {
            $('form').submit();
        })
    })
</script>



</body>

</html>

<?php
/*this  code will pop up the modal immediately the page
 loads incase there is a new message in the form*/
if (isset($_GET['message'])) {
    echo '<script>
        $("#RegNewMemberModal").modal();
    
    </script>';
}
