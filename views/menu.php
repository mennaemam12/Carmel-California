<?php
require_once 'controllers/menu.controller.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <?php include 'views/partials/head.php';?>
    <link rel="stylesheet" href="public/css/owl.carousel.min.css">

    <link rel="stylesheet" href="public/css/client_side/menu.css">

</head>
<body>

<?php
require_once 'controllers/nav.controller.php';
    NavController::viewNav();
?>

<section class="home-slider owl-carousel">
    <div class="slider-item" style= "background-image: url('public/images/bg_9.webp')" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Our Menu</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="">Home</a></span> <span>Menu</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-item" style="background-image: url('public/images/bg_2.webp')" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Our Menu</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="">Home</a></span> <span>Menu</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-item" style="background-image: url('public/images/bg_7.webp')" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Our Menu</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="">Home</a></span> <span>Menu</span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-intro">
    <div class="container-wrap">
        <div class="wrap d-md-flex align-items-xl-end">
            <div class="info" style="background:#DDD1C3;">
                <div class="row no-gutters">
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="icon"><span class="icon-phone"></span></div>
                        <div class="text">
                            <h3><a class="phone" href="tel://+20155 0067619" style="color:inherit">(+20) 155 0067619</a></h3>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="icon"><span class="icon-my_location"></span></div>
                        <div class="text">
                            <h3><a href="https://maps.app.goo.gl/3hpH3Aos6b4J4tLDA" style="color:inherit">13 Street 18, Maadi, Cairo, Egypt</a></h3>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="icon"><span class="icon-clock-o"></span></div>
                        <div class="text">
                            <h3>Open 24 hours</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-menu">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Discover</span>
                <h2 class="mb-4">Our Menu</h2>
            </div>
        </div>
        <div class="row d-md-flex">
            <div class="col-lg-12 ftco-animate p-md-5">
                <div class="row">
                    <div class="col-md-12 nav-link-wrap mb-5">
                        <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist"
                             aria-orientation="vertical">
                            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab"
                                 role="tablist" aria-orientation="vertical">

                                <a class="nav-link active" id="v-pills-1-tab" href="#v-pills-1">Breakfast</a>

                                <a class="nav-link" id="v-pills-2-tab" href="#v-pills-2">Main</a>

                                <a class="nav-link" id="v-pills-3-tab" href="#v-pills-3">Sides</a>

                                <a class="nav-link" id="v-pills-4-tab" href="#v-pills-4">Desserts</a>

                                <a class="nav-link" id="v-pills-5-tab" href="#v-pills-5">Drinks</a>
                            </div>
                        </div>


                        <div class="tab-content ftco-animate" id="v-pills-tabContent">

                            <div class="tab-pane fade show active" id="v-pills-1">
                                <?php echo MenuController::generateItemsHTML($breakfastCategories, $breakfastItems, "breakfast") ?>
                            </div>

                            <div class="tab-pane fade" id="v-pills-2">
                                <?php echo MenuController::generateItemsHTML($mainCategories, $mainItems, "main") ?>
                            </div>

                            <div class="tab-pane fade" id="v-pills-3">
                                <div class="create-salad">
                                    <a href="menu?action=customize-salad" class="ftco-animate salad-button">Customize Your Salad?</a>
                                </div>
                                <?php echo MenuController::generateItemsHTML($sideCategories, $sideItems, "sides") ?>
                            </div>

                            <div class="tab-pane fade" id="v-pills-4">
                                <?php echo MenuController::generateItemsHTML($dessertCategories, $dessertItems, "desserts") ?>
                            </div>

                            <div class="tab-pane fade" id="v-pills-5">
                                <?php echo MenuController::generateItemsHTML($drinkCategories, $drinkItems, "drinks") ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php
include 'partials/footer.php';


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
<script src="public/js/menu.js"></script>

</body>
</html>