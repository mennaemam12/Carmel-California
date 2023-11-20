<?php
// Path: routes/logout.php

include 'projectFolderName.php';

// Commenting till we have a proper database
// Check if the user is already logged in
// if (isset($_SESSION['userType'])) {
//     header('Location: ' .$projectFolder. '/'); // Redirect to the home page
//     exit();
// }

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

