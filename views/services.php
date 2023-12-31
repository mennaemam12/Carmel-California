<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'views/partials/head.php'; ?>


    <link rel="stylesheet" href="public/css/owl.carousel.min.css">

    <link rel="stylesheet" href="public/css/client_side/services.css">
</head>
<body>
<?php
require_once 'controllers/nav.controller.php';
    NavController::viewNav();
?>

<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(public/images/bg_7.webp);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Services</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="">Home</a></span> <span>Services</span></p>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-services">
    <div class="container">
        <div class="row">
            <div class="col-md-4 ftco-animate">
                <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-5">
                        <span class="flaticon-choices"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Easy to Order</h3>
                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ftco-animate">
                <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-5">
                        <span class="flaticon-delivery-truck"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Fastest Delivery</h3>
                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ftco-animate">
                <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-5">
                        <span class="flaticon-coffee-bean"></span></div>
                    <div class="media-body">
                        <h3 class="heading">Quality Coffee</h3>
                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'partials/footer.php';
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="public/js/jquery-migrate-3.0.1.min.js"></script>
<script src="public/js/jquery.waypoints.min.js"></script>
<script src="public/js/scrollax.min.js"></script>
<script src="public/js/jquery.stellar.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="public/js/owl.carousel.min.js"></script>
<script src="public/js/main.js"></script>
<script src="public/js/nav.js"></script>

</body>
</html>