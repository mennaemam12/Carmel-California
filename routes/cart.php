<?php
// Path: routes/cart.php

require_once 'helpers/session.helper.php';
require_once "models/User.php";

if (!isset($_SESSION['user'])) {
    redirect($GLOBALS['projectFolder'] . "/login");
    exit();
}

$user = new User;
$user->unserialize($_SESSION['user']);
$userType = $user->getType();

// Check if the user is allowed to access this page
if (!$userType->isAllowed('cart')) {
    include 'views/404.php';
    exit();
}

// Get the current URL
$url = $_SERVER['REQUEST_URI'];

// segments
$segments = explode('/', $url);
$lastSegment=$segments[count($segments)-1];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    // EXAMPLE: if the url is /cart/anythingElse
    // Then dont show the cart page
    if (count($segments) > 3) {
        include 'views/404.php';// show the 404 page
        exit();
    }

    include 'controllers/cart.controller.php';
    CartController::viewCart();
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include Controller
    include 'controllers/cart.controller.php';
    switch($lastSegment){
        case 'increment':
            CartController::updateQuantity(true);
            exit();
        case 'decrement':
            CartController::updateQuantity(false);
            exit();
        case 'remove':
            CartController::removeItem();
            exit();

    }
}

