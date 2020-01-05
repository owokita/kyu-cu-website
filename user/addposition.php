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
            <div class="col-auto">
                <form id="addPosition" action="includes/register.inc.php" method="POST">
                    <div class="form-group ">
                        <label for="firstName">Enter Name Of The Position </label>
                        <input type="text" class="form-control form-control-sm" id="firstName"
                            aria-describedby="emailHelp" placeholder="e.g PASTOR" name="position" required>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" id="showmodal" class="btn btn-outline-success btn-sm" form="addPosition"
                    name="addPosition"> <span><i class="fas fa-plus"></i></span>
                    Submit</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php
                $sql ="SELECT * FROM position";
                $userOBJ = new USER();
                $positions = $userOBJ->queryNone($sql);
            ?>
                <table class="table table-sm table-striped table-hover w-sm-100 table-bordered">
                    <thead class="greenBgDark">
                        <tr>
                            <th scope="col">Position Name</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>

                    <?php foreach ($positions as $position):?>
                    <tr>
                        <th scope="row" class="w-auto"><?php echo $position['position_name']; ?>
                        </th>
                        <td scope="row" class="w-auto"><button
                                id="<?php echo $position['position_name']; ?>"
                                type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                onclick="reply_click(this.id)" data-target=".bd-example-modal-sm">Remove</button>
                        </td>
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
                        <p>Removing this position will affect any member Linked to it</p>
                        <p>Are you sure you want to continue?</p>

                        <button type="button" data-dismiss="modal" class="btn btn-secondary  btn-sm">NO</button>
                        <a id="demo" class="btn btn-danger btn-sm" href="">YES </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





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

    //this function will get the value of he button clicked and insert it inthe modal
    function reply_click(clicked_id) {
        x = clicked_id;
        document.getElementById("demo").href = "includes/delete.inc.php?position=" + x;

    }
</script>





</body>

</html>