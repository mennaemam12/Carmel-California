<?php
require_once 'helpers/session.helper.php';
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- STYLE CSS -->
	<!-- STYLE CSS -->
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

	<link rel="stylesheet" href="public/css/flaticon.css">
	<link rel="stylesheet" href="public/css/icomoon.css">
	<link rel="shortcut icon" href="template/images/favicon.png" />
	<link rel="stylesheet" href="public/css/nav.css">
	<link rel="stylesheet" href="public/css/footer.css">
	<link rel="stylesheet" href="public/css/login.css">
</head>

<body>

	<?php
	include 'views/partials/nav.php'
	?>

	<div class="wrapper">
		<div class="inner">
			<div class="image-holder">
				<img src="public/images/reg.jpg" alt="">
			</div>

			<form id="signup-form" action="signup" method="post">
				<h3>Sign Up</h3>
				<input type="hidden" name="type" value="register">
				<div class="form-holder active">
					<input type="text" id = "name" placeholder="Full Name" name="FullName" class="form-control">
				</div>
				<div class="form-holder">
					<input type="text" id="username" placeholder="Username" name="Username" class="form-control">
				</div>
				<div class="form-holder">
					<input type="text" id="email" placeholder="Email" name="Email" class="form-control">
				</div>
				<div class="form-holder">
					<input type="text" id="phoneNumber" placeholder="Phone Number" name="PhoneNumber" class="form-control">
				</div>
				<div class="form-holder">
					<input type="password" id = "password" placeholder="Password" class="form-control" name="UserPass" style="font-size: 15px;">
				</div>
				<div class="form-holder">
					<input type="password" id="confirmpass" placeholder="Confirm Password" class="form-control" name="UserConfPass" style="font-size: 15px;">
				</div>

				<div class="form-message-div" id = "form-message-div" style="margin-top:25px;">
					<?php flash('formError') ?>
				</div>

				<div class="form-login">
					<button class="button" type="button" onclick="validator.initialize();" name="Submit">Sign&nbsp;up</button>
					<p>Already have an account? <a href='login'>Login</a></p>
				</div>
			</form>
		</div>
	</div>

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
	<script src="public/js/validation/signup.js"></script>
</body>

</html>