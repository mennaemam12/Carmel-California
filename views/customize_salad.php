<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'views/partials/head.php'; ?>
    <link rel="stylesheet" href="public/css/client_side/customize_salad.css">

</head>

<body>
<?php
include 'partials/nav.php';
?>

<section>
    <div class="salad-container">
        <div class="choose-salad">
            <div class="title">Customize Your Salad</div>
            <div class="ingredients-div">
                <div class="ingredient">
                    <div class="category-heading">
                        <div class="category">Base</div>
                        <div class="info">Choose 1</div>
                    </div>
                    <div class="ingredient-options">
                        <div class="option">
                            <image src="public/images/salad-ingredients/lettuce.jpg">
                            <div class="option-name">Lettuce</div>
                            <div class="option-price">0 EGP</div>
                        </div>
                        <div class="option">
                            <image src="public/images/salad-ingredients/lettuce.jpg">
                            <div class="option-name">Lettuce</div>
                            <div class="option-price">0 EGP</div>
                        </div>
                        <div class="option">
                            <image src="public/images/salad-ingredients/lettuce.jpg">
                            <div class="option-name">Lettuce</div>
                            <div class="option-price">0 EGP</div>
                        </div>

                    </div>
                </div>


                <div class="ingredient">
                    <div class="category-heading">
                        <div class="category">Base</div>
                        <div class="info">Choose 1</div>
                    </div>
                </div>
                <div class="ingredient">
                    <div class="category-heading">
                        <div class="category">Base</div>
                        <div class="info">Choose 1</div>
                    </div>
                </div>
                <div class="ingredient">
                    <div class="category-heading">
                        <div class="category">Base</div>
                        <div class="info">Choose 1</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="calculations">
            <div class="title">Your Salad Picks</div>
            <div class="category-pricing">
                <div class="category-name">Base:
                    <span class="chosen-item">Lettuce</span>
                </div>
                <div class="category-price"><span>0</span> EGP</div>
            </div>
            <div class="category-pricing">
                <div class="category-name">Base:
                    <span class="chosen-item">Lettuce</span>
                </div>
                <div class="category-price"><span>0</span> EGP</div>
            </div>
            <div class="category-pricing">
                <div class="category-name">Base:
                    <span class="chosen-item">Lettuce</span>
                </div>
                <div class="category-price"><span>0</span> EGP</div>
            </div>
            <div class="category-pricing">
                <div class="category-name">Base:
                    <span class="chosen-item">Lettuce</span>
                </div>
                <div class="category-price"><span>0</span> EGP</div>
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
<script src="public/js/jquery-migrate-3.0.1.min.js"></script>
<script src="public/js/jquery.waypoints.min.js"></script>
<script src="public/js/scrollax.min.js"></script>
<script src="public/js/jquery.stellar.min.js"></script>
<script src="public/js/aos.js"></script>
<script src="public/js/owl.carousel.min.js"></script>
<script src="public/js/main.js"></script>
<script src="public/js/nav.js"></script>

</body>

</html>