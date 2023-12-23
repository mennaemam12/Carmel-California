<!DOCTYPE html>
<html>

<head>
    <?php include 'views/partials/head.php'; ?>

    <link rel="stylesheet" href="public/css/client_side/login.css">
</head>

<body>
<?php
include 'views/partials/nav.php'
?>

<section>
    <div class="image">
        <img src="public/images/reg.jpg" alt="">
    </div>
    <div class="login">
        <form id="signup-form" method="POST" action="signup" class="ftco-animate">
            <div class="form-title">Sign Up</div>
            <div class="form-group">
                <input type="text" id="name" placeholder="Full Name" name="FullName" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" id="email" placeholder="Email" name="Email" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" id="phoneNumber" placeholder="Phone Number" name="PhoneNumber"
                       class="form-control">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" id="UserPass" name="UserPass"
                       placeholder="Password">
            </div>

            <div class="form-group">
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

<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
    </svg>
</div>

<script src="public/js/jquery.min.js"></script>
<script src="public/js/jquery-migrate-3.0.1.min.js"></script>
<script src="public/js/jquery.waypoints.min.js"></script>
<script src="public/js/scrollax.min.js"></script>
<script src="public/js/jquery.stellar.min.js"></script>
<script src="public/js/aos.js"></script>
<script src="public/js/owl.carousel.min.js"></script>
<script src="public/js/main.js"></script>
<script src="public/js/nav.js"></script>
<script src="public/js/validation/signup.js"></script>
</body>
</html>