<?php

require_once 'models/Item.php';
$rows = Item::getAllItems();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'views/partials/head.php';?>

	<link rel="stylesheet" href="public/css/owl.carousel.min.css">

	<link rel="stylesheet" href="public/css/client_side/index.css">
    <link rel="stylesheet" href="public/css/client_side/about.css">
</head>

<body>
	<?php
	require_once 'controllers/nav.controller.php';
    NavController::viewNav();
	?>

	<section class="home-slider owl-carousel">
		<div class="slider-item" style="background-image: url(public/images/bg_1.webp);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

					<div style=" z-index: 0; padding:30px; border-radius: 10px;	text-align: center;">
						<div style="z-index:0;">
							<span class="subheading ftco-animate">Welcome</span>
							<h1 class="mb-4 ftco-animate">Discover Carmel, <br>California's flavours now in Cairo</h1>
							<p class="mb-4 mb-md-5 ftco-animate"></p>
							<p class="ftco-animate"><a href="contact" class="btn btn-secondary btn-outline-white p-3 px-xl-4 py-xl-3">Contact Us</a> <a href="menu" class="btn btn-secondary btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
						</div>
					</div>


				</div>
			</div>
		</div>

		<div class="slider-item" style="background-image: url(public/images/bg_6.webp);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

					<div style="z-index: 0; padding:30px; border-radius: 10px;	text-align: center;">
						<div style="z-index:0;">
							<span class="subheading">Welcome</span>
							<h1 class="mb-4">Discover Carmel, <br>California's flavours now in Cairo</h1>
							<p class="mb-4 mb-md-5"></p>
                            <p><a href="contact" class="btn btn-secondary btn-outline-white p-3 px-xl-4 py-xl-3">Contact Us</a> <a href="menu" class="btn btn-secondary btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="slider-item" style="background-image: url(public/images/bg_3.webp);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

					<div style="z-index: 0; padding:30px; border-radius: 10px;	text-align: center;">
						<div style="z-index:0;">
							<span class="subheading">Welcome</span>
							<h1 class="mb-4">Discover Carmel, <br>California's flavours now in Cairo</h1>
							<p class="mb-4 mb-md-5"></p>
                            <p><a href="contact" class="btn btn-secondary btn-outline-white p-3 px-xl-4 py-xl-3">Contact Us</a> <a href="menu" class="btn btn-secondary btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

	<!--OUR STORY-->
    <section class="ftco-about d-md-flex mt-5">
        <div class="one-half img" style="background-image: url(public/images/bgstory_3.webp); background-size: 88%;"></div>
        <div class="one-half one-half-about ftco-animate">
            <div class="heading-section ftco-animate ">
                <span class="subheading">Discover</span>
                <h2 class="mb-4">Our Story</h2>
            </div>
            <div>
                <p>Born in 2021, Carmel is inspired by a small beach city in the "Golden State California, famous
                    for its white sand, small cottages, and a breathtaking picturesque scenic road".</p>
                <p>Being an artisanal boutique, we start off with a carefully crafted mood, to match a wide offering of
                    artisanal
                    pastries, bakery, cakes, in addition to a selective all day menu.</p>
                <p>Join us into the Golden State of mind, where all good things collide.</p>
            </div>
        </div>
    </section>

<!--	<section class="ftco-section ftco-services">-->
<!--		<div class="container">-->
<!--			<div class="row">-->
<!--				<div class="col-md-4 ftco-animate">-->
<!--					<div class="media d-block text-center block-6 services">-->
<!--						<div class="icon d-flex justify-content-center align-items-center mb-5">-->
<!--							<span class="flaticon-choices"></span>-->
<!--						</div>-->
<!--						<div class="media-body">-->
<!--							<h3 class="heading">Easy to Order</h3>-->
<!--							<p>Even the all-powerful Pointing has no control about the blind texts it is an almost-->
<!--								unorthographic.</p>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="col-md-4 ftco-animate">-->
<!--					<div class="media d-block text-center block-6 services">-->
<!--						<div class="icon d-flex justify-content-center align-items-center mb-5">-->
<!--							<span class="flaticon-delivery-truck"></span>-->
<!--						</div>-->
<!--						<div class="media-body">-->
<!--							<h3 class="heading">Fastest Delivery</h3>-->
<!--							<p>Even the all-powerful Pointing has no control about the blind texts it is an almost-->
<!--								unorthographic.</p>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="col-md-4 ftco-animate">-->
<!--					<div class="media d-block text-center block-6 services">-->
<!--						<div class="icon d-flex justify-content-center align-items-center mb-5">-->
<!--							<span class="flaticon-coffee-bean"></span>-->
<!--						</div>-->
<!--						<div class="media-body">-->
<!--							<h3 class="heading">Quality Coffee</h3>-->
<!--							<p>Even the all-powerful Pointing has no control about the blind texts it is an almost-->
<!--								unorthographic.</p>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</section>-->

    <section class="ftco-section ftco-section-menu-entries">
        <div class="container">
            <div class="menu-entries-container row">
                <div class="col-md-6 pr-md-5">
                    <div class="heading-section text-md-right ftco-animate">
                        <span class="subheading">Quality guaranteed</span>
                        <h2 class="mb-4">Our Menu</h2>
                        <p class="mb-4">All our items are handmade, working with speciality farmers and gourmet
                            suppliers to ensure that our raw materials are up to our premium standard.
                            Carmel's team cares about your experience, and offers a 100% guarantee policy</p>
                        <p><a href="menu" class="btn btn-primary btn-outline-primary px-4 py-3">View Full Menu</a></p>
                    </div>
                </div>
                <div class="menu-entries">
                    <?php
                    for ($i = 0; $i < 4; $i++) {
                        echo "<div>";
                        echo "<div class='menu-entry'>";
                        echo "<a href='product?type=" . $rows[$i]->itemType . "&id=" . $rows[$i]->id . "'>";
                        echo "<img loading='lazy' src='" . $rows[$i]->ImagePath . "' alt='".$rows[$i]->Name."' loading='lazy' width='200' height='150'>";
                        echo "</a>";
                        echo "</div>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-testimony img" id="ftco-testimony"
             data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section heading-testimony ftco-animate">
                    <span class="subheading">Testimony</span>
                    <h2>Customers Say</h2>
                    <!--                <p style="color: #fff;">Far far away, behind the word mountains, far from the countries Vokalia and-->
                    <!--                    Consonantia, there live the blind texts.</p>-->
                </div>
            </div>
        </div>
        <div class="container-wrap">
            <div class="testimonies">
                <div class="testimony">
                    <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
                        unorthographic life One day however a small.&rdquo;</p>
                    <div class="author">
                        <img loading='lazy'src="public/images/person_2.webp" alt="">
                        <div class="name ">Louise Kelly
                            <span class="position">Illustrator Designer</span>
                        </div>
                    </div>
                </div>
                <div class="testimony overlay">
                    <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
                        unorthographic life One day however a small line of blind text by the name of Lorem Ipsum
                        decided to leave for the far World of Grammar.&rdquo;</p>
                    <div class="author">
                        <img loading='lazy'src="public/images/person_2.webp" alt="">
                        <div class="name">Louise Kelly
                            <span class="position">Illustrator Designer</span>
                        </div>
                    </div>
                </div>
                <div class="testimony">
                    <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
                        unorthographic life One day however a small line of blind text by the name. &rdquo;</p>
                    <div class="author">
                        <img loading='lazy'src="public/images/person_3.webp" alt="">
                        <div class="name">Louise Kelly
                            <span class="position">Illustrator Designer</span>
                        </div>
                    </div>
                </div>
                <div class="testimony overlay">
                    <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
                        unorthographic life One day however.&rdquo;</p>
                    <div class="author">
                        <img loading='lazy'src="public/images/person_2.webp" alt="">
                        <div class="name align-self-center">Louise Kelly
                            <span class="position">Illustrator Designer</span>
                        </div>
                    </div>
                </div>
            </div>
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
	<script src="public/js/popper.min.js"></script>
	<script src="public/js/jquery.easing.1.3.js"></script>
	<script src="public/js/jquery.waypoints.min.js"></script>
	<script src="public/js/jquery.stellar.min.js"></script>
	<script src="public/js/owl.carousel.min.js"></script>
	<script src="public/js/jquery.magnific-popup.min.js"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script src="public/js/jquery.animateNumber.min.js"></script>
	<script src="public/js/scrollax.min.js"></script>
	<script src="public/js/main.js"></script>
	<script src="public/js/nav.js"></script>
</body>

</html>