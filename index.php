
<?php require 'user/includes/init.php' ?>

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
	<nav class="navbar navbar-expand-md navbar-dark  sticky-top p-0" style="background-color: #500d62;  ">

		<button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapse_target">
			<ul class="navbar-nav " style="background-color: #500d62;">
				<li class="nav-item">
					<a class="nav-link" href="../index.html">HOME</a>

				</li>
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" data-target="dropdown_target" href="#">
						<span class="caret"></span>
						ABOUT US</a>
					<div class="dropdown-menu" aria-labelledby="dropdown_target">
						<a class="dropdown-item" href="html/history.php"> HISTORY</a>
						<div class="dropdown-divider"></div>

						<a class="dropdown-item " href="html/leadership.php"> LEADERSHIP</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item " href="html/advisory.php"> ADVISORY</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="html/commetee.php"> COMMITTEE</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="interim.php"> INTERIM</a>


					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="dropdown_target" href="#">
						<span class="caret"></span>
						MINISTRIES</a>
					<div class="dropdown-menu" aria-labelledby="dropdown_target">
						<a class="dropdown-item" href="html/bible-study.php"> BIBLE STUDY</a>
						<div class="dropdown-divider"></div>


						<a class="dropdown-item" href="html/intersessory.php"> INTERCESSORY</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="html/evangelism & mission.php"> EVANGELISM &amp; MISSION</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="html/ushering & hospitality.php"> USHERING&amp;HOSPITALITY</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="html/ICT & MEDIA.php"> ICT &amp;MEDIA</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href=""> MUSIC</a>


					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="dropdown_target" href="#">
						<span class="caret"></span>
						RESOURCES</a>
					<div class="dropdown-menu" aria-labelledby="dropdown_target">
						<a class="dropdown-item" href=""> CU CONSTITUTION</a>
						<div class="dropdown-divider"></div>

						<a class="dropdown-item" href="html/photos-gallaery.php"> PHOTO AND GALLAREY</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="admin/login.php"> ARTICLES</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href=""> CU POLICIES</a>



					</div>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="html/sermons.php">SERMONS</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="html/announcements.php">ANNOUNCEMENTS</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#footer">CONTACT US</a>
				</li>
				<li class="nav-item" style=" ">
					<a class="nav-link " href="user/user.php" style="background-color:green;">YOUR PROFILE</a>
				</li>

			</ul>
		</div>
	</nav>
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
								<div class="blog-grids wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
									<div class="blog-grid-left">
										<a href="singlepage.html"><img src="images/t2.jpg" class="img-responsive"
												alt=""></a>
									</div>
									<div class="blog-grid-right">

										<h5><a href="singlepage.html">Pellentesque dui Maecenas male</a> </h5>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="blog-grids wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
									<div class="blog-grid-left">
										<a href="singlepage.html"><img src="images/m2.jpg" class="img-responsive"
												alt=""></a>
									</div>
									<div class="blog-grid-right">

										<h5><a href="singlepage.html">Pellentesque dui Maecenas male</a> </h5>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="blog-grids wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
									<div class="blog-grid-left">
										<a href="singlepage.html"><img src="images/f2.jpg" class="img-responsive"
												alt=""></a>
									</div>
									<div class="blog-grid-right">

										<h5><a href="singlepage.html">Pellentesque dui Maecenas male</a> </h5>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="blog-grids wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
									<div class="blog-grid-left">
										<a href="singlepage.html"><img src="images/t3.jpg" class="img-responsive"
												alt=""></a>
									</div>
									<div class="blog-grid-right">

										<h5><a href="singlepage.html">Pellentesque dui Maecenas male</a> </h5>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="blog-grids wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
									<div class="blog-grid-left">
										<a href="singlepage.html"><img src="images/m3.jpg" class="img-responsive"
												alt=""></a>
									</div>
									<div class="blog-grid-right">

										<h5><a href="singlepage.html">Pellentesque dui Maecenas male</a> </h5>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="insta wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">


									This is the twitter section
								</div>
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
				<?php  $sql = "select user_fname,user_lname, leaders_quote,leaders_fk_position_name from leaders
inner join user on user_id = leaders_fk_user_id;";
				$userOBJ = new USER();
				$leaders = $userOBJ->queryNone($sql);				
				?>
				<div class="leaders-carousel owl-carousel">
					<?php foreach ($leaders as $leader): ?>
						<div class="single-leader py-3">
							<div class="leader-img">
								<!-- <img src="images/2.jpg" alt="" srcset=""> -->
							</div>
							<div class="leader-text">
								<h5 class="text-uppercase"> <?php echo $leader['user_fname']; ?> <?php echo $leader['user_lname']; ?></h5>
								<h6><?php echo $leader['leaders_fk_position_name']; ?> </h6>
								<hr>
								<p> <?php echo $leader['leaders_quote']; ?> </p>
							</div>
						</div>
					<?php endforeach;?>
				</div>
			</div>
		</section>


	</main>

	<footer id="footer" class="pBG pt-3">
		<div class="container-fluid">
			<!-- Subscribe & Social Media Row -->
			<div id="subscribe-row" class="row">
				<!-- Subscribe Col -->
				<div class="col-sm-6 col-md-6 col-lg-8">

					<div class="input-group mb-2 ">
						<!-- Subscribe Form -->
						<form action="" class="d-flex " method="post">
							<input type="email" class=" p-2  form-control" placeholder="Enter Email Address Here"
								aria-label="Recipient's username" aria-describedby="basic-addon2" required>
							<button class="input-group-append p-2 form-control w-auto">Subscribe</button>
						</form>
					</div>

				</div>
				<!-- Icons Section -->
				<div class="col-sm-6 col-md-6 col-lg-4 d-flex  justify-content-between pb-2">

					<div class="img-fluid ">
						<a href="https://www.youtube.com/channel/UCATgbHbBBDeEJVMH2qFdEVA" target="_blank"><img
								src="images/media-icons/youtube.png" alt="" class="img-fluid grayscale" /> </a>
					</div>
					<div class="img-fluid "><a href="http://www.twitter.com" target="_blank"><img
								src="images/media-icons/twitter.png" alt="" class="img-fluid grayscale" /></a></div>
					<div class="img-fluid "><a href="http://www.facebook.com" target="_blank"><img
								src="images/media-icons/facebook.png" alt="" class="grayscale img-fluid" /></a></div>
					<div class="img-fluid "><a href="http://www.flickr.com" target="_blank"><img
								src="images/media-icons/flickr.png" alt="" class="grayscale img-fluid" /></a></div>

				</div>
			</div>
			<hr>
			<div class="row py-4 text-center">
				<!-- Contact Us-->
				<div class="col-md-4 ">
					<h4 class="tGB">Contact Us</h4>
					<div class="card ">
						<ul class="list-group list-group-flash text-center">
							<li class="list-group-item"> Kerugoya Kutus Town </li>
							<li class="list-group-item"> <i class="fas fa-phone-volume fa-1x"></i> +254791342771</li>
							<li class="list-group-item"> <i class="fas fa-envelope fa-1x"></i> info@kyucu.co.ke</li>
							<li class="list-group-item"> P. O. Box 183–10303 <br>
								kutus </li>
						</ul>
					</div>
				</div>

				<!-- Location-->
				<div class="col-md-4 tGB">
					<h4>Location</h4>
					<div class="embed-responsive embed-responsive-4by3">
						<iframe
							src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6231837372593!2d37.31809741475345!3d-0.5666725995865723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182629b5a37f6381%3A0x859cebe37dc37639!2sKirinyaga+University!5e0!3m2!1sen!2ske!4v1563723692972!5m2!1sen!2ske"
							frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>


				</div>

				<!-- Feedback-->
				<div class="col-md-4 ">
					<h4 class="tGB">Feedback</h4>
					<div class="card card-body">
						<form method="post" action="includes\comment.inc.php">
							<div class="row text-dark">
								<div class="col-md-6 form-group">
									<label for="exampleInputEmail1">Email address</label>
									<input type="email" class="form-control" id="exampleInputEmail1"
										aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
									<small id="emailHelp" class="form-text text-muted">We'll never share your email with
										anyone
										else.</small>
								</div>
								<div class="col-md-6 form-group">
									<label for="exampleInputPassword1">Name</label>
									<input type="text" class="form-control" id="name" placeholder="Name" name="name"
										required>
								</div>

							</div>
							<div class="row">
								<div class="col">
									<textarea name="comment" id="comment" cols="30" rows="4" class="w-100"
										required></textarea>
								</div>

							</div>

							<button type="button" class="btn btn-success" data-toggle="modal"
								data-target=".bd-example-modal-sm">Submit</button>

							<!-- Submit modal -->
							<div class="modal fade bd-example-modal-sm text-dark" tabindex="-1" role="dialog"
								aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content p-3">
										<p> Are You sure You Want to Submit Your Feedback?</p>

										<div class="modal-footer">
											<button type="button" class="btn btn-secondary"
												data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Yes</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>

				</div>


			</div>
		</div>
		</div>
		<div class="container-fluid" id="last-row">

			<p id="last-row-para" class="text-center mx-auto"> &copy; Kirinyaga University Christian Union 2018</p>
		</div>
	</footer>
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