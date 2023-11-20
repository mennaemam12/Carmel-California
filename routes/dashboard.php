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
        include 'views/dashboard/dashboard.php';
        exit();
    }



    // Switch based on the last segment
    switch ($lastSegment) {
        case 'additem':
            include 'views/dashboard/additem.php';
            break;
        case 'viewitems':
            include 'views/dashboard/viewitems.php';
            break;
        case 'edititem':
            include 'views/dashboard/edititem.php';
            exit();
        case 'addingredient':
            include 'views/dashboard/addingredient.php';
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
    else if ($lastSegment === 'addingredient') {
        include 'controllers/ingredient.controller.php';
        $ingredient = new IngredientController;
        $ingredient->add();
    }
}
