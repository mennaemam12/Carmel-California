<?php
include 'projectFolderName.php';
?>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light" id="ftco-navbar"
		style="background: rgb(221, 209, 195,0.8);z-index:100;">
		<div class="container">
			<a class="navbar-brand" style="color:#504831"href="<?php echo $projectFolder;?>/">Carmel<small>California</small></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu" style="color:#504831"></span> Menu
			</button>
			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a href="<?php echo $projectFolder;?>/" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="<?php echo $projectFolder;?>/menu" class="nav-link">Menu</a></li>
					<li class="nav-item"><a href="<?php echo $projectFolder;?>/services" class="nav-link">Services</a></li>
					<li class="nav-item"><a href="<?php echo $projectFolder;?>/about" class="nav-link">About</a></li>
					<li class="nav-item"><a href="<?php echo $projectFolder;?>/contact" class="nav-link">Contact</a></li>
                    <?php
                    session_start();
                    if(!empty($_SESSION['UserID'])){
                       echo " <li class='nav-item'><a class='nav-link' href='../views/signout.php'>Logout</a></li>";
                    }
                    else {
                        echo "<li class='nav-item'><a class='nav-link' href='$projectFolder/login'>Sign In</a></li>";
                    }
                    ?>
                
					<li class="nav-item cart"><a href="<?php echo $projectFolder;?>/cart" class="nav-link"><span
								class="icon icon-shopping_cart"></span><span
								class="bag d-flex justify-content-center align-items-center"><small>1</small></span></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>