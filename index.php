<?php
// Path: index.php

// Get the current URL
$url = $_SERVER['REQUEST_URI'];

// segments
$segments = explode('/', $url);

$page = $segments[1];

if (strpos($page, '?') !== false)
    $page = strstr($segments[1], '?', true);

// Define routes
$page = strtolower($page);
$page = trim($page);

switch ($page) {
    case '':
    case '/':
    case 'index':
    case 'home':
        include 'routes/index.php';
        break;
    case 'about':
        include 'routes/about.php';
        break;
    case 'login':
        include 'routes/login.php';
        break;
    case 'logout':
        include 'routes/logout.php';
        break;
    case 'signup':
        include 'routes/signup.php';
        break;
    case 'cart':
        include 'routes/cart.php';
        break;
    case 'checkout':
        include 'routes/checkout.php';
        break;
    case 'services':
        include 'routes/services.php';
        break;
    case 'menu':
        include 'routes/menu.php';
        break;
    case 'contact':
        include 'routes/contact.php';
        break;
    case 'product':
        include 'routes/product.php';
        break;
    case 'dashboard':
        include 'routes/dashboard.php';
        break;
    case 'salad-order':
        include 'routes/custom.salad.php';
        break;
   

    default:
        include 'views/404.php';
        break;
}
