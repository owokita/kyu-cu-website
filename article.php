<!DOCTYPE HTML>
<html>

<head>
    <title>KYUCUBLOG</title>
    <link rel="icon" type="image/png" href="images/logoicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Style Blog Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <!--RESET SCSS-->
    <link rel="stylesheet" href="css/reset.css">
    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <!--MEDIA QUERIES-->
    <link rel="stylesheet" href="css/mq..css">
    <!--FONT AWESOME-->
    <script src="js/all.js"></script>
    <!--OWL CSS-->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link href="css/animate.min.css" rel="stylesheet">
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <style type="text/css">
        .bs-example {
            margin: 20px;
        }

        @media screen and (min-width: 768px) {

            .dropdown:hover .dropdown-menu,
            .btn-group:hover .dropdown-menu {
                display: block;
            }

            .dropdown-menu {
                margin-top: 0;
            }

            .dropdown-toggle {
                margin-bottom: 2px;
            }

            .navbar .dropdown-toggle,
            .nav-tabs .dropdown-toggle {
                margin-bottom: 0;
            }
        }
    </style>
</head>

<body>
    <?php require 'includes/nav.php'  ?>
    <div class="header-bottom">
        <div class="container">
            <div class="logo">
                <h1 class="text-success"> KYU-CU BLOG</h1>
                <p><label class="of"></label>Serving God With Fervent Worship<label class="on"></label></p>
            </div>
        </div>
    </div>
    <!--  Main Section -->
    <section>
        <div class="container my-4 ">

            <div class="row">
                <!-- Articles-->
                <div id="main-col" class="col-md-9 rounded ">
                    <div class="w3ls px-2  row">
                        <?php
                            if (isset($_GET['id'])):
                                $urlID= $_GET['id'];
                                
                                $artOBJ = new  ARTICLE();
                                $article = $artOBJ->getArtSpecificWhere($urlID);
                                // echo print_r($article);

                        ?>

                        <article class="tc-ch wow fadeInDown mt-2" data-wow-duration=".8s" data-wow-delay=".2s">
                            <div class="tch-img">
                                <img src="user/includes/images/<?php echo $article['articleimg']  ?>"
                                    class="img-responsive article-img" alt="">
                            </div>

                            <h3><?php echo  $article['article_tittle']; ?>
                            </h3>
                            <h6 class="text-capitalize font-weight-bold">By <?php echo  $article['user_fname']; echo " "; echo  $article['user_lname'];?>
                                on
                                <?php echo  $article['article_pub_date']; ?>.
                            </h6>
                            <!-- Like Buttons And Comments -->
                            <div class="d-flex">
                                <div class="mx-3"><span> <i class="far fa-comment-alt"></i> </span> 4</div>
                                <div class="mx-3"><span> <i class="far fa-thumbs-up"></i> </span> 4</div>
                                <div class="mx-3"><span> <i class="far fa-share-square"></i> </span> </div>
                            </div>
                            <p><?php echo  $article['article_text']; ?>
                            </p>
                            <!-- View More Share -->
                            <div class="d-flex justify-content-between">
                                <div class="d-inline">
                                    <button class="btn btn-sm btn-outline-success">Read More</button>
                                </div>


                                <!-- Social Media  -->
                                <div class="d-inline">
                                    <div class="row">
                                        <div class="d-inline font-weight-bold "> Share On</div>
                                    </div>
                                    <div class="row">
                                        <div class="d-inline"> <i class="fab fa-whatsapp-square fa-2x"></i></div>
                                        <div class="d-inline"><i class="fab fa-facebook-square fa-2x"></i></div>
                                    </div>


                                </div>
                            </div>

                            <!-- Comment -->
                            <form id="comment" action="user/includes/articleComment.php" method="POST"
                                id="comment_form">

                                <input type="hidden" name="artid"
                                    value=" <?php echo $article['article_id']  ?>">

                                <div class="form-group">
                                    <textarea name="comment_content" id="comment_content" class="form-control"
                                        placeholder="Enter Comment" rows="5" required></textarea>
                                </div>
                                <button class="btn btn-success" name="comment">Submit</button>
                                <div class="row">
                                    <?php
                                    $artOBJ = new  ARTICLE();
                                    $comments = $artOBJ->getcomments($article['article_id']);
                                    foreach ($comments as $comment):
                                     ?>
                                    <div class="col  ml-5 mt-1 flex-fill text-right border rounded">
                                        <?php  echo $comment['comment'] ?>
                                        <br><span class="font-italic font-weight-bold" style="font-size: 0.7em"><?php  echo $comment['user_fname']; echo " "; echo $comment['user_lname'];  ?></span>
                                    </div>
                                    <?php endforeach ?>
                                </div>

                            </form>




                        </article>


                        <div class="clearfix"></div>
                    </div>
                    <?php endif ?>
                </div>

                <!-- Resent Article Section -->
                <div id="article" class="col-md-3  ">
                    <div class="blo-top1 bg-light rounded px-2">

                        <div class="tech-btm">

                            <div class="search-1 wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
                                <form action="#" method="post">
                                    <input type="search" name="Search" value="Search" onfocus="this.value = '';"
                                        onblur="if (this.value == '') {this.value = 'Search';}" required="">
                                    <input type="submit" value=" ">
                                </form>
                            </div>
                            <h4>Recent Posts </h4>
                            <?php
                            $artRecentOBJ = new  ARTICLE();
                            $recents = $artRecentOBJ->getArtResent();
                            foreach ($recents as $recent):?>
                            <div class="blog-grids wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
                                <div class="blog-grid-left">
                                    <a
                                        href="article.php?id=<?php  echo $recent['article_id']; ?>"><img
                                            src="user/includes/images/<?php echo $recent['articleimg']  ?>"
                                            alt=""></a>
                                </div>
                                <div class="blog-grid-right">

                                    <h6><a
                                            href="article.php?id=<?php  echo $recent['article_id']; ?>"><?php echo   $recent['article_tittle']; ?></a>
                                    </h6>
                                </div>
                                <div class="clearfix"> </div>
                            </div>

                            <?php endforeach?>



                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- foote -->
    <?php require 'includes/footer.php' ?>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#comment_form').on('submit', function(event) {
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "user/includes/articleComment.php",
                    method: "POST",
                    data: form_data,
                    dataType: "JSON",
                    success: function(data) {
                        if (data.error != '') {
                            $('#comment_form')[0].reset();
                            $('#comment_message').html(data.error);
                            $('#comment_id').val('0');
                            load_comment();
                        }
                    }
                })
            });

            load_comment();

            function load_comment() {
                $.ajax({
                    url: "fetch_comment.php",
                    method: "POST",
                    success: function(data) {
                        $('#display_comment').html(data);
                    }
                })
            }

            $(document).on('click', '.reply', function() {
                var comment_id = $(this).attr("id");
                $('#comment_id').val(comment_id);
                $('#comment_name').focus();
            });

        });
    </script>

</body>

</html>