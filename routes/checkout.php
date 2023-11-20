<?php
// Path: routes/checkout.php

include 'projectFolderName.php';

// Commenting till we have a proper database
// Check if the user is not logged in
// if (!isset($_SESSION['userType'])) {
//     header('Location: ' .$projectFolder. '/'); // Redirect to the home page    
//     exit();
// }

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

