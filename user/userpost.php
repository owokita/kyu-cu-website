<?php require 'includes/topnav.php';

    $sess = new SESSION();
    $sessId = $sess->getSessionID();
    require 'includes/article.php';
   
?>

<main class="wrapper">
    <!-- Right side navigation -->
    <?php require 'includes/userSidenav.php'?>
    <!--  End of Right side navigation -->
    <div class="content container-fluid">
        <!-- User Dashboard -->
        <div class="col mt-2"> <button type="button" class="btn btn-outline-success" data-toggle="modal"
                data-target="#RegNewMemberModal"> <span><i class="fas fa-newspaper"></i></span>
                Create New Post</button></div>
        <div class="row mt-2">
            <div class="col">

                <?php
                $artOBJ = new  ARTICLE();
               $articles = $artOBJ->getArt($sessId);
                ?>

                <div class="" style="overflow-x:auto; max-height:70vh;">
                    <table class="table table-sm table-striped table-hover ">
                        <thead class="greenBgDark " style="">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Post Date</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  if (empty($articles)) {
                    echo '<tr> <td colspan="6" class="text-center">You have no POSTS. Click on the <strong>Create New Post</strong> to post your first article </td></tr>';
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

                                    <a href="userpost.php?id=<?php  echo $article['article_id']; ?>"
                                        class=""><button id="" type="button" class="btn btn-primary btn-sm"
                                            data-toggle="editpost" onclick="reply_click(this.id)"
                                            data-target=".bd-example-modal-sm">Edit</button> </a>

                                </td>
                                <td>
                                    <button
                                        id="<?php echo $article['article_id']; ?>"
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

<!--member new post Modal -->
<div class="modal fade" id="RegNewMemberModal" tabindex="-1" role="dialog" aria-labelledby="RegNewMemberModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:  #f6dffa;">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Create A New Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <script src="ckeditor/ckeditor.js"></script>
            <?php
                $sql ="SELECT * FROM category";
                $userOBJ = new USER();
                $categories = $userOBJ->queryNone($sql);
            ?>

            <div class="modal-body py-0 px-1">
                <!-- //form to create a new post -->
                <form id="usernewpost" action="includes/article.inc.php" enctype="multipart/form-data" method="post">
                    <div class="form-group ">

                        <select id="inputState" name="category" class="form-control form-control-sm" required>
                            <option disabled=="disabled" selected="selected">-- Select Category --</option>
                            <?php foreach ($categories as $category):?>
                            <option><?php echo $category['category_name'] ?>
                            </option>
                            <?php endforeach?>

                        </select>
                    </div>
                    <div class="form-group ">

                        <input type="text" class="form-control form-control-sm" id="lastName"
                            aria-describedby="emailHelp" placeholder="Enter Article Title" name="post-title" required>

                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Upload Image Here</label>
                        <input type="file" class="form-control-file form-control-sm" name="image"
                            id="exampleFormControlFile1">
                    </div>


                    <textarea name="content" placeholder="Enter Article Content"></textarea>
                    <script>
                        CKEDITOR.replace('content');
                    </script>
                </form>

            </div>
            <div class="modal-footer" style="background-color:  #f6dffa;">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success" form="usernewpost" name="post_article">Post</button>
            </div>
        </div>
    </div>
</div>


<!--member edit post Modal -->

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
                    <div class="form-group mb-1">

                        <select id="inputState" name="category" class="form-control form-control-sm" required>
                            <option selected="selected"><?php echo $articleData[0]['category_fk_category_name']  ?>
                            </option>
                            <?php foreach ($categories as $category):?>
                            <option><?php echo $category['category_name'] ?>
                            </option>
                            <?php endforeach?>

                        </select>
                    </div>
                    <input type="hidden" name="artid"
                        value=" <?php echo $articleData[0]['article_id']  ?>">
                    <div class="form-group mb-1 ">

                        <input type="text" class="form-control form-control-sm" id="lastName"
                            value="<?php echo $articleData[0]['article_tittle']  ?>"
                            aria-describedby="emailHelp" placeholder="Enter Article Title" name="post-title" required>

                    </div>

                    <div class="form-group mb-0">
                        <label for="exampleFormControlFile1">Upload New Image Here</label>
                        <input type="file" class="form-control-file form-control-sm" name="image"
                            id="exampleFormControlFile1">
                    </div>


                    <textarea name="content2"
                        placeholder="Enter Article Content"><?php echo $articleData[0]['article_text']  ?></textarea>
                    <script>
                        CKEDITOR.replace('content2');
                    </script>
                </form>
                <?php endif ?>
            </div>
            <div class="modal-footer p-1" style="background-color:  #f6dffa;">
                <butlton type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                    <button type="submit" class="btn btn-success" form="userEditpost"
                        name="update_article">Update</button>
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
                        <h6 class="text-white text-center py-2 rounded bg-secondary"><span><i
                                    class="fas fa-exclamation-triangle"></i></span> Confirmation</h6>

                        <p>Are you sure you want to delete this Post?</p>

                        <button type="button" data-dismiss="modal" class="btn btn-secondary  btn-sm">NO</button>
                        <a id="demo" class="btn btn-danger btn-sm" href="">YES </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- <script src="js/admin.js"></script> -->
<script src="js/croppie.min.js"></script>
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

    })

    //this function will get the value of he button clicked and insert it inthe modal
    function reply_click(clicked_id) {
        x = clicked_id;
        document.getElementById("demo").href = "includes/delete.inc.php?article=" + x;
    }
</script>


<script>

</script>



<?php

//database_connection.php

?>

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
