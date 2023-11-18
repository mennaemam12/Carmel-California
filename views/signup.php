<?php
include 'helpers/session.helper.php';
include 'projectFolderName.php';
// $con = mysqli_connect("localhost", "root", "","carmel");
// if(isset($_POST['Submit'])){

// 	$Name=$_POST['name'];
// 	$Email=$_POST['email'];
//     $Phone=$_POST['phone'];
//     $Password=$_POST['password'];
// 	$confirm_password=$_POST['confirmPassword'];


// 	$sql="insert into users(name,email,phone,password) values ('$Name','$Email','$Phone','$Password')";
// 		if(mysqli_query($GLOBALS['con'],$sql)){
// 			$lastInsertedID = mysqli_insert_id($GLOBALS['con']);
// 			session_start();
//             $_SESSION["UserID"] = $lastInsertedID;
//             header('Location: ' .$projectFolder. '/'); // Redirect to the home page
//         }
// }
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
	<link rel="stylesheet" href="public/css/style.css">
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

			<form action="<?php echo $projectFolder; ?>/signup" method="post">
				<h3>Sign Up</h3>
				<input type="hidden" name="type" value="register">
				<div class="form-holder active">
					<input type="text" placeholder="Full Name" name="FullName" class="form-control">
				</div>
				<div class="form-holder">
					<input type="text" placeholder="Username" name="Username" class="form-control">
				</div>
				<div class="form-holder">
					<input type="text" placeholder="Email" name="Email" class="form-control">
				</div>
				<div class="form-holder">
					<input type="text" placeholder="Phone Number" name="PhoneNumber" class="form-control">
				</div>
				<div class="form-holder">
					<input type="password" placeholder="Password" class="form-control" name="UserPass" style="font-size: 15px;">
				</div>
				<div class="form-holder">
					<input type="password" placeholder="Confirm Password" class="form-control" name="UserConfPass" style="font-size: 15px;">
				</div>
				<div class="checkbox">
					<input type="checkbox" checked>
					<label>
						I agree to bla bla bla
					</label>
				</div>

				<div class="form-message-div" style="margin-top:25px;">
					<?php flash('register') ?>
				</div>

				<div class="form-login">
					<button class="button" type="submit" name="Submit">Sign&nbsp;up</button>
					<p>Already have an account? <a href='<?php echo $projectFolder;?>/login'>Login</a></p>
				</div>
			</form>
		</div>
	</div>

	<?php
	include 'views/partials/footer.php'
	?>

	<script src="public/js/jquery.js"></script>
	<script src="public/js/reg.js"></script>

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
</body>

</html>