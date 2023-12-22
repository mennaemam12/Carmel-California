<?php
include 'projectFolderName.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php include 'views/partials/head.php';?>

    <link rel="stylesheet" href="public/css/animate.css">

    <link rel="stylesheet" href="public/css/nav.css">
    <link rel="stylesheet" href="public/css/footer.css">
    <link rel="stylesheet" href="public/css/checkout.css">

    <style>
        .discount {
            display: none;
        }
    </style>
</head>

<body>
<?php
include 'partials/nav.php';
?>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 ftco-animate">
                <form action="#" class="billing-form p-3 p-md-5">
                    <h3 class="mb-4 billing-heading">Billing Details</h3>
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">First Name <span style='color:red'> *</span></label>
                                <input type="text" id="firstname" name="firstname" class="form-control"
                                       value='<?= $firstname ?>'>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname">Last Name <span style='color:red'> *</span></label>
                                <input type="text" id='lastname' name="lastname" class="form-control"
                                       value='<?= $lastname ?>'>
                            </div>
                        </div>

                        <div class="w-100"></div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="country">Area <span style='color:red'>*</span></label>
                                <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="area" id="area" value='<?= $area ?>' class="form-control">
                                        <option value="Maadi">Maadi</option>
                                        <option value="Nasr City">Nasr City</option>
                                        <option value="Heliopolis">Heliopolis</option>
                                        <option value="Obour City">Obour City</option>
                                        <option value="Shorouk City">Shorouk City</option>
                                        <option value="Sheikh Zayed">Sheikh Zayed</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="streetname">Street Name <span style='color:red'> *</span></label>
                                <input type="text" name='street' id="street" class="form-control"
                                       value='<?= $street ?>'>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="building">Building Number <span style='color:red'> *</span></label>
                                <input type="text" name='building' id="building" class="form-control"
                                       value='<?= $building ?>'>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="floor">Floor Number <span style='color:red'> *</span></label>
                                <input type="text" name='floor' id="floor" class="form-control" value='<?= $floor ?>'>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apartment">Apartment Number <span style='color:red'> *</span></label>
                                <input type="text" name='apartment' id="apartment" class="form-control"
                                       value='<?= $apartment ?>'>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apartment">Postcode/ZIP</label>
                                <input type="text" name='postalcode' id="postalcode" class="form-control"
                                       value='<?= $postalcode ?>'>
                            </div>
                        </div>


                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group mt-4">
                                <div class="radio">
                                    <label class="mr-3"><input type="radio" id='save' name="optradio"> Save information?
                                    </label>
                                </div>
                            </div>
                        </div>


                    </div>
                    <script>
                        function checkdiscount() {
                            var code = document.getElementById('discountcode').value;
                            applyDiscount(code);
                        }
                    </script>

                </form><!-- END -->


                <div class="row mt-5  d-flex" style="padding-top:0;">
                    <div class="col-md-6 d-flex">
                        <div class="cart-detail cart-total p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Cart Total</h3>
                            <div>
                                <label for="discount">Have a discount code?</label>
                                <input type="text" id='discountcode' name='discountcode'
                                       style="border:solid gray 1px; padding:5px; margin-bottom:15px;">
                                <button onclick='checkdiscount()' type="button"
                                        style="height:39px;cursor:pointer; border:none; padding:5px; background-color:#006a4d; color:white; font-size:small">
                                    Apply
                                </button>
                                <p id='discountapplied' style='color:red'></p>
                            </div>
                            <p class="d-flex">
                                <span>Number of Items</span>
                                <span><?= $count ?></span>
                            </p>
                            <p class="d-flex">
                                <span>Subtotal</span>
                                <span><?= $total ?>.00 LE</span>
                            </p>
                            <p class="d-flex">
                                <span>Delivery</span>
                                <span><?= $delivery ?>.00 LE</span>
                            </p>
                            <p id='discount' class="discount d-flex">
                                <span>Discount</span>
                                <span id='discountvalue'>0.00 LE</span>
                            </p>
                            <hr>
                            <p class="d-flex total-price">
                                <span>Total</span>
                                <span id='finaltotal'><?= $total + $delivery ?> LE</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cart-detail p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Payment Method</h3>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" class="mr-2" checked> COD</label>
                                    </div>
                                </div>
                            </div>


                            <p>
                                <button type="submit" onclick='submitForm()' class="btn btn-primary py-3 px-4">Place
                                    Order
                                </button>
                            </p>
                            <p id='formerror' style='color:red'></p>
                        </div>
                    </div>
                </div>
            </div> <!-- .col-md-8 -->


            <script>
                function submitForm() {
                    var formData = {
                        firstname: document.getElementById('firstname').value,
                        lastname: document.getElementById('lastname').value,
                        area: document.getElementById('area').value,
                        street: document.getElementById('street').value,
                        building: document.getElementById('building').value,
                        floor: document.getElementById('floor').value,
                        apartment: document.getElementById('apartment').value,
                        postalcode: document.getElementById('postalcode').value,
                        save: document.getElementById('save').checked,
                    }
                    validateForm(formData);
                }
            </script>


            <div class="sidebar-box ftco-animate">
                <h3>Paragraph</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus
                    voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique,
                    inventore eos fugit cupiditate numquam!</p>
            </div>
        </div>

    </div>
    </div>
</section>
<!-- .section -->

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
<script src="public/js/applydiscount-AJAX.js"></script>
<script src="public/js/validation/validatecheckout-AJAX.js"></script>
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