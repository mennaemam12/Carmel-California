<?php
include 'projectFolderName.php';
include_once 'models/User.php';
include_once 'models/Cart.php';
include_once 'controllers/nav.controller.php';
@session_start();
$user = new User;
$cItems = array();
$quantity = 0;
if (isset($_SESSION['user'])) {
	$user->unserialize($_SESSION['user']);
	foreach ($user->getCart() as $cartItem) {
		$cart = new Cart;
		$cart->unserialize($cartItem);
		$cItems[] = $cart;
	}
}


?>


<?php
    function getNav() {
        // Create a new PDO instance (replace with your actual connection)
        $db = new PDO('mysql:host=localhost;dbname=Carmel-California', 'root', '');
    
        // Write the query
        $query = "SELECT * FROM navbar WHERE name NOT IN ('Dashboard', 'Logout', 'Sign in')";
    
        // Prepare and execute the query
        $stmt = $db->prepare($query);
        $stmt->execute();
    
        // Fetch all results
        $navItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $navItems;
    }
    
    //get Logout
    function getLogout() {
        // Create a new PDO instance (replace with your actual connection)
        $db = new PDO('mysql:host=localhost;dbname=Carmel-California', 'root', '');
    
        // Write the query
        $query = "SELECT * FROM navbar WHERE name = 'Logout'";
    
        // Prepare and execute the query
        $stmt = $db->prepare($query);
        $stmt->execute();
    
        // Fetch all results
        $navItems = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $navItems;
    }
    
    //get Sign in 
    function getSignin() {
        // Create a new PDO instance (replace with your actual connection)
        $db = new PDO('mysql:host=localhost;dbname=Carmel-California', 'root', '');
    
        // Write the query
        $query = "SELECT * FROM navbar WHERE name = 'Sign in'";
    
        // Prepare and execute the query
        $stmt = $db->prepare($query);
        $stmt->execute();
    
        // Fetch all results
        $navItems = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $navItems;
    }
    
    //get Dashboard
    function getDashboard() {
        // Create a new PDO instance (replace with your actual connection)
        $db = new PDO('mysql:host=localhost;dbname=Carmel-California', 'root', '');
    
        // Write the query
        $query = "SELECT * FROM navbar WHERE name = 'Dashboard'";
    
        // Prepare and execute the query
        $stmt = $db->prepare($query);
        $stmt->execute();
    
        // Fetch all results
        $navItems = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $navItems;
    }
    



?>
<head>
	<style>
button {
 padding: 15px 25px;
 border: unset;
 border-radius: 15px;
 color: #212121;
 z-index: 1;
 background: #e8e8e8;
 position: relative;
 font-weight: 1000;
 font-size: 17px;
 -webkit-box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
 box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
 transition: all 250ms;
 overflow: hidden;
}

button::before {
 content: "";
 position: absolute;
 top: 0;
 left: 0;
 height: 100%;
 width: 0;
 border-radius: 15px;
 background-color: #212121;
 z-index: -1;
 -webkit-box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
 box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
 transition: all 250ms
}

button:hover {
 color: #e8e8e8;
}

button:hover::before {
 width: 100%;
}
	</style>
</head>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light" id="ftco-navbar"
	style="background: rgb(221, 209, 195,0.8);z-index:100;">
	<div class="container">
		<a class="navbar-brand" style="color:#504831" href="index">Carmel<small>California</small></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
			aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu" style="color:#504831"></span> Menu
		</button>
		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<!-- loop through nav items -->
				<?php foreach (getNav() as $navItems): ?>
				<li class="nav-item" id="<?= $navItems['path'] ?>"><a href="<?= $navItems['path'] ?>"
						class="nav-link"><?= $navItems['name'] ?></a></li>
				<?php endforeach; ?>
				<!-- check if logged in -->
				
				<?php if (isset($_SESSION['user'])): 
					$logout = getLogout()?>
					<li class='nav-item' id="<?=$logout['path'] ?>"><a class='nav-link' href='<?=$logout['path'] ?>'>
					<?=$logout['name'] ?></a></li>
				<?php else: 
					$signin = getSignin()?>
					<li class='nav-item' id="<?=$signin['path'] ?>"><a class='nav-link' href='<?=$signin['path'] ?>'>
					<?=$signin['name'] ?></a></li>
				<?php endif; ?>
				<?php if (isset($_SESSION['user']) && $user->getType()->isAllowed('dashboard')): 
					$admin = getDashboard();?>
					<li class='nav-item' id="<?=$admin['path'] ?>"><a class='nav-link' href='<?=$admin['path'] 
					?>'><?=$admin['name'] ?></a></li>
				<?php else: ?>
				<?php endif; ?>
				<li class="nav-item cart" id="cart"><a href="cart" class="nav-link">
						<span class="icon icon-shopping_cart"></span>
						<?php if (isset($_SESSION['user'])) {
							foreach ($cItems as $citem) {
								$quantity += $citem->getQuantity();
							} ?>
							<span class="bag d-flex justify-content-center align-items-center"><small id="Items_count">
									<?= $quantity ?>
								</small></span>
						</a>
					<?php } else { ?>
						<span class="bag d-flex justify-content-center align-items-center"><small
								id="Items_count">0</small></span></a>
					<?php } ?>
				</li>

				<!-- <a id="myButton" style="margin-right: -99px;" class="btn btn-secondary btn-outline-white p-5 px-xl-4 py-xl-3">Add Page</a> -->
			</ul>
		</div>
	</div>

</nav>