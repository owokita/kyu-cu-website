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
            <div class="col "> <button class="btn btn-outline-success"> <span><i class="fas fa-user-plus"></i></span>
                    Add New Member</button></div>
        </div>
        <div class="row">
            <div class="col">
                <?php
            $userOBJ = new USER();
            $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 5;
            
            $page = isset($_GET['page']) ? $_GET['page']:  1;
            $start = ($page - 1) * $limit;
            $results = $userOBJ->getAllUsers($start, $limit);
            $count=$start;


            $sql = "select count(user_id) id from user";
            $countResult = $userOBJ->count($sql);
            $count = $countResult['id'];
            $pages = ceil($count/$limit) ;

            $previous =$page -1;
            $next = $page + 1;
            
            ?>
                <!-- //PAGINATION navigation bar -->
                <nav aria-label="Page navigation example bg-transparent">
                    <ul class="pagination bg-transparent">
                        <li class="page-item "><a class="page-link bg-transparent"
                                href="http://localhost/cuweb/user/allmembers.php?page=<?php echo $previous; ?>">Previous</a>
                        </li>

                        <?php for ($i=1; $i <=$pages ; $i++): ?>
                        <li class="page-item"><a class="page-link bg-transparent"
                                href="http://localhost/cuweb/user/allmembers.php?page=<?php echo $i; ?>"><?php echo $i ;?></a></li>

                        <?php endfor ?>

                        <li class="page-item bg-transparent"><a class="page-link bg-transparent"
                                href="http://localhost/cuweb/user/allmembers.php?page=<?php echo $next; ?>"
                                href="#">Next</a></li>
                        <li class="ml-4">
                            <!-- Limit the Number of Records From The Databse -->
                            <form action="#" method="post">
                                <select name="limit-records" id="limit-records">
                                    <option disabled=="disabled" selected="selected">--Limit Records--</option>
                                    <?php foreach ([5,50,100,200] as $limit): ?>
                                    <option <?php if( isset($_POST["limit-records"]) && $_POST["limit-records"] == $limit){ echo "selected"; } ?>
                                        value="<?php echo $limit ?>">
                                        <?php echo $limit ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </form>
                        </li>
                    </ul>
                </nav>


                <table class="table table-sm table-striped table-hover">
                    <thead class="greenBgDark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">RGNo</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $result):?>
                        <tr>
                            <th scope="row" class="w-auto"><?php echo $count; $count+=1 ?>
                            </th>
                            <td class="text-capitalize"><?php echo ucwords($result['user_fname']); echo $result['user_lname'];?>
                            </td>
                            <td><?php echo $result['user_regno']; ?>
                            </td>
                            <td><?php echo $result['user_type']; ?>
                            </td>
                        </tr>
                        <?php endforeach?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>us
</main>


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
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#limit-records").change(function(){
			$('form').submit();
		})
	})
</script>





</body>

</html>