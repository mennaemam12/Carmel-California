<?php
@session_start();
// Path: routes/login.php

// Get the current URL
$url = $_SERVER['REQUEST_URI'];

// segments
$segments = explode('/', $url);

if (isset($_SESSION['user'])) {
    redirect("/"); // Redirect to the home page
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    // EXAMPLE: if the url is /login/anythingElse
    // Then dont show the login page
    if (count($segments) > 3) {
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

