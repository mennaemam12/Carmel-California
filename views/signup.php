<?php
$con = mysqli_connect("localhost", "root", "","carmel");
if(isset($_POST['Submit'])){

	$Name=$_POST['name'];
	$Email=$_POST['email'];
    $Phone=$_POST['phone'];
    $Password=$_POST['password'];
	$confirm_password=$_POST['confirmPassword'];
   
	
	$sql="insert into users(name,email,phone,password) values ('$Name','$Email','$Phone','$Password')";
		if(mysqli_query($GLOBALS['con'],$sql)){
			$lastInsertedID = mysqli_insert_id($GLOBALS['con']);
			session_start();
            $_SESSION["UserID"] = $lastInsertedID;
            header('Location: ' .$projectFolder. '/'); // Redirect to the home page
        }
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register</title>
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
					<h3>Sign Up</h3>
					<div class="form-holder active">
						<input type="text" placeholder="name" name="name" class="form-control">
					</div>
					<div class="form-holder">
						<input type="text" placeholder="e-mail" name="email" class="form-control">
					</div>
                    <div class="form-holder">
						<input type="text" placeholder="Phone Number" name="phone" class="form-control">
					</div>
					<div class="form-holder">
						<input type="password" placeholder="Password" class="form-control" name="password" style="font-size: 15px;">
					</div>
                    <div class="form-holder">
						<input type="password" placeholder="Confirm Password" class="form-control" name="confirmPassword" style="font-size: 15px;">
					</div>
					<div class="checkbox">
						<label>
			
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-login">
						<button type="submit" name="Submit">Sign up</button>
						<p>Already Have account? <a href="/login">Login</a></p>
					</div>
				</form>
			</div>
		</div>

		<script src="public/js/jquery.js"></script>
		<script src="public/js/reg.js"></script>
	</body>
</html>