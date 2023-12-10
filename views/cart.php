<?php
include_once 'projectFolderName.php';
include_once 'models/Cart.php';
include_once 'models/User.php';

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

	<base href="<?php echo $projectFolder?>/"/>

    <link rel="stylesheet" href="public/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="public/css/animate.css">
    
    <link rel="stylesheet" href="public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="public/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="public/css/magnific-popup.css">

    <link rel="stylesheet" href="public/css/aos.css">
	<link rel="shortcut icon" href="template/images/favicon.png" />
    <link rel="stylesheet" href="public/css/ionicons.min.css">

    <link rel="stylesheet" href="public/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="public/css/jquery.timepicker.css">

    <link rel="stylesheet" href="public/css/nav.css">
	<link rel="stylesheet" href="public/css/footer.css">
	<link rel="stylesheet" href="public/css/cart.css">
	
    <link rel="stylesheet" href="public/css/flaticon.css">
    <link rel="stylesheet" href="public/css/icomoon.css">
	
	

  </head>
  <body>
    <?php
		include 'partials/nav.php';
	?>

    <!-- <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(public/images/bg_7.png);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Cart</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="">Home</a></span> <span>Cart</span></p>
            </div>

          </div>
        </div>
      </div>
    </section> -->
		
		<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
					<div class="col-md-12 ftco-animate">
						<div class="cart-list">
							<table class="table">
								<thead class="thead-primary">
								<tr class="text-center">
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>Product</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
								</tr>
								</thead>
								<tbody>
									<?php
									$i=0;
									$total=0;
									foreach($items as $item){  
									?> 
										<tr class="text-center">
											<td class="product-remove"><a href="#"><span class="icon-close"></span></a></td>
											
											<td class="image-prod"><div class="img" style="background-image:url(public/images/menu-2.jpg);"></div></td>
											
											<td class="product-name">
												<h3 style="margin-bottom:0px;"><?=$item->Name?></h3>
												<!-- <p>Far far away, behind the word mountains, far from the countries</p> -->
											</td>
											
											<td class="price" style="color:#504831;"><?=$item->Price?> EGP</td>
											
											<td class="quantity">
												<div class="input-group mb-3">
													<span class="input-group-btn mr-2">
														<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
														<i class="icon-minus"></i>
														</button>
													</span>
															<input type="text" id="quantity" name="quantity" class="form-control input-number" value="<?=$cartItems[$i]->getQuantity()?>" min="1"
																max="100">
													<span class="input-group-btn ml-2">
														<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
														<i class="icon-plus"></i>
														</button>
													</span>
												</div>
											</td>
											
											<td class="total" style="color:#504831;"><?php echo $item->Price*$cartItems[$i]->getQuantity()?> EGP</td>
										</tr><!-- END TR-->
									<?php
										$total=$total+$item->Price*$cartItems[$i]->getQuantity();
										$i++;
										} 
									?>
									

								</tbody>
							</table>
						</div>
					</div>
				</div>
    		<div class="row justify-content-end">
    			<div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span><?=$total?></span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>$0.00</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>$3.00</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>$17.60</span>
    					</p>
    				</div>
    				<p class="text-center"><a href="checkout" class="btn btn-primary py-3 px-4" style="background-color:#006a4d;">Proceed to Checkout</a></p>
    			</div>
    		</div>
		</div>
	</section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Discover</span>
            <h2 class="mb-4">Related products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
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
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> -->
  <!-- <script src="public/js/google-map.js"></script> -->
  <script src="public/js/main.js"></script>
  <script src="public/js/nav.js"></script>
    
	<script>
		// $(document).ready(function () {

		// 	var quantitiy = 0;
		// 	$('.quantity-right-plus').click(function (e) {

		// 		// Stop acting like a button
		// 		e.preventDefault();
		// 		// Get the field name
		// 		var quantity = parseInt($('#quantity').val());

		// 		// If is not undefined

		// 		$('#quantity').val(quantity + 1);


		// 		// Increment

		// 	});

		// 	$('.quantity-left-minus').click(function (e) {
		// 		// Stop acting like a button
		// 		e.preventDefault();
		// 		// Get the field name
		// 		var quantity = parseInt($('#quantity').val());

		// 		// If is not undefined

		// 		// Increment
		// 		if (quantity > 0) {
		// 			$('#quantity').val(quantity - 1);
		// 		}
		// 	});

		// });
	</script>
  </body>
</html>