<!DOCTYPE html>
<html>

<head>
    <?php include 'views/partials/head.php'; ?>
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

<section id = "signup-section">
    <div class="image">
        <img src="public/images/reg.jpg" alt="">
    </div>
    <div class="login">
        <form id="signup-form" method="POST" action="signup">
            <div class="form-title">Sign Up</div>
            <div class="form-group">
<!--                <label for="name">Full Name</label>-->
                <input type="text" id="name" placeholder="Full Name" name="FullName" class="form-control">
            </div>
<!--            <div class="form-group">-->
<!--                <label for="username">Username</label>-->
<!--                <input type="text" id="username" placeholder="Username" name="Username" class="form-control">-->
<!--            </div>-->
            <div class="form-group">
<!--                <label for="email">Email</label>-->
                <input type="text" id="email" placeholder="Email" name="Email" class="form-control">
            </div>
            <div class="form-group">
<!--                <label for="phoneNumber">Phone Number</label>-->
                <input type="text" id="phoneNumber" placeholder="Phone Number" name="PhoneNumber"
                       class="form-control">
            </div>

            <div class="form-group">
<!--                <label for="UserPass">Password</label>-->
                <input type="password" class="form-control" id="UserPass" name="UserPass"
                       placeholder="Password">
            </div>

            <div class="form-group">
<!--                <label for="confirmpass">Confirm Password</label>-->
                <input type="password" id="confirmpass" placeholder="Confirm Password" class="form-control"
                       name="UserConfPass">
            </div>

            <div class=form-group>
                <div class="form-message-div" id="form-message-div"></div>
            </div>

            <div class="form-group">
                <button type="button" onclick="validator.initialize();" class="button btn" name="submit"
                        id="submit">Sign Up
                </button>
            </div>

            <div class="form-group">
                <div class="form-group">
                    <p>Already have an account? <a href='login'>Sign&nbsp;In</a></p>
                </div>
            </div>

        </form>
    </div>
</section>

<?php
include 'views/partials/footer.php'
?>
<script src="public/js/jquery.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/nav.js"></script>
<script src="public/js/validation/signup.js"></script>
</body>
</html>