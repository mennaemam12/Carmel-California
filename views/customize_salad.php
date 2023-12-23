<?php
include 'projectFolderName.php';
?>
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
            <div class="title ftco-animate">Customize Your Salad</div>
            <div class="ingredients-div">

                <!-- BASES -->
                <?php if ($bases): ?>
                    <div class="ingredient">
                        <div class="category-heading">
                            <div class="category">Toppings</div>
                            <div class="info">
                                <?php if ($bases[0]->CategoryMax == 1)
                                    echo 'Choose ' . $bases[0]->CategoryMax;
                                else
                                    echo 'Choose up to ' . $bases[0]->CategoryMax;
                                ?>
                            </div>
                        </div>
                        <div class="ingredient-options" id="topping-ingredients">
                            <?php foreach ($bases as $b): ?>
                                <div class="option">
                                    <image src="<?php echo $b->ImagePath ?>">
                                        <div class="option-name"><?php echo $b->Name ?></div>
                                        <i class="icon icon-plus" onclick="updateOrder('<?= $b->id ?>', this)"></i>
                                        <div class="option-price"><?php echo $b->Price ?>&nbsp;EGP</div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- TOPPINGS -->
                <?php if ($toppings): ?>
                    <div class="ingredient">
                        <div class="category-heading">
                            <div class="category">Toppings</div>
                            <div class="info">
                                <?php if ($toppings[0]->CategoryMax == 1)
                                    echo 'Choose ' . $toppings[0]->CategoryMax;
                                else
                                    echo 'Choose up to ' . $toppings[0]->CategoryMax;
                                ?>
                            </div>
                        </div>
                        <div class="ingredient-options" id="topping-ingredients">
                            <?php foreach ($toppings as $top): ?>
                                <div class="option">
                                    <image src="<?php echo $top->ImagePath ?>">
                                        <div class="option-name"><?php echo $top->Name ?></div>
                                        <i class="icon icon-plus" onclick="updateOrder('<?= $top->id ?>', this)"></i>
                                        <div class="option-price"><?php echo $top->Price ?>&nbsp;EGP</div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- DRESSINGS -->
                <?php if ($dressings): ?>
                    <div class="ingredient">
                        <div class="category-heading">
                            <div class="category">Dressings</div>
                            <div class="info">
                                <?php if ($dressings[0]->CategoryMax == 1)
                                    echo 'Choose ' . $dressings[0]->CategoryMax;
                                else
                                    echo 'Choose up to ' . $dressings[0]->CategoryMax;
                                ?>
                            </div>
                        </div>
                        <div class="ingredient-options" id="dressing-ingredients">
                            <?php foreach ($dressings as $d): ?>
                                <div class="option">
                                    <image src="<?php echo $d->ImagePath ?>">
                                        <div class="option-name"><?php echo $d->Name ?></div>
                                        <i class="icon icon-plus" onclick="updateOrder('<?= $d->id ?>', this)"></i>
                                        <div class="option-price"><?php echo $d->Price ?>&nbsp;EGP</div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Protein -->
                <?php if ($proteins): ?>
                    <div class="ingredient">
                        <div class="category-heading">
                            <div class="category">Protein</div>
                            <div class="info">
                                <?php if ($proteins[0]->CategoryMax == 1)
                                    echo 'Choose ' . $proteins[0]->CategoryMax;
                                else
                                    echo 'Choose up to ' . $proteins[0]->CategoryMax;
                                ?>
                            </div>
                        </div>
                        <div class="ingredient-options" id="protein-ingredients">
                            <?php foreach ($proteins as $p): ?>
                                <div class="option">
                                    <image src="<?php echo $p->ImagePath ?>">
                                        <div class="option-name"><?php echo $p->Name ?></div>
                                        <i class="icon icon-plus" onclick="updateOrder('<?= $p->id ?>', this)"></i>
                                        <div class="option-price"><?php echo $p->Price ?>&nbsp;EGP</div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>

        <div class="calculations ftco-animate">
            <div class="title">Your Picks</div>
            <div class="pricing-summary">
                <?php if ($bases): ?>
                    <div class="category-pricing ftco-animate" id="base">
                        <div class="category-name">Base:
                            <span class="chosen-item">
                            <ul></ul>
                        </span>
                        </div>
                        <div class="category-price"><span class="category-total-field">0</span>&nbsp;EGP</div>
                    </div>
                <?php endif; ?>

                <?php if ($toppings): ?>
                    <div class="category-pricing ftco-animate" id="topping">
                        <div class="category-name">Toppings:
                            <span class="chosen-item">
                            <ul></ul>
                        </span>
                        </div>
                        <div class="category-price"><span class="category-total-field">0</span>&nbsp;EGP</div>
                    </div>
                <?php endif; ?>

                <?php if ($dressings): ?>
                    <div class="category-pricing ftco-animate" id="dressing">
                        <div class="category-name">Dressings:
                            <span class="chosen-item">
                            <ul></ul>
                        </span>
                        </div>
                        <div class="category-price"><span class="category-total-field">0</span>&nbsp;EGP</div>
                    </div>
                <?php endif; ?>

                <?php if ($proteins): ?>
                    <div class="category-pricing ftco-animate" id="protein">
                        <div class="category-name">Protein:
                            <span class="chosen-item">
                            <ul></ul>
                        </span>
                        </div>
                        <div class="category-price"><span class="category-total-field">0</span>&nbsp;EGP</div>
                    </div>
                <?php endif; ?>
                <span class="total">Total: <span class="total-field ftco-animate">0</span>&nbsp;EGP</span>
                <div class="error-msg"></div>
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
<script src="public/js/customize_salad.js"></script>

</body>

</html>