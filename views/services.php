<?php
  include 'projectFolderName.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Coffee - Free Bootstrap 4 Template by Colorlib</title>
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

    <link rel="stylesheet" href="public/css/ionicons.min.css">

    <link rel="stylesheet" href="public/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="public/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="public/css/flaticon.css">
    <link rel="stylesheet" href="public/css/icomoon.css">
    <link rel="stylesheet" href="public/css/style.css">
  </head>
  <body>
    <?php
      include 'partials/nav.php';
    ?>

    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url(public/images/bg_7.png);" data-stellar-background-ratio="0.5">
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
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
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
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="media d-block text-center block-6 services">
              <div class="icon d-flex justify-content-center align-items-center mb-5">
              	<span class="flaticon-coffee-bean"></span></div>
              <div class="media-body">
                <h3 class="heading">Quality Coffee</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>    
          </div>
        </div>
    	</div>
    </section>

    <?php
      include 'partials/footer.php';
    ?>

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
    
  </body>
</html>