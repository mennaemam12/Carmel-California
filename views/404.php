<!DOCTYPE html>
<html lang="en">

<head>

    <?php include 'views/partials/head.php';?>

    <link rel="stylesheet" href="public/css/client_side/404.css">

</head>

<body>
    <?php
    require_once 'controllers/nav.controller.php';
    NavController::viewNav();
    ?>

<section class="ftco-menu" style="padding-top:150px;padding-bottom:70px;" >
		<div class="container" >
			<div class="row justify-content-center mb-5">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<span style="margin-bottom:10px;" class="subheading">Oops</span>
					<h2 class="mb-4">Page was not found</h2>
                    <h4 class="mb-4">Lost? Don't forget to take a look at our <a style="font-size: 20px;text-decoration:underline;" href="menu">Menu</a></h4>
					<p><a style="text-decoration:underline;" href="index">Home</a></p>
				</div>
			</div>
		</div>
	</section>

    <?php
    include 'partials/footer.php'
    ?>


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="public/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="public/js/jquery.waypoints.min.js"></script>
    <script src="public/js/scrollax.min.js"></script>
    <script src="public/js/jquery.stellar.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="public/js/owl.carousel.min.js"></script>
    <script src="public/js/main.js"></script>
    <script src="public/js/nav.js"></script>

</body>

</html>