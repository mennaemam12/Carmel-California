<?php
@session_start();
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

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    // EXAMPLE: if the url is /checkout/anythingElse
    // Then dont show the checkout page
    if (count($segments) > 3) {
        include 'views/404.php';// show the 404 page
        exit();
    }

    include 'views/checkout.php';
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include Controller
}

