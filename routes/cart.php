<?php
// Path: routes/cart.php
include 'projectFolderName.php';

// Check if the user is not logged in
// Commenting till we have a proper database
// if (!isset($_SESSION['userType'])) {
//     header('Location: ' .$projectFolder. '/'); // Redirect to the home page
//     exit();
// }

// Get the current URL
$url = $_SERVER['REQUEST_URI'];

// segments
$segments = explode('/', $url);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    // EXAMPLE: if the url is /cart/anythingElse
    // Then dont show the cart page
    if (count($segments) > 3) {
        include 'views/404.php';// show the 404 page
        exit();
    }

    include 'views/cart.php';
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include Controller
}

