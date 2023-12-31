<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
    <link rel="shortcut icon" href="template/images/favicon.png"/>


    <link rel="stylesheet" href="public/css/flaticon.css">
    <link rel="stylesheet" href="public/css/icomoon.css">

    <link rel="stylesheet" href="public/css/client_side/nav.css">
    <link rel="stylesheet" href="public/css/client_side/footer.css">
    <link rel="stylesheet" href="../public/css/old_customize_salad.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="public/js/viewprice-AJAX.js"></script>
    <script src="public/js/customize_salad.js"></script>

</head>

<body>

<section class="h-100 h-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0 text-black">Customize Your Salad</h1>
                                    </div>

                                    <?php if ($bases): ?>
                                        <!--BASES SECTION-->
                                        <div>
                                            <label for="touch" style="width: 600px; cursor: pointer"
                                            ><h2 class="fw-bold mb-0 text-black">Base</h2>
                                                <h4 class="fw-bold mb-0 text-muted">
                                                    Choose <?php echo $bases[0]->CategoryMax ?> </h4></label>
                                            <input type="checkbox" id="touch" width="600px"/>
                                            <ul class="slide">
                                                <?php foreach ($bases as $b): ?>
                                                    <hr class="my-4"/>
                                                    <li>
                                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                                <img loading='lazy'src="public/images/salad-ingredients/<?php echo $b->Name ?>.jpg" class="img-fluid rounded-3" alt="<?php echo $b->Name ?>" height="51px"/>
                                                            </div>
                                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                                <h6 class="text-muted">Base</h6>
                                                                <h6 class="text-black mb-0"><?php echo $b->Name ?></h6>
                                                            </div>
                                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                                <!-- NO QUANTITY -->
                                                                <button id="add<?php echo $b->Name;
                                                                echo $GLOBALS['counter']++; ?>" type='submit'
                                                                        class="btn btn-link px-2"
                                                                        onclick="addToOrder('<?php echo $b->Name ?>', 'base', <?php echo $b->CategoryMax ?>,'<?php echo $b->Price ?>')">
                                                                    <i class="fas fa-plus"></i>
                                                                </button>
                                                            </div>
                                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                                <h6 class="mb-0">LE <?php echo $b->Price ?>.00</h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php $counter = 1; endforeach; ?>
                                            </ul>

                                            <hr class="my-4"/>
                                        </div>
                                    <?php endif; ?>



                                    <?php if ($toppings): ?>
                                        <!---TOPPINGS SECTION-->
                                        <div>
                                            <label for="touch2" style="width: 600px; cursor: pointer"
                                            ><h2 class="fw-bold mb-0 text-black">Toppings</h2>
                                                <h4 class="fw-bold mb-0 text-muted">Choose Up
                                                    To <?php echo $toppings[0]->CategoryMax ?> </h4>
                                            </label>
                                            <div id='toppingserror' class="error"></div>
                                            <input type="checkbox" id="touch2" width="600px"/>
                                            <ul class="slide2">
                                                <hr class="my-4"/>
                                                <?php foreach ($toppings as $top): ?>
                                                    <li>
                                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                                <img loading='lazy'src="public/images/salad-ingredients/<?php echo $top->Name ?>.jpg" class="img-fluid rounded-3" alt="<?php echo $top->Name ?>"/>
                                                            </div>
                                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                                <h6 class="text-muted">Vegetable</h6>
                                                                <h6 class="text-black mb-0"><?php echo $top->Name ?></h6>
                                                            </div>
                                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                                <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown();restriction(this.parentNode.querySelector('input[type=number]'),'topping', '<?php echo $top->CategoryMax ?>');removeFromOrder('<?php echo $top->Name ?>', 'topping', <?php echo $top->CategoryMax ?>, '<?php echo $top->Price ?>');">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>

                                                                <input id="topping<?php echo $counter++; ?>" min="0" name="<?php echo $top->Name ?>" value="0" type="number" max="1" class="form-control form-control-sm"/>

                                                                <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp();restriction(this.parentNode.querySelector('input[type=number]'),'topping', '<?php echo $top->CategoryMax ?>');addToOrder('<?php echo $top->Name ?>', 'topping', <?php echo $top->CategoryMax ?>, '<?php echo $top->Price ?>')">
                                                                    <i class="fas fa-plus"></i>
                                                                </button>
                                                                <p id='toppingmax'
                                                                   style='color:red; text-align:left; font-size:small'></p>
                                                            </div>


                                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                                <h6 class="mb-0">LE <?php echo $top->Price ?>.00/1</h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php endforeach;
                                                $counter = 1; ?>
                                            </ul>
                                            <hr class="my-4"/>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($dressings): ?>
                                        <!--DRESSINGS SECTION-->
                                        <div>
                                            <label for="touch5" style="width: 600px; cursor: pointer"><h2 class="fw-bold mb-0 text-black">Dressing</h2>
                                                <h4 class="fw-bold mb-0 text-muted">
                                                    Choose <?php echo $dressings[0]->CategoryMax ?> </h4>
                                            </label>
                                            <input type="checkbox" id="touch5" width="600px"/>

                                            <ul class="slide5">
                                                <?php foreach ($dressings as $d): ?>
                                                    <hr class="my-4"/>
                                                    <li>
                                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                                <img loading='lazy'src="public/images/salad-ingredients/<?php echo $d->Name ?>.jpg" class="img-fluid rounded-3" alt="<?php echo $d->Name ?>" height="51px"/>
                                                            </div>
                                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                                <h6 class="text-muted">Dressing</h6>
                                                                <h6 class="text-black mb-0"><?php echo $d->Name ?></h6>
                                                            </div>
                                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                                <!-- NO QUANTITY -->
                                                                <button id="add<?php echo $d->Name;
                                                                echo $GLOBALS['counter']++; ?>" type='submit'
                                                                        class="btn btn-link px-2"
                                                                        onclick="addToOrder('<?php echo $d->Name ?>', 'dressing', <?php echo $d->CategoryMax ?>,'<?php echo $d->Price ?>')">
                                                                    <i class="fas fa-plus"></i>
                                                                </button>
                                                            </div>
                                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                                <h6 class="mb-0">LE <?php echo $d->Price ?>.00</h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php $counter = 1; endforeach; ?>
                                            </ul>

                                            <hr class="my-4"/>
                                        </div>
                                    <?php endif; ?>

                                    <!--PROTEINS SECTION-->
                                    <?php if ($proteins): ?>
                                        <div>
                                            <label for="touch4" style="width: 600px; cursor: pointer"
                                            ><h2 class="fw-bold mb-0 text-black">Protein</h2>
                                                <h4 class="fw-bold mb-0 text-muted">
                                                    Choose <?php echo $proteins[0]->CategoryMax ?> </h4>
                                                <div id='proteinserror' class="error"></div>
                                            </label
                                            >
                                            <input type="checkbox" id="touch4" width="600px"/>
                                            <ul class="slide4">
                                                <hr class="my-4"/>
                                                <?php foreach ($proteins as $prot): ?>
                                                    <li>
                                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                                <img loading='lazy'src="public/images/salad-ingredients/<?php echo $prot->Name ?>.jpg" class="img-fluid rounded-3" alt="<?php echo $prot->Name ?>"/>
                                                            </div>
                                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                                <h6 class="text-muted">Protein</h6>
                                                                <h6 class="text-black mb-0"><?php echo $prot->Name ?></h6>
                                                            </div>
                                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                                <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown();restriction(this.parentNode.querySelector('input[type=number]'),'protein', <?php echo $proteins[0]->CategoryMax ?>);removeFromOrder('<?php echo $prot->Name ?>', 'protein', <?php echo $prot->CategoryMax ?>, <?php echo $prot->Price ?>);">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>
                                                                <input id="protein<?php echo $counter++; ?>" min="0" name="<?php echo $prot->Name ?>" value="0" type="number" max="1" class="form-control form-control-sm"/>

                                                                <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp();restriction(this.parentNode.querySelector('input[type=number]'),'protein', <?php echo $proteins[0]->CategoryMax ?>)addToOrder('<?php echo $prot->Name ?>', 'protein', <?php echo $prot->CategoryMax ?>, <?php echo $prot->Price ?>)">
                                                                    <i class="fas fa-plus"></i>
                                                                </button>
                                                            </div>
                                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                                <h6 class="mb-0">LE <?php echo $prot->Price ?>.00/1</h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php endforeach;
                                                $counter = 1; ?>
                                            </ul>
                                            <hr class="my-4"/>
                                        </div>
                                    <?php endif; ?>


                                    <div class="pt-5">
                                        <h6 class="mb-0">
                                            <a href="index" class="text-body"
                                            ><i class="fas fa-long-arrow-alt-left me-2"></i>Back
                                                to home</a
                                            >
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 bg-grey">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Your Salad Picks</h3>
                                    <hr class="my-4"/>

                                    <div class="d-flex justify-content-between mb-4">
                                        <h6 class="text-uppercase">Base:</h6>
                                        <p id='basechoices'></p>
                                    </div>

                                    <div class="d-flex justify-content-between mb-4">
                                        <h6 class="text-uppercase">Toppings:</h6>
                                        <p id='toppingchoices'></p>
                                    </div>

                                    <div class="d-flex justify-content-between mb-4">
                                        <h6 class="text-uppercase">Protein:</h6>
                                        <p id='proteinchoices'></p>
                                    </div>

                                    <div class="d-flex justify-content-between mb-4">
                                        <h6 class="text-uppercase">Dressing:</h6>
                                            <p id='dressingchoices'></p>
                                    </div>

                                    <div class="d-flex justify-content-between mb-4">
                                        <p style='color:red' id='baseerror'></p>
                                    </div>

                                    <hr class="my-4"/>

                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Total price:</h5>
                                        <h5>LE</h5>
                                        <h5 id='total'>0.00</h5>
                                    </div>

                                    <button type="button" class="btn btn-dark btn-block btn-lg" style='background-color:#006a4d; border:none; border-radius:0;'>
                                        Add To Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>


</html>
