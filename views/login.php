<!DOCTYPE html>
<html>

<head>
    <?php include 'views/partials/head.php'; ?>

    <link rel="stylesheet" href="public/css/client_side/login.css">
</head>

<body>
<?php
require_once 'controllers/nav.controller.php';
NavController::viewNav();
?>

<section>
    <div class="image">
        <img loading='lazy'src="public/images/reg.webp" alt="">
    </div>
    <div class="login" id="login">
        <form id="login-form" method="POST" action="login" class = "ftco-animate">
            <div class="form-title">Sign In</div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="text" class="form-control" id="Email" name="Email"
                       placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="UserPass">Password</label>
                <input type="password" class="form-control" id="UserPass" name="UserPass"
                       placeholder="Enter your password">
            </div>

            <div class=form-group>
                <div class="form-message-div" id="form-message-div"></div>
            </div>

            <div class="form-group">
                <button type="button" onclick="validator.initialize();" class="button btn" name="submit"
                        id="submit">Sign In
                </button>
            </div>

            <div class="form-group">
                <div class="form-group" style="margin-bottom:0px;">
                    <p>Don't have an account? <a href='signup'>Sign&nbsp;Up</a></p>
                </div>

                <div class="form-group" >
                    <a href="forgotPassword">Forgot Password?</a>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="public/js/jquery-migrate-3.0.1.min.js"></script>
<script src="public/js/jquery.waypoints.min.js"></script>
<script src="public/js/scrollax.min.js"></script>
<script src="public/js/jquery.stellar.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="public/js/owl.carousel.min.js"></script>
<script src="public/js/main.js"></script>
<script src="public/js/nav.js"></script>
<script src="public/js/validation/login.js"></script>
</body>
</html>