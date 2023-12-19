<?php
@session_start();
// Path: routes/logout.php
require_once 'helpers/session.helper.php';

if (!isset($_SESSION['user'])) {
    redirect("/"); // Redirect to the home page
    exit();
}

// Get the current URL
$url = $_SERVER['REQUEST_URI'];

// segments
$segments = explode('/', $url);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    // EXAMPLE: if the url is /logout/anythingElse
    // Then dont logout and show the 404 page
    if (count($segments) > 3) {
        include 'views/404.php';// show the 404 page
        exit();
    }

    include 'controllers/user.controller.php';
    $user = new UserController;
    $user->logout();
}

