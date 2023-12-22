<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php include 'views/partials/head.php'; ?>

    <link rel="stylesheet" href="public/css/animate.css">

    <link rel="stylesheet" href="public/css/nav.css">
    <link rel="stylesheet" href="public/css/footer.css">
    <link rel="stylesheet" href="public/css/contact.css">

</head>

<body>
<?php
include 'partials/nav.php';
?>

<section class="ftco-section contact-section pb-5 mt-1">
    <div class="container">
        <div class="row block-9">
            <div class="col-md-4 contact-info ftco-animate">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <h2 class="h4">Contact Information</h2>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p style="color:#006a4d">Address:</p>
                        <p> 13 street 18, Maadi as Sarayat Al Gharbeyah, Maadi, Cairo, Egypt</p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p style="color:#006a4d">Phone:</p>
                        <p><a href="tel://+20155 0067619">(+20)155 0067619</a></p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p style="color:#006a4d">Website:</p>
                        <p><a href="#">yoursite.com</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6 ftco-animate">
                <form action="#" class="contact-form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea name="" id="" cols="30" rows="7" class="form-control"
                                  placeholder="Message"></textarea>
                    </div>
                    <div class="form-group" style="border:none;">
                        <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
include 'partials/footer.php'
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
<script src="public/js/jquery.waypoints.min.js"></script>
<script src="public/js/scrollax.min.js"></script>
<script src="public/js/main.js"></script>
<script src="public/js/nav.js"></script>
</body>

</html>