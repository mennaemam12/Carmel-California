<?php
include 'projectFolderName.php';
include_once 'models/User.php';
@session_start();
$user= new User;
if(isset($_SESSION['user']))
	$user->unserialize($_SESSION['user']);
?>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light" id="ftco-navbar"
		style="background: rgb(221, 209, 195,0.8);z-index:100;">
		<div class="container">
			<a class="navbar-brand" style="color:#504831"href="index">Carmel<small>California</small></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu" style="color:#504831"></span> Menu
			</button>
			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item" id="home"><a href="index" class="nav-link">Home</a></li>
					<li class="nav-item" id="menu"><a href="menu" class="nav-link">Menu</a></li>
					<li class="nav-item" id="services"><a href="services" class="nav-link">Services</a></li>
					<li class="nav-item" id="about"><a href="about" class="nav-link">About</a></li>
					<li class="nav-item" id="contact"><a href="contact" class="nav-link">Contact</a></li>
                    
                    <!-- check if logged in -->
                    <?php if(isset($_SESSION['user'])): ?>
                       <li class='nav-item' id="logout"><a class='nav-link' href='logout'>Logout</a></li>
                    <?php else: ?>
                        <li class='nav-item' id="login"><a class='nav-link' href='login'>Sign In</a></li>
					<?php endif; ?>
					<?php if(isset($_SESSION['user']) && $user->getType()->isAllowed('dashboard')): ?>
						<li class='nav-item' id="dashboard"><a class='nav-link'  href='dashboard'>Dashboard</a></li>
					<?php else: ?>
					<?php endif; ?>		
					<li class="nav-item cart" id="cart"><a href="cart"  class="nav-link"><span
								class="icon icon-shopping_cart"></span><span "
								class="bag d-flex justify-content-center align-items-center" ><small id="Items_count">0</small></span></a>
					</li>
				</ul>
			</div>
		</div>
		
</nav>