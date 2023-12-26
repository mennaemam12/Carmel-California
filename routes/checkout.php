<?php
// Path: routes/checkout.php


require_once 'helpers/session.helper.php';
require_once "models/User.php";

if (!isset($_SESSION['user'])) {
    redirect("/login");
    exit();
}

$user = new User;
$user->unserialize($_SESSION['user']);
$userType = $user->getType();

// Check if the user is allowed to access this page
if (!$userType->isAllowed('checkout')) {
    include 'views/404.php';
    exit();
}

// Get the current URL
$url = $_SERVER['REQUEST_URI'];

// segments
$segments = explode('/', $url);
$lastSegment = $segments[count($segments) - 1];

include 'controllers/checkout.controller.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    // EXAMPLE: if the url is /checkout/anythingElse
    // Then dont show the checkout page
    if (count($segments) > 2) {
        include 'views/404.php';// show the 404 page
        exit();
    }

    CheckoutController::viewCheckout();

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($lastSegment) {
        case 'discount':
            CheckoutController::checkDiscount();
            exit();
        case 'placeorder':
            CheckoutController::validateCheckout();
            exit();
        default:
            include 'views/404.php'; // show the 404 page
            exit();
    }
}

