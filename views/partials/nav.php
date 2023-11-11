<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar"
		style="background-color: rgb(193, 171, 143);">
		<div class="container">
			<a class="navbar-brand" href="../index.php">Carmel<small>California</small></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu" style="color:#504831"></span> Menu
			</button>
			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a href="../index.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="../views/menu.php" class="nav-link">Menu</a></li>
					<li class="nav-item"><a href="../views/services.php" class="nav-link">Services</a></li>
					<li class="nav-item"><a href="../views/about.php" class="nav-link">About</a></li>
					<li class="nav-item"><a href="../views/contact.php" class="nav-link">Contact</a></li>
                    <?php
                    session_start();
                    if(!empty($_SESSION['UserID'])){
                       echo " <li class='nav-item'><a class='nav-link' href='../views/signout.php'>Logout</a></li>";
                    }
                    else {
                        echo "<li class='nav-item'><a class='nav-link' href='../views/login.php'>Sign In</a></li>";
                    }
                    ?>
                
					<li class="nav-item cart"><a href="../views/cart.php" class="nav-link"><span
								class="icon icon-shopping_cart"></span><span
								class="bag d-flex justify-content-center align-items-center"><small>1</small></span></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>