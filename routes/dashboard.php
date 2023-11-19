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

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (count($segments) < 4) {
        include 'views/dashboard.php';
        exit();
    }
    else if($segments[3] === 'addItem'){
        include 'views/addItem.php';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Add item form submitted
    if ($segments[3] === 'addItem') {
        include 'controllers/item.controller.php';
        $item = new ItemController;
        $item->add();
    }
}
