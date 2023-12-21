<?php
// Path: routes/contact.php
require_once 'models/User.php';

$url = $_SERVER['REQUEST_URI'];

// segments
$segments = explode('/', $url);

if (isset($_SESSION['user'])) {
    $user = new User;
    $user->unserialize($_SESSION['user']);
    $userType = $user->getType();

    // Check if the user is allowed to access this page
    if (!$userType->isAllowed('contact')) {
        include 'views/404.php';
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    // EXAMPLE: if the url is /contact/anythingElse
    // Then dont show the contact page
    if (count($segments) > 3) {
        include 'views/404.php';// show the 404 page
        exit();
    }
    include 'views/contact.php';
    exit();
}