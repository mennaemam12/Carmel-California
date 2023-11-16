<?php
include 'projectFolderName.php';

$con = mysqli_connect("localhost", "root", "","carmel");
if(isset($_POST['submit'])){
	$Email=$_POST["email"];
	$Password=$_POST["password"];

	$sql="SELECT * FROM users WHERE email='$Email' and password='$Password'";	
		$result=mysqli_query($GLOBALS['con'],$sql);
        if ($row=mysqli_fetch_array($result)){
            session_start();
            $_SESSION["UserID"]=$row[0];
            header('Location: ' .$projectFolder. '/'); // Redirect to the home page	
		}

}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="public/css/login.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<div class="image-holder">
					<img src="public/images/reg.jpg" style="object-fit: fill;max-height: 780px;"alt="">
				</div>
				<form action="" method="post">
					<h3>Login</h3>
					<div class="form-holder active">
						<input type="text" placeholder="e-mail" name="email" class="form-control">
					</div>
					<div class="form-holder">
						<input type="password" placeholder="Password" name="password" class="form-control" style="font-size: 15px;">
					</div>
                    <div class="checkbox" style="display: none;">
						<label>
							<span class="checkmark"></span>
						</label>
					</div>
			
					<div class="form-login" style="margin-top: 10%;">
						<button type="submit" name="submit">Login</button>
						<p>Don't Have an account? <a href="signup.php">Sign Up</a></p>
					</div>
				</form>
			</div>
		</div>

		<script src="public/js/jquery.js"></script>
		<script src="public/js/reg.js"></script>
	</body>
</html>