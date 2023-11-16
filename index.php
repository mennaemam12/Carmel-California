<?php

// Get the requested URL
$url = isset($_GET['url']) ? $_GET['url'] : '/';

// Split the URL into segments
$segments = explode('/', $url);

// Define your routes
switch ($segments[0]) {
    case '':
    case '/':
        include 'views/index.php';
        break;
    case 'about':
        include 'views/about.php';
        break;
    case 'login':
        include 'routes/login.php';
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

    // default:
    //     include 'not found'
    //     break;
}
