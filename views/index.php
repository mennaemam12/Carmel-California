<?php
include 'projectFolderName.php';
require_once 'models/Item.php';
$rows = Item::getAllItems();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Carmel Calfornia</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

	<base href="<?php echo $projectFolder ?>/" />

	<link rel="stylesheet" href="public/css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="public/css/animate.css">

	<link rel="stylesheet" href="public/css/owl.carousel.min.css">
	<link rel="stylesheet" href="public/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="public/css/magnific-popup.css">

	<link rel="stylesheet" href="public/css/aos.css">

	<link rel="stylesheet" href="public/css/ionicons.min.css">

	<link rel="stylesheet" href="public/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="public/css/jquery.timepicker.css">


	<link rel="stylesheet" href="public/css/flaticon.css">
	<link rel="stylesheet" href="public/css/icomoon.css">
	<link rel="shortcut icon" href="template/images/favicon.png" />
	<link rel="stylesheet" href="public/css/nav.css">
	<link rel="stylesheet" href="public/css/footer.css">
	<link rel="stylesheet" href="public/css/index.css">
	<link rel="stylesheet" href="public/css/chatbot.css">
</head>

<body>
	<?php
	include 'partials/nav.php';
	?>
	<!-- END nav -->
	<!-- include chatbot.php -->
	<?php
	include 'partials/chatbot.php';
	?>

	<section class="home-slider owl-carousel">
		<div class="slider-item" style="background-image: url(public/images/bg_1.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

					<div style=" z-index: 0; padding:30px; border-radius: 10px;	text-align: center;">
						<div style="z-index:0;">
							<span class="subheading">Welcome</span>
							<h1 class="mb-4">Discover Carmel, <br>California's flavours now in Cairo</h1>
							<p class="mb-4 mb-md-5"></p>
							<p><a href="#" class="btn btn-secondary btn-outline-white p-3 px-xl-4 py-xl-3">Order Now</a> <a href="menu" class="btn btn-secondary btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
						</div>
					</div>


				</div>
			</div>
		</div>

		<div class="slider-item" style="background-image: url(public/images/bg_6.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

					<div style="z-index: 0; padding:30px; border-radius: 10px;	text-align: center;">
						<div style="z-index:0;">
							<span class="subheading">Welcome</span>
							<h1 class="mb-4">Discover Carmel, <br>California's flavours now in Cairo</h1>
							<p class="mb-4 mb-md-5"></p>
							<p><a href="#" class="btn btn-secondary btn-outline-white p-3 px-xl-4 py-xl-3">Order Now</a> <a href="menu" class="btn btn-secondary btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="slider-item" style="background-image: url(public/images/bg_3.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

					<div style="z-index: 0; padding:30px; border-radius: 10px;	text-align: center;">
						<div style="z-index:0;">
							<span class="subheading">Welcome</span>
							<h1 class="mb-4">Discover Carmel, <br>California's flavours now in Cairo</h1>
							<p class="mb-4 mb-md-5"></p>
							<p><a href="#" class="btn btn-secondary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="menu" class="btn btn-secondary btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>


	<!--OUR STORY-->
	<section class="ftco-about d-md-flex">
		<div class="one-half img" style="background-image: url(public/images/bgstory_3.jpg); background-size: 88%;"></div>
		<div class="one-half ftco-animate">

			<div class="overlap">
				<div class="heading-section ftco-animate ">
					<span class="subheading">Discover</span>
					<h2 class="mb-4">Our Story</h2>
				</div>
				<div>
					<p>Born in 2021, Carmel is inspired by a small beach city in the "Golden State California, famous
						for its white sand, small cottages, and a breathtaking picturesque scenic road".</p>
					<p>Being an artisanal boutique, we start off with a carefully crafted mood, to match a wide offering of artisanal
						pastries, bakery, cakes, in addition to a selective all day menu.</p>
					<p>Join us into the Golden State of mind, where all good things collide.</p>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-services">
		<div class="container">
			<div class="row">
				<div class="col-md-4 ftco-animate">
					<div class="media d-block text-center block-6 services">
						<div class="icon d-flex justify-content-center align-items-center mb-5">
							<span class="flaticon-choices"></span>
						</div>
						<div class="media-body">
							<h3 class="heading">Easy to Order</h3>
							<p>Even the all-powerful Pointing has no control about the blind texts it is an almost
								unorthographic.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 ftco-animate">
					<div class="media d-block text-center block-6 services">
						<div class="icon d-flex justify-content-center align-items-center mb-5">
							<span class="flaticon-delivery-truck"></span>
						</div>
						<div class="media-body">
							<h3 class="heading">Fastest Delivery</h3>
							<p>Even the all-powerful Pointing has no control about the blind texts it is an almost
								unorthographic.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 ftco-animate">
					<div class="media d-block text-center block-6 services">
						<div class="icon d-flex justify-content-center align-items-center mb-5">
							<span class="flaticon-coffee-bean"></span>
						</div>
						<div class="media-body">
							<h3 class="heading">Quality Coffee</h3>
							<p>Even the all-powerful Pointing has no control about the blind texts it is an almost
								unorthographic.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 pr-md-5">
					<div class="heading-section text-md-right ftco-animate">
						<span class="subheading">Quality guaranteed</span>
						<h2 class="mb-4">Our Menu</h2>
						<p class="mb-4">All our items are handmade, working with speciality farmers and gourmet
							suppliers to ensure that our raw materials are up to our premium standard.
							Carmel's team cares about your experience, and offers a 100 % guarantee policy</p>
						<p><a href="menu" class="btn btn-primary btn-outline-primary px-4 py-3">View Full Menu</a></p>
					</div>
				</div>
				<div class="col-md-6">
				<div class="row">
						<?php
					for ($i = 0; $i < 4; $i++) {
					echo "<div class='col-md-6'>";
					echo "<div class='menu-entry'>";
					echo "<a href='product?type=" . $rows[$i]->itemType . "&id=" . $rows[$i]->id ."'>";
					echo "<img src='" . $rows[$i]->ImagePath . "' alt='' width='200' height='150'>";
					echo "</a>";
					echo "</div>";
					echo "</div>";
                                            }
											?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section" id="section-counter" style="padding: 30px;">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center">

			</div>
		</div>
	</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section ftco-animate text-center">
					<span class="subheading">Featured</span>
					<h2 class="mb-4">Best Coffee Sellers</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
						live the blind texts.</p>
				</div>
			</div>
			<div class="row">
			<?php
				for ($i = 0; $i < 4; $i++) {
					echo "<div class='col-md-3'>";
					echo "<div class='text text-center pt-4'>";
					echo "<div class='menu-entry'>";
					echo "<a href='product?type=" . $rows[$i]->itemType . "&id=" . $rows[$i]->id ."'>";
					echo "<img src='" . $rows[$i]->ImagePath . "' alt='' width='200' height='150'>";
					echo "</a>";
					echo "<h3><a href='product?type=" . $rows[$i]->itemType . "&id=" . $rows[$i]->id ."'>".$rows[$i]->Name."</a></h3>";
					echo "<p></p>";
					echo "<p><span>".$rows[$i]->Price."</span></p>";
					echo "<p><a class='btn btn-primary btn-outline-primary' href='product?type=" . $rows[$i]->itemType . "&id=" . $rows[$i]->id ."'>Add to Cart</a></p>";
				
					echo "</div>";
					echo "</div>";
					echo "</div>";
                                            }
											?>
							
							
							
			</div>
		</div>
	</section>

	<section class="ftco-gallery">
		<div class="container-wrap">
			<div class="row no-gutters">
				<div class="col-md-3 ftco-animate">
					<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(public/images/gallery-1.jpg);">
						<div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="icon-search"></span>
						</div>
					</a>
				</div>
				<div class="col-md-3 ftco-animate">
					<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(public/images/gallery-2.jpg);">
						<div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="icon-search"></span>
						</div>
					</a>
				</div>
				<div class="col-md-3 ftco-animate">
					<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(public/images/gallery-3.jpg);">
						<div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="icon-search"></span>
						</div>
					</a>
				</div>
				<div class="col-md-3 ftco-animate">
					<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(public/images/gallery-4.jpg);">
						<div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="icon-search"></span>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section img" id="ftco-testimony" style="background-image: url(public/images/cover2.jpg);background-size: cover;" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center mb-5">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<span class="subheading">Testimony</span>
					<h2 class="mb-4">Customers Says</h2>
					<p style="color:#fff">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
						live the blind texts.</p>
				</div>
			</div>
		</div>
		<div class="container-wrap">
			<div class="row d-flex no-gutters">
				<div class="col-lg align-self-sm-end ftco-animate">
					<div class="testimony">
						<blockquote>
							<p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an
								almost unorthographic life One day however a small.&rdquo;</p>
						</blockquote>
						<div class="author d-flex mt-4">
							<div class="image mr-3 align-self-center">
								<img src="public/images/person_4.jpg" alt="">
							</div>
							<div class="name align-self-center">Louise Kelly <span class="position">Illustrator
									Designer</span></div>
						</div>
					</div>
				</div>
				<div class="col-lg align-self-sm-end">
					<div class="testimony overlay">
						<blockquote>
							<p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an
								almost unorthographic life One day however a small line of blind text by the name of
								Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>
						</blockquote>
						<div class="author d-flex mt-4">
							<div class="image mr-3 align-self-center">
								<img src="public/images/person_2.jpg" alt="">
							</div>
							<div class="name align-self-center">Louise Kelly <span class="position">Illustrator
									Designer</span></div>
						</div>
					</div>
				</div>
				<div class="col-lg align-self-sm-end ftco-animate">
					<div class="testimony">
						<blockquote>
							<p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an
								almost unorthographic life One day however a small line of blind text by the name.
								&rdquo;</p>
						</blockquote>
						<div class="author d-flex mt-4">
							<div class="image mr-3 align-self-center">
								<img src="public/images/person_3.jpg" alt="">
							</div>
							<div class="name align-self-center">Louise Kelly <span class="position">Illustrator
									Designer</span></div>
						</div>
					</div>
				</div>
				<div class="col-lg align-self-sm-end">
					<div class="testimony overlay">
						<blockquote>
							<p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an
								almost unorthographic life One day however.&rdquo;</p>
						</blockquote>
						<div class="author d-flex mt-4">
							<div class="image mr-3 align-self-center">
								<img src="public/images/person_2.jpg" alt="">
							</div>
							<div class="name align-self-center">Louise Kelly <span class="position">Illustrator
									Designer</span></div>
						</div>
					</div>
				</div>
				<div class="col-lg align-self-sm-end ftco-animate">
					<div class="testimony">
						<blockquote>
							<p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an
								almost unorthographic life One day however a small line of blind text by the name.
								&rdquo;</p>
						</blockquote>
						<div class="author d-flex mt-4">
							<div class="image mr-3 align-self-center">
								<img src="public/images/person_4.jpg" alt="">
							</div>
							<div class="name align-self-center">Louise Kelly <span class="position">Illustrator
									Designer</span></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php
	include 'views/partials/footer.php'
	?>


	<script src="public/js/jquery.min.js"></script>
	<script src="public/js/jquery-migrate-3.0.1.min.js"></script>
	<script src="public/js/popper.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
	<script src="public/js/jquery.easing.1.3.js"></script>
	<script src="public/js/jquery.waypoints.min.js"></script>
	<script src="public/js/jquery.stellar.min.js"></script>
	<script src="public/js/owl.carousel.min.js"></script>
	<script src="public/js/jquery.magnific-popup.min.js"></script>
	<script src="public/js/aos.js"></script>
	<script src="public/js/jquery.animateNumber.min.js"></script>
	<script src="public/js/bootstrap-datepicker.js"></script>
	<script src="public/js/jquery.timepicker.min.js"></script>
	<script src="public/js/scrollax.min.js"></script>
	<script src="public/js/main.js"></script>
	<script src="public/js/nav.js"></script>
	<script src="public/js/Cart.js"></script>

</body>

</html>