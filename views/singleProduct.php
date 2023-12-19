<?php
include 'projectFolderName.php';
require_once 'models/Item.php';
require_once 'models/ItemOption.php';
require_once 'models/Review.php';
@session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Carmel Calfornia</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <base href="<?php echo $projectFolder ?>/"/>

    <link rel="stylesheet" href="public/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="public/css/animate.css">

    <link rel="stylesheet" href="public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="public/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="public/css/magnific-popup.css">

    <link rel="stylesheet" href="public/css/aos.css">

    <link rel="stylesheet" href="public/css/ionicons.min.css">

    <link rel="stylesheet" href="public/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="public/css/jquery.timepicker.css">


    <link rel="stylesheet" href="public/css/flaticon.css">
    <link rel="stylesheet" href="public/css/icomoon.css">
    <link rel="shortcut icon" href="template/images/favicon.png"/>
    <link rel="stylesheet" href="public/css/nav.css">
    <link rel="stylesheet" href="public/css/footer.css">
    <link rel="stylesheet" href="public/css/product.css">
    <style>
        .ftco-section {
            padding-bottom: 0px;
        }

        .ftco-section:not(:first-of-type) {
            padding-top: 60px;
        }
    </style>
</head>

<body>
<?php
include 'partials/nav.php';
?>
<!-- END nav -->

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="<?=$item->ImagePath?>" class="image-popup"><img src="<?=$item->ImagePath?>" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <!-- <h3>Creamy Latte Coffee</h3> -->
                <h3><?=$item->Name?></h3>
                <!-- <p class="price"><span>$4.90</span></p> -->
                <p class="price"><span><?=$item->Price?> EGP</span></p>
                <p><?=$item->Description?></p>
                <!-- <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.
                </p> -->
                <div class="row mt-4">
                    <div class="col-md-6">
                        <?php if (!empty($result)) { ?>
                            <?php foreach ($result as $itemOptions) {
                                $criteria = $itemOptions['criteria'];
                                $values = $itemOptions['values'];
                                ?>
                                <div class="form-group d-flex">
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <label for="options"><?= $criteria ?></label>
                                        <select name="options" id="options" class="form-control">
                                            <?php foreach ($values as $value) { ?>
                                                <option value="<?= $value ?>"><?= $value ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="w-100"></div>

                <label for="quantity">Quantity</label>
                <div class="input-group col-md-6 d-flex mb-3">
              <span class="input-group-btn mr-2">
                <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                  <i class="icon-minus"></i>
                </button>
              </span>
                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1"
                           max="100">
              <span class="input-group-btn ml-2">
                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                  <i class="icon-plus"></i>
                </button>
              </span>
                </div>
            <?php if(isset($_SESSION['user'])){?>
                <p><a onclick="add()" id="addCart" class="btn btn-primary py-3 px-5" style="color: white">Add to Cart</a></p>
            <?php }else{?>
                <p><a href='<?=$projectFolder?>/login' class="btn btn-primary py-3 px-5" style="color: white">Add to Cart</a></p>
            <?php }?>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container" id="reviews">
        <div class="row justify-content-center pb-3">
            <div class="heading-section ftco-animate" style="display: flex;flex-direction:column; align-items:flex-start;row-gap:10px;">
                <span class="subheading"
                      style="margin-bottom:10px; padding:10px; float: left">Reviews</span>
                <?php
                if (count($reviews) <= 0) {
                    echo "<h2 class='mb-4' style='padding-right:10px;'>No Reviews were posted for this item</h2>";
                }
                ?>
            </div>
        </div>
        <form class="review-form" id="review-form" action="product" method="POST">
            <div style="display:flex; flex-direction: row;align-items:center;justify-content: space-between" ;><label>Enter
                    your review: </label>
                <div class="rating">
                    <input value="5" name="rating" id="star5" type="radio" checked>
                    <label title="5" for="star5"></label>
                    <input value="4" name="rating" id="star4" type="radio">
                    <label title="4" for="star4"></label>
                    <input value="3" name="rating" id="star3" type="radio">
                    <label title="3" for="star3"></label>
                    <input value="2" name="rating" id="star2" type="radio">
                    <label title="2" for="star2"></label>
                    <input value="1" name="rating" id="star1" type="radio">
                    <label title="1" for="star1"></label>
                </div>
            </div>
            <textarea class="review-form-input" rows="4" maxlength="400"></textarea>
            <div class="form-message-div" id="form-message-div" style="color:red;"><?php flash("reviewError"); ?></div>
            <p>
                <button onclick="validator.initialize()" id="addReview" type="button" class="btn btn-primary py-3 px-5"
                        style="color: white">Add your review
                </button>
            </p>
        </form>


        <?php
        if (count($reviews) > 0) {
            foreach ($reviews as $review) {
                ?>
                <div class="user-review overlay">
                    <div class="author row justify-content-left d-flex p-1"
                         style="display:flex; flex-direction: row; align-items: center; column-gap:15px;">
                        <div class="name"
                             style="font-weight: bold; font-size: 15px;padding-left:10px; padding-right:10px;">
                            <?php echo $review->getUserName(); ?>
                        </div>
                        <div class="rating">
                            <?php for ($i = 1; $i <= 5; $i++) { ?>
                                    <?php if ($review->getRating() >= $i)
                                        echo "<span class = 'past-review-stars-checked' >★</span>";
                                    else
                                        echo "<span class = 'past-review-stars'>★</span>";
                            } ?>
                        </div>
                        <?php echo $review->getDate(); ?>
                    </div>
                    <blockquote>
                        <p>&ldquo;<?php echo $review->getMessage(); ?>&rdquo;</p>
                    </blockquote>
                </div>
            <?php }
        }
        ?>

    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Discover</span>
                <h2 class="mb-4">Related products</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                    the blind texts.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="menu-entry">
                    <a href="#" class="img" style="background-image: url(public/images/menu-1.jpg);"></a>
                    <div class="text text-center pt-4">
                        <h3><a href="#">Coffee Capuccino</a></h3>
                        <p>A small river named Duden flows by their place and supplies</p>
                        <p class="price"><span>$5.90</span></p>
                        <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="menu-entry">
                    <a href="#" class="img" style="background-image: url(public/images/menu-2.jpg);"></a>
                    <div class="text text-center pt-4">
                        <h3><a href="#">Coffee Capuccino</a></h3>
                        <p>A small river named Duden flows by their place and supplies</p>
                        <p class="price"><span>$5.90</span></p>
                        <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="menu-entry">
                    <a href="#" class="img" style="background-image: url(public/images/menu-3.jpg);"></a>
                    <div class="text text-center pt-4">
                        <h3><a href="#">Coffee Capuccino</a></h3>
                        <p>A small river named Duden flows by their place and supplies</p>
                        <p class="price"><span>$5.90</span></p>
                        <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="menu-entry">
                    <a href="#" class="img" style="background-image: url(public/images/menu-4.jpg);"></a>
                    <div class="text text-center pt-4">
                        <h3><a href="#">Coffee Capuccino</a></h3>
                        <p>A small river named Duden flows by their place and supplies</p>
                        <p class="price"><span>$5.90</span></p>
                        <p><a class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
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
<script src="public/js/jquery.min.js"></script>
<script src="public/js/jquery-migrate-3.0.1.min.js"></script>
<script src="public/js/popper.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/jquery.easing.1.3.js"></script>
<script src="public/js/jquery.waypoints.min.js"></script>
<script src="public/js/jquery.stellar.min.js"></script>
<script src="public/js/owl.carousel.min.js"></script>
<script src="public/js/jquery.magnific-popup.min.js"></script>
<script src="public/js/aos.js"></script>
<script src="public/js/jquery.animateNumber.min.js"></script>
<script src="public/js/bootstrap-datepicker.js"></script>
<script src="public/js/jquery.timepicker.min.js"></script>
<script src="public/js/scrollax.min.js"></script>
<script src="public/js/main.js"></script>
<script src="public/js/Cart.js"></script>
<script src="public/js/validation/review.js"></script>

<script>
    $(document).ready(function () {

        var quantitiy = 0;
        $('.quantity-right-plus').click(function (e) {

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            $('#quantity').val(quantity + 1);


            // Increment

        });

        $('.quantity-left-minus').click(function (e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            // Increment
            if (quantity > 0) {
                $('#quantity').val(quantity - 1);
            }
        });

    });
</script>


</body>

</html>