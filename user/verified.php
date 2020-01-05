<?php require 'includes/topnav.php';
if ($_SESSION['user_type'] === "normal") {
    redirect("user.php");
}
$sess = new SESSION();
$sessId = $sess->getSessionID();

require 'includes/article.php';
?>

<main class="wrapper">
    <!-- Right side navigation -->
    <?php require 'includes/sidenav.php'?>
    <!--  End of Right side navigation -->

    <div class="content container-fluid">
        <!-- User Dashboard -->
        <div class="row">
            <div class="col text-center font-weight-bold text-success">Verified Posts</div>
        </div>
        <div class="row mt-1">

            <div class="col">

                <?php
                $artOBJ = new  ARTICLE();
               $articles = $artOBJ->getArtVerified()
                ?>

                <div class="" style="overflow-x:auto; max-height:70vh;">
                    <table class="table table-sm table-striped table-hover table-condensed">
                        <thead class="greenBgDark " style="">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Post Date</th>
                                <th scope="col"></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php  if (empty($articles)) {
                    echo '<tr> <td colspan="6" class="text-center">All posts have been  <strong>VERIFIED</strong>. Please check later </td></tr>';
                }  ?>

                            <?php foreach ($articles as $article):?>
                            <tr>
                                <?php   $date= explode(" ", $article['article_pub_date'], 2);  ?>
                                <th scope="row" class="w-auto"><?php echo $article['article_id'];?>
                                </th>
                                <td class="text-capitalize"><?php echo  $article['article_tittle']; ?>
                                </td>
                                <td><?php echo $article['category_fk_category_name']; ?>
                                </td>
                                <td><?php echo $date[0] ?>
                                </td>
                                <td>

                                    <a href="verified.php?id=<?php  echo $article['article_id']; ?>"
                                        class=""><button id="" type="button" class="btn btn-primary btn-sm"
                                            data-toggle="editpost" onclick="reply_click(this.id)"
                                            data-target=".bd-example-modal-sm">View</button> </a>

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




<!--amin verify  post Modal -->

<div class="modal fade" id="editpost" tabindex="-1" role="dialog" aria-labelledby="RegNewMemberModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header p-1 " style="background-color:  #f6dffa;">
                <h5 class="modal-title text-center" id="exampleModalScrollableTitle">Edit Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- //require the ck editor -->
            <script src="ckeditor/ckeditor.js"></script>
            <?php  if (isset($_GET['id'])): ?>
            <?php
                    $urlID= $_GET['id'];

                    $artOBJ = new  ARTICLE();
                    $articleData = $artOBJ->getArtSpecific($urlID);
  
            ?>

            <div class="modal-body py-0 px-1">
                <img src="includes/images/<?php echo $articleData[0]['articleimg']  ?>"
                    class="img-fluid img-thumbnail" alt="">
                <!-- //form to create a new post -->
                <form id="userEditpost" action="includes/article.inc.php" enctype="multipart/form-data" method="post">
                    <div class="col">
                        <span class="font-weight-bolder d-inline">CATEGORY: </span><?php echo $articleData[0]['category_fk_category_name']  ?>
                    </div>
                    <div class="col">
                        <span class="font-weight-bolder d-inline">TITLE: </span><?php echo $articleData[0]['article_tittle']  ?>
                    </div>


                    <input type="hidden" name="artid"
                        value=" <?php echo $articleData[0]['article_id']  ?>">

                    <!-- //id if the person who posted the article -->
                    <input type="hidden" name="userid"
                        value=" <?php echo $articleData[0]['article_fk_user_id']  ?>">
                    <div class="col card mb-2">
                        <?php echo $articleData[0]['article_text']  ?>
                    </div>


                </form>
                <?php endif ?>
            </div>
            <div class="modal-footer p-1" style="background-color:  #f6dffa;">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancle</button>
                <button type="submit" class="btn btn-danger btn-sm" form="userEditpost"
                    name="reject_article">Reject</button>

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
</script>





</body>

</html>

<?php
/*this  code will pop up the modal immediately the page
 loads incase there is a new message in the form*/
if (isset($_GET['id'])) {
    echo '<script>
        $("#editpost").modal();
    
    </script>';
}
