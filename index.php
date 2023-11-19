<?php
// Path: index.php

include 'projectFolderName.php';

// Get the current URL
$url = $_SERVER['REQUEST_URI'];

// segments
$segments = explode('/', $url);
// We use segments[2] to determine which route to load
// segments[0] is empty because the URL starts with a slash
// segments[1] is the project folder name 'Carmel-California'
// segments[2] is the route name example: menu, about, contact, etc.

// Define routes
switch ($segments[2]) {
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
    case 'addItem':
        include 'routes/addItem.php';
    case 'dashboard':
        include 'routes/dashboard.php';
        break;
    default:
        include 'views/404.php';
        break;
}
