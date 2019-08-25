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
        <div class="row pt-1">
            <div class="col-md-6 mt-1">
                <div class="card">
                    <h5 class="card-header">Register Ministries</h5>
                    <div class="card-body">
                    <!-- Form to register new ministry -->
                        <form id="addministry" action="includes/ministries.inc.php" method="POST">
                            <div class="form-group ">
                                <label for="firstName">Enter Name Of The Ministry </label>
                                <input type="text" class="form-control form-control-sm" id="firstName"
                                    aria-describedby="emailHelp" placeholder="e.g MUSIC" name="ministry" required>
                            </div>
                            
                        </form>
                    </div>
                    <div class="card-footer"><button type="submit" id="showmodal" class="btn btn-outline-success btn-sm" form="addministry"
                    name="addministry"> <span><i class="fas fa-plus"></i></span>
                    Submit</button></div>
                </div>

            </div>

            <div class="col-md-6 mt-1">
                <div class="card">
                    <h5 class="card-header">Register Sub-Commettee </h5>
                    <div class="card-body">
                    <!-- Form to register new ministry sub comitee -->
                        <form id="addSubcom" action="includes/register.inc.php" method="POST">
                        <div class="form-group ">
                                <label for="firstName">Select Ministry</label>
                                <select id="inputState" name="position" class="form-control form-control-sm" required>
                                    <option disabled=="disabled" selected="selected">-- Select A Ministry --</option>
                                    <?php foreach ($availableministries as $availablePosition):?>
                                    <option><?php echo $availablePosition['position_name'] ?>
                                    </option>
                                    <?php endforeach?>

                                </select>
                            </div>
                            <div class="form-group ">
                                <label for="firstName">Enter Name Of The sub-Commettee </label>
                                <input type="text" class="form-control form-control-sm" id="firstName"
                                    aria-describedby="emailHelp" placeholder="" name="addSubcom" required>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer"><button type="" id="showmodal" class="btn btn-outline-success btn-sm" form="addPosition"
                    name="addPosition"> <span><i class="fas fa-plus"></i></span>
                    Submit</button></div>
                </div>
                
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <?php
                $sql ="SELECT mty_id, mty_leader,user_fname,user_lname FROM ministries left outer JOIN leaders on mty_id = leaders_fk_mty_id
                left outer join user on user_id = mty_leader;";
                $userOBJ = new USER();
                $ministries = $userOBJ->queryNone($sql);
            ?>
                <table class="table table-sm table-striped table-hover w-sm-100 table-bordered">
                    <thead class="greenBgDark">
                        <tr>
                            <th scope="col">Ministry Name</th>
                            <th scope="col">Ministry Leader</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>

                    <?php foreach ($ministries as $ministry):?>
                    <tr>
                        <th scope="row" class="w-auto"><?php echo $ministry['mty_id']; ?>
                        <td scope="row" class="w-auto">
                            <?php echo $ministry['user_fname']; echo " "; echo $ministry['user_fname']; ?>
                        </td>
                        <td scope="row" class="w-auto"><button
                                id="<?php echo $ministry['mty_id']; ?>"
                                type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                onclick="reply_click(this.id)" data-target=".bd-example-modal-sm">Remove</button>
                        </td>

                    </tr>
                    <?php endforeach?>

                    </tbody>
                </table>
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
                       
                        <h6 class="text-white text-center py-2 rounded" style="background: red"><span><i class="fas fa-exclamation-triangle"></i></span> WARNING</h6>
                        <p>Are you Sure You want to Remove this Position</p>
                        <p>NOTE: All members entitled to this Position Will be Affected</p>

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
        document.getElementById("demo").href = "includes/delete.inc.php?ministry=" + x;

    }
</script>





</body>

</html>