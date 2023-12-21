<?php
// Path: routes/login.php


include 'helpers/session.helper.php';

// Get the current URL
$url = $_SERVER['REQUEST_URI'];

// segments
$segments = explode('/', $url);
$lastSegment = trim(strtolower($segments[count($segments) - 1]));

if (isset($_SESSION['user'])) {
    redirect($GLOBALS['projectFolder'] . "/"); // Redirect to the home page
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if ($lastSegment !== 'login') {
        include 'views/404.php';// show the 404 page
        exit();
    }

    include 'views/login.php';
    exit();
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'controllers/user.controller.php';
    $user = new UserController;
    $user->login();
}

