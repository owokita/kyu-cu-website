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
                $sql ="SELECT * FROM POSITION";
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
                        <td scope="row" class="w-auto"> <a
                                href="includes/delete.inc.php?position=<?php echo $position['position_name']; ?>"
                                class="btn btn-danger btn-sm"> REMOVE </a>
                        </td>
                    </tr>
                    <?php endforeach?>

                    </tbody>
                </table>
            </div>


        </div>
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





</body>

</html>