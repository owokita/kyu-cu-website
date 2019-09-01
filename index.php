<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="images/logoicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>KYUCU</title>
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
	<!-- this scipt is used to enable drop drop down on hover of the header -->
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

	<header>
		<div class="row p-0 m-0">

			<div class="col p-0 wow fadeInRightBig">
				<h2 class="text-center main-h1" style="font-size:2vw"><strong>KIIRINYAGA UNIVERSITY CHRISTIAN
						UNION</strong></h2>
				<h4 class="text-center" style="font-size:1.5vw"><em>Serving God With Ferverent Worship</em>
				</h4>
			</div>

		</div>
	</header>
	<?php require 'includes/nav.php'  ?>
	<!--//========SLIDER SECTION-->

	<section id="slider">

		<div class="row mx-0">
			<div class="col p-0 text-center">
				<div id="car" class="carousel slide carousel-fade" data-ride='carousel'>
					<!--This is the containers-->
					<!--Indicators-->
					<ul class="carousel-indicators">
						<li data-target="#car" data-slide-to='0' class="active"></li>
						<li data-target="#car" data-slide-to='1'></li>
						<li data-target="#car" data-slide-to='2'></li>
						<li data-target="#car" data-slide-to='3'></li>
					</ul>

					<!--Images-->
					<div id="carausel" class="carousel-inner">
						<div class="carousel-item active">
							<img src="images/slider/1.jpeg" class=" w-100 slide-img" alt="pic 1">
						</div>
						<div class="carousel-item">
							<img src="images/slider/2.jpeg" class=" w-100 slide-img" alt="pic 1">
						</div>
						<div class="carousel-item">
							<img src="images/slider/3.jpeg" class="  w-100 slide-img " alt="pic 1">
						</div>
						<div class="carousel-item">
							<img src="images/slider/4.jpeg" class=" w-100 slide-img" alt="pic 1">
						</div>
					</div>
					<!--End of Images-->

					<!--Controls-->
					<a href="#car" class="carousel-control-prev" data-slide="prev">
						<span class="carousel-control-prev-icon"></span>
					</a>

					<a href="#car" class="carousel-control-next" data-slide="next">
						<span class="carousel-control-next-icon"></span>
					</a>


				</div>
			</div>

		</div>
	</section>

	<main>
		<!--  Main Section -->
		<section>
			<div class="container my-4 ">
				<!-- Upcoming Events-->
				<div class="row">

					<div id="main-col" class="col-md-9 rounded ">
						<div class="bg-light px-2">
							<!-- UPCOMING EVENTS PICTURE ROW-->
							<div class="row w-50 mx-auto wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
								<img src="images/upcomingevents2.png" alt="" class="img-fluid px-3" srcset="">
							</div>
							<!-- UPCOMING EVENTS ROW-->
							<div id="upcoming" class="d-flex justify-content-center ">
								<div class="col-auto col-md-3 ">
									<img src="images/uploads/2.jpeg" class="img-fluid" alt="">
								</div>
								<div class="col-auto col-md-3 ">
									<img src="images/uploads/1.jpeg" class="img-fluid" alt="">
								</div>
								<div class="col-auto col-md-3 ">
									<img src="images/uploads/3.jpeg" class="img-fluid" alt="">
								</div>
								<div class="col-auto col-md-3 ">
									<img src="images/uploads/4.jpeg" class="img-fluid" alt="">
								</div>
								<div class="col-auto col-md-3 ">
									<img src="images/uploads/4.jpeg" class="img-fluid" alt="">
								</div>


							</div>
							<!-- ABOUT,MISSION,VISION ROW-->
							<div class="row text-center my-4">
								<!-- //THE ABOUT BLOCK -->
								<div class=" col-sm-4 wow fadeInLeft" data-wow-duration=".8s" data-wow-delay=".2s">
									<div class="card transparentGB about border-left-0 border-right-0 border-top-0 "
										style="background-color:transparent;">
										<div class="card-header tGB pBG about p-1 ">
											-VISION-
										</div>
										<div class="card-body">
											To be the source of true light shinning in the campus and to the entire
											globe
											for
											God's
											Grlory.
										</div>

									</div>
								</div>
								<!-- //THE ABOUT BLOCK -->
								<div class="col-sm-4 wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
									<div class="card transparentGB about border-left-0 border-right-0 border-top-0 "
										style="background-color:transparent;">
										<div class="card-header tGB pBG about p-1">
											-MISSION-
										</div>
										<div class="card-body">
											To be the source of true light shinning in the campus and to the entire
											globe
											for
											God's
											Grlory.
										</div>
									</div>
								</div>
								<!-- //THE ABOUT BLOCK -->

								<div class="col-sm-4 wow fadeInRight" data-wow-duration=".8s" data-wow-delay=".2s">
									<div class="card transparentGB about border-left-0 border-right-0 border-top-0 "
										style="background-color:transparent;">
										<div class="card-header tGB pBG about p-1">
											-MOTTO-
										</div>
										<div class="card-body">
											To be the source of true light shinning in the campus and to the entire
											globe
											for
											God's
											Grlory.
										</div>
									</div>
								</div>

							</div>
							<!-- WEEKLY PROGRAM ROW-->
							<div class="row">
								<div class="col wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
									<table class="table table-sm mt-4 border">
										<thead class="thead-dark">
											<tr id="">
												<th scope="col">DAY</th>
												<th scope="col">TIME</th>
												<th scope="col">EVENT</th>

											</tr>
										</thead>
										<tbody>
											<tr>
												<th>Monday</th>
												<td>19:00-20:00 <br> 19:00-21:00 </td>
												<td>Bible Study <br> Creative Ministry</td>
											</tr>
											<tr>
												<th>Tuesday</th>
												<td>19:00-20:00</td>
												<td>Evangelism</td>
											</tr>
											<tr>
												<th>Wednesday</th>
												<td>19:00-20:00</td>
												<td>Discipleship</td>
											</tr>
											<tr>
												<th>Thursaday</th>
												<td>19:00-20:00</td>
												<td>Choir</td>
											</tr>
											<tr>
												<th>Friday</th>
												<td>19:00-20:30</td>
												<td> Friday Night Service</td>
											</tr>
											<tr>
												<th>Saturday</th>
												<td>12:00-14:00 <br> 14:00-16:00</td>
												<td>Instrument Practise <br>Praise & Worship Practice</td>
											</tr>
											<tr>
												<th>Sunday</th>
												<td>07:00-09:00 <br>09:30-11:30 <br>19:00-20:00 </td>
												<td>Fisrt Service <br>Second Service <br>Itercessory</td>
											</tr>
										</tbody>

									</table>
								</div>
							</div>
						</div>

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
								<h4>Resent Posts </h4>
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

		<!-- Quote Secttion-->
		<section id="quote" class="">

			<div class="container vertical-center">
				<div class="row py-4 ">
					<div class="col my-auto">
						<h2 class="text-center display-4"
							style="color:#33C722;; font-family: 'Marck Script', cursive; ">
							<i class="fas fa-quote-left fa-1x text-primary mb-3"></i>
							Serving God With Fervent Worship
							<i class="fas fa-quote-right fa-1x text-primary mb-3"></i>
						</h2>

					</div>
				</div>
			</div>

		</section>

		<!-- Ministries Section -->
		<section>
			<div class="container ">
				<div class="row">
					<h1 class="mx-auto">Our Ministries</h1>
				</div>
				<div class="row bg-color tGB">
					<div class="col-lg-4 mt-1">
						<div class="immageBox">
							<img src="images/t1.jpg" alt="" width="1600" class="img-fluid">
							<div class="textBox pt-5">
								<p class="text-center bg-color"><em><strong>ZIPPORAH THUO<br>
											Praise &amp; Worship Director</strong></em></p>
								<h1 class="text-center"><strong>PRAISE AND WORSHIP</strong></h1>
							</div>
						</div>
					</div>
					<div class="col-lg-4 mt-1">
						<div class="immageBox">
							<img src="images/t1.jpg" alt="" width="1600" class="img-fluid ">
							<div class="textBox pt-5 ">
								<p class="text-center "><strong>PAUL MUNGATHIA<br>
										bible study co-ordinator</strong></p>
								<h1 class="text-center "><strong>BIBLE STUDY</strong></h1>
							</div>
						</div>
					</div>
					<div class="col-lg-4 mt-1">
						<div class="immageBox">
							<img src="images/t1.jpg" alt="" width="1600" class="img-fluid">
							<div class="textBox pt-5">
								<p class="text-center"><em><strong>AUSTIN MATUNGA<br>
											Music co-ordinator</strong></em></p>
								<h1 class="text-center"><strong>MUSIC</strong></h1>
							</div>
						</div>
					</div>
				</div>

			</div>
		</section>

		<!-- Portpular Posts Section -->
		<section>
			<div class="container">
				<div class="row">
					<h3 class="mx-auto">Porpular Posts</h3>
				</div>
				<div class="w3ls p-0 row">
					<div class="col-md-6 w3ls-left wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
						<div class="tc-ch">
							<div class="tch-img">
								<a href="singlepage.html">
									<img src="images/m4.jpg" class="img-responsive" alt=""></a>
							</div>

							<h3><a href="singlepage.html">Lorem Ipsum is simply</a></h3>
							<h6>BY <a href="singlepage.html">FELIX OMUOK </a>JULY 10 2016.</h6>
							<p>Ut enim ad minim veniam, quis nostrud eiusmod tempor incididunt ut labore et dolore magna
								aliqua exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<div class="bht1">
								<a href="singlepage.html">Read More</a>
							</div>
							<div class="soci">
								<ul>
									<li class="hvr-rectangle-out"><a class="fb" href="#"><i
												class="fab fa-facebook-f"></i></a></li>

								</ul>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="col-md-6 w3ls-left wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
						<div class="tc-ch">
							<div class="tch-img">
								<a href="singlepage.html"><img src="images/m5.jpg" class="img-responsive" alt=""></a>
							</div>

							<h3><a href="singlepage.html">Lorem Ipsum is simply</a></h3>
							<h6>BY <a href="singlepage.html">FELIX OMUOK </a>JULY 10 2016.</h6>
							<p>Ut enim ad minim veniam, quis nostrud eiusmod tempor incididunt ut labore et dolore magna
								aliqua exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<div class="bht1">
								<a href="singlepage.html">Read More</a>
							</div>
							<div class="soci">
								<ul>
									<li class="hvr-rectangle-out"><a class="twit" href="#"><i
												class="fab fa-facebook-f"></i></a></li>

								</ul>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>

		</section>
		<!-- Leaders' Section -->
		<section id="leaders " class="wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
			<div class="row">
				<h3 class="mx-auto">Meet Our Dedicated Leaders</h3>
			</div>
			<div class="wrapper container text-center">
				<?php  $sql = "select user_fname,user_lname, leaders_quote,leaders_fk_position_name,leaders_img from leaders
inner join user on user_id = leaders_fk_user_id;";
                $userOBJ = new USER();
                $leaders = $userOBJ->queryNone($sql);
                ?>
				<div class="leaders-carousel owl-carousel">
					<?php foreach ($leaders as $leader): ?>
					<div class="single-leader py-3">
						<div class="leader-img"><?php echo '
								<img src="data:image/png;base64,'.base64_encode($leader['leaders_img']).'" alt="" srcset="">
								';
                                ?>
						</div>
						<div class="leader-text">
							<h5 class="text-uppercase"> <?php echo $leader['user_fname']; ?>
								<?php echo $leader['user_lname']; ?>
							</h5>
							<h6><?php echo $leader['leaders_fk_position_name']; ?>
							</h6>
							<hr>
							<p> <?php echo   substr($leader['leaders_quote'], 0, 235);  ?>
							</p>
						</div>
					</div>
					<?php endforeach;?>
				</div>
			</div>
		</section>


	</main>
	<!-- Footer -->
	<?php require 'includes/footer.php' ?>
	<a href="#" class="back-to-top"><i class="fas fa-arrow-circle-up fx-7"></i></a>


	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".dropdown, .btn-group").hover(function() {
				var dropdownMenu = $(this).children(".dropdown-menu");
				if (dropdownMenu.is(":visible")) {
					dropdownMenu.parent().toggleClass("open");
				}
			});
		});
	</script>
	<script src="js/owl.carousel.min.js"></script>
	<!-- OWL CAROUSEL -->
	<script>
		$('.leaders-carousel').owlCarousel({
			loop: true,
			margin: 20,
			nav: true,
			autoplay: true,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 3
				},
				1000: {
					items: 4
				}
			}
		})
	</script>
</body>

</html>