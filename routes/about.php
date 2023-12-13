<?php
@session_start();
// Path: routes/about.php
require_once 'models/User.php';
// Get the current URL
$url = $_SERVER['REQUEST_URI'];

// segments
$segments = explode('/', $url);

if (isset($_SESSION['user'])) {
    $user = new User;
    $user->unserialize($_SESSION['user']);
    $userType = $user->getType();

    // Check if the user is allowed to access this page
    if (!$userType->isAllowed('about')) {
        include 'views/404.php';
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    // EXAMPLE: if the url is /about/anythingElse
    // Then dont show the about page
    if (count($segments) > 3) {
        include 'views/404.php';// show the 404 page
        exit();
    }

    include 'views/about.php';
    exit();
}

