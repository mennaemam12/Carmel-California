<?php
require_once 'helpers/session.helper.php';
include 'projectFolderName.php';

// $con = mysqli_connect("localhost", "root", "","carmel");
// if(isset($_POST['submit'])){
// 	$Email=$_POST["email"];
// 	$Password=$_POST["password"];

// 	$sql="SELECT * FROM users WHERE email='$Email' and password='$Password'";	
// 		$result=mysqli_query($GLOBALS['con'],$sql);
//         if ($row=mysqli_fetch_array($result)){
//             session_start();
//             $_SESSION["UserID"]=$row[0];
//             header('Location: ' .$projectFolder. '/'); // Redirect to the home page	
// 		}

// }
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- STYLE CSS -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

	<base href="<?php echo $projectFolder?>/">

	<link rel="stylesheet" href="public/css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="public/css/animate.css">

	<link rel="stylesheet" href="public/css/owl.carousel.min.css">
	<link rel="stylesheet" href="public/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="public/css/magnific-popup.css">

	<link rel="stylesheet" href="public/css/aos.css">

	<link rel="stylesheet" href="public/css/ionicons.min.css">

	<link rel="stylesheet" href="public/css/flaticon.css">
	<link rel="stylesheet" href="public/css/icomoon.css">

	
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
			<form action="login" method="post">
				<h3>Login</h3>
				<div class="form-holder active">
					<input type="text" placeholder="Email" name="Name/Email" class="form-control">
				</div>
				<div class="form-holder">
					<input type="password" placeholder="Password" name="UserPass" class="form-control" style="font-size: 15px;">
				</div>
				<div class="checkbox" style="display: none;">
					<label>
						<span class="checkmark"></span>
					</label>
				</div>
				<div class="form-message-div">
					<?php flash('formError') ?>
				</div>
				<div class="form-login">
					<button class="button" type="submit" name="submit">Login</button>
					<p>Don't have an account? <a href='signup'>Sign&nbsp;Up</a></p>
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
	<script src="public/js/nav.js"></script>
	
</body>

</html>