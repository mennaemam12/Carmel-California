<?php
require_once 'helpers/session.helper.php';
include 'projectFolderName.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <base href="<?php echo $projectFolder ?>/">

    <link rel="shortcut icon" href="template/images/favicon.png"/>

    <link rel="stylesheet" href="public/css/open-iconic-bootstrap.min.css">
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

        <form id="signup-form" action="signup" method="post">
            <h3>Sign Up</h3>
            <div id="form-message-div" style="margin-top:25px;margin-bottom:25px;text-align: center;">
                <?php flash('formError') ?>
            </div>

            <input type="hidden" name="type" value="register">
            <div class="form-holder active">
                <input type="text" id="name" placeholder="Full Name" name="FullName" class="form-control">
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
                <input type="password" id="password" placeholder="Password" class="form-control" name="UserPass"
                       style="font-size: 15px;">
            </div>
            <div class="form-holder">
                <input type="password" id="confirmpass" placeholder="Confirm Password" class="form-control"
                       name="UserConfPass" style="font-size: 15px;">
            </div>

            <div class="form-login">
                <button class="button" type="button" onclick="validator.initialize();" name="Submit">Sign&nbsp;up
                </button>
                <p>Already have an account? <a href='login'>Login</a></p>
            </div>
        </form>
    </div>
</div>

<?php
include 'views/partials/footer.php'
?>
<script src="public/js/jquery.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>

<script src = "public/js/nav.js"></script>
<script src="public/js/validation/signup.js"></script>
</body>

</html>