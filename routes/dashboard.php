<?php
// Path: routes/dashboard.php

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
$lastSegment = strtolower($segments[count($segments) - 1]);
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (count($segments) < 4) {
        include 'views/dashboard.php';
        exit();
    }



    // Switch based on the last segment
    switch ($lastSegment) {
        case 'additem':
        case 'viewitems':
        case 'edititem':
            include 'views/dashboard.php';
            exit();
        default:
            include 'views/404.php';
            exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Add item form submitted
    if ($lastSegment === 'additem') {
        include 'controllers/item.controller.php';
        $item = new ItemController;
        $item->add();
    }
}
