<!DOCTYPE html>
<html>

<head>

    <?php include 'views/partials/head.php';?>
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
        <form id="login-form" action="login" method="post">
            <h3>Login</h3>
            <div class="form-holder active">
                <input type="text" id="Name/Email" placeholder="UserName or Email" name="Name/Email"
                       class="form-control">
            </div>
            <div class="form-holder">
                <input type="password" id="Password" placeholder="Password" name="UserPass" class="form-control"
                       style="font-size: 15px;">
            </div>
            <div class="checkbox" style="display: none;">
                <label>
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="form-message-div" id="form-message-div"></div>
            <div class="form-login">
                <button class="button" type="button" onclick="validator.initialize();" name="submit">Login</button>
                <p>Don't have an account? <a href='signup'>Sign&nbsp;Up</a></p>
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
<script src="public/js/validation/login.js"></script>

</body>

</html>