<?php
include 'projectFolderName.php';
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
	<link rel="stylesheet" href="public/css/menu.css">
	
  </head>
  <body>
	<?php
	include 'partials/nav.php';
	?>

	<section class="home-slider owl-carousel">

	  <div class="slider-item" style="background-image: url(public/images/bg_7.png);" data-stellar-background-ratio="0.5">
		  <div class="overlay"></div>
		<div class="container">
		  <div class="row slider-text justify-content-center align-items-center">

			<div class="col-md-7 col-sm-12 text-center ftco-animate">
				<h1 class="mb-3 mt-5 bread">Our Menu</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="">Home</a></span> <span>Menu</span></p>
			</div>

		  </div>
		</div>
	  </div>
	</section>

	<section class="ftco-intro">
		<div class="container-wrap">
			<div class="wrap d-md-flex align-items-xl-end">
				<div class="info" style="background:#DDD1C3;">
					<div class="row no-gutters">
						<div class="col-md-4 d-flex ftco-animate">
							<div class="icon"><span class="icon-phone"></span></div>
							<div class="text">
								<h3>(+20) 1550067619</h3>
							</div>
						</div>
						<div class="col-md-4 d-flex ftco-animate">
							<div class="icon"><span class="icon-my_location"></span></div>
							<div class="text">
								<h3>13 Street 18, Maadi, Cairo, Egypt</h3>
							</div>
						</div>
						<div class="col-md-4 d-flex ftco-animate">
							<div class="icon"><span class="icon-clock-o"></span></div>
							<div class="text">
								<h3>Open 24 hours</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="ftco-menu mb-5 pb-5">
		<div class="container">
			<div class="row justify-content-center mb-5">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<span class="subheading">Discover</span>
					<h2 class="mb-4">Our Menu</h2>
				</div>
			</div>
			<div class="row d-md-flex">
				<div class="col-lg-12 ftco-animate p-md-5">
					<div class="row">
				  <div class="col-md-12 nav-link-wrap mb-5">
					<div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">

						<a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Main</a>

						<a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Sides</a>

						<a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Breakfast</a>

						<a class="nav-link" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false">Desserts</a>

						<a class="nav-link" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="false">Drinks</a>
					</div>
					</div>
				  
					<?php

					function generateItemsHTML($Categories, $Items, $itemType)
					{
						$html = '<section class="ftco-section">
								<div class="container">
									<div class="row">';

						foreach ($Categories as $category) {
							$html .= '<div class="col-md-6 mb-5 pb-3">
									<h3 class="mb-5 heading-pricing ftco-animate">' . $category . '</h3>';

							foreach ($Items as $item) {
								if ($item->getCategory() == $category) {
									$html .= '<div class="pricing-entry d-flex ftco-animate" onclick="window.location.href=\'product?type=' .
										$itemType . '&id=' . $item->getID() . '\'">
											<div class="img" style="background-image: url(' . $item->getImagePath() . ');"></div>
											<div class="desc pl-3">
												<div class="d-flex text align-items-center">
													<h3><span>' . $item->getName() . '</span></h3>
													<span class="price">' . $item->getPrice() . ' L.E</span>
												</div>
												<div class="d-block">
													<p>' . $item->getDescription() . '</p>
												</div>
											</div>
										</div>';
								}
							}

							$html .= '</div>';
						}

						$html .= '</div>
							</div>
						</section>';

						return $html;
					}

					?>
					
					<div class="tab-content ftco-animate" id="v-pills-tabContent">

					  <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
							  <?php echo generateItemsHTML($mainCategories, $mainItems, "main") ?>
					  </div>

					  <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
							  <?php echo generateItemsHTML($sideCategories, $sideItems, "sides") ?>
					  </div>

					  <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
							  <?php echo generateItemsHTML($breakfastCategories, $breakfastItems, "breakfast") ?>
					  </div>

					  <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
							  <?php echo generateItemsHTML($dessertCategories, $dessertItems, "desserts") ?>
					  </div>

					  <div class="tab-pane fade" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab">
							  <?php echo generateItemsHTML($drinkCategories, $drinkItems, "drinks") ?>
					  </div>

					  </div>
					</div>
				  </div>
			  </div>
			</div>
			<div class="row justify-content-center mb-5">
				<div class="col-md-7 heading-section text-center ftco-animate" style="text-align:center;">
					<a href='salad-order' class="btn btn-primary py-3 px-4" style='padding-top:32px;width:500px; height:100px; font-size:large; text-align:center;'>Create Your Own Salad</a>
				</div>
			</div>
		</div>
	</section>

<?php
include 'partials/footer.php'
	?>
	
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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
	
  </body>
</html>