<?php
include 'projectFolderName.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'views/partials/head.php'; ?>

    <link rel="stylesheet" href="public/css/client_side/cart.css">

</head>
<body>
<?php
include 'partials/nav.php';
?>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list" style='overflow-x: hidden;'>
                    <table class="table">
                        <thead class="thead-primary">
                        <tr class="text-center">
                            <th>&nbsp</th>
                            <th>Product</th>
                            <th>&nbsp</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        $total = 0;
                        foreach ($items as $item) {
                            ?>
                            <tr class="text-center">
                                <td class="product-remove">
                                    <button type="submit" class="remove-btn" onclick="removeItem(<?= $i ?>)"
                                            style="border:none;">
                                        <span class="icon-close"></span>
                                    </button>
                                </td>
                                <td class="image-prod">
                                    <div class="img" style="background-image:url(<?= $item->ImagePath ?>);"></div>
                                </td>
                                <td class="product-name">
                                    <?php if ($cartItems[$i]->getSelectedOption() == '') { ?>
                                        <h3 style="margin-bottom:0px;"><?= $item->Name ?></h3>
                                    <?php } else { ?>
                                        <h3 style="margin-bottom:0px;"><?= $item->Name ?>
                                            (<?= $cartItems[$i]->getSelectedOption() ?>)</h3>
                                    <?php } ?>
                                </td>
                                <td class="price" style="color:#504831;"><?= $item->Price ?>&nbsp;EGP</td>
                                <td class="quantity">
                                    <div class="input-group">
                                        <button type="button" onclick="decrementQuantity(<?= $i ?>)"
                                                class="quantity-left-minus btn" data-type="minus" data-field="">
                                            <i class="icon-minus"></i>
                                        </button>
                                        <input type="text" disabled id="quantity" name="quantity"
                                               class="form-control input-number"
                                               value="<?= $cartItems[$i]->getQuantity() ?>" min="1" max="100">
                                        <button type="button" onclick="incrementQuantity(<?= $i ?>)"
                                                class="quantity-right-plus btn" data-type="plus" data-field="">
                                            <i class="icon-plus"></i>
                                        </button>
                                    </div>
                                </td>

                                <td class="total" id="item-total"
                                    style="color:#504831;"><?php echo $item->Price * $cartItems[$i]->getQuantity() ?>
                                    &nbsp;EGP
                                </td>
                            </tr><!-- END TR-->
                            <?php
                            $total = $total + $item->Price * $cartItems[$i]->getQuantity();
                            $i++;
                            ?>

                        <?php } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php if (count($items) != 0): ?>
            <div class="row justify-content-end">
                <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span id="subtotal-field"><?= $total ?>&nbsp;EGP</span>
                        </p>

                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span id="total-field"><?= $total ?>&nbsp;EGP</span>
                        </p>
                    </div>
                    <p class="text-center"><a href="checkout" class="btn btn-primary py-3 px-4"
                                              style="background-color:#006a4d;">Proceed to Checkout</a></p>
                </div>
            </div>
        <?php else: ?>
            <div class="row justify-content-center ftco-animate " style="margin-top:50px">
                <h2>No items to display.</h2>
            </div>
        <?php endif; ?>


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
                        <p class="price"><span style="color:#504831;">$5.90</span></p>
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
                        <p class="price"><span style="color:#504831;">$5.90</span></p>
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
                        <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'partials/footer.php'
?>


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
<script src="public/js/cart.js"></script>

</body>
</html>