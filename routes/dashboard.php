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
$thirdlastSegment = strtolower($segments[count($segments) - 3]);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (count($segments) < 4) {
        include 'views/dashboard/dashboard.php';
        exit();
    }

    switch ($thirdlastSegment) {
        case 'edititem':
            include 'views/dashboard/edititem.php';
            exit();
    }

    // Switch based on the last segment
    switch ($lastSegment) {
        case 'additem':
            include 'views/dashboard/additem.php';
            exit();
        case 'viewitems':
            include 'views/dashboard/viewitems.php';
            exit();
        case 'addingredient':
            include 'views/dashboard/addingredient.php';
            exit();
        case 'chartjs':
            include 'views/dashboard/chartjs.php';
            exit();
        case 'ordertracks':
            include 'views/dashboard/ordertracks.php';
            exit();
        case 'drivers':
            include 'views/dashboard/drivers.php';
            exit();
        case 'loginadmin':
            include 'views/dashboard/loginadmin.php';
            exit();
        case 'registeradmin':
            include 'views/dashboard/registeradmin.php';
            exit();
        case 'employee':
            include 'views/dashboard/employee.php';
            exit();
        case 'customer':
            include 'views/dashboard/customer.php';
            exit();
        case 'points':
            include 'views/dashboard/points.php';
            exit();
        case 'reviews':
            include 'views/dashboard/reviews.php';
            exit();
        default:
            // include 'views/dashboard/error-404.php';
            include 'views/404.php';
            exit();
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    switch ($lastSegment) {
        case 'additem':
            include 'controllers/item.controller.php';
            $item = new ItemController;
            $item->add();
            exit();

        case 'addingredient':
            include 'controllers/ingredient.controller.php';
            $ingredient = new IngredientController;
            $ingredient->add();
            exit();
    }

    switch ($thirdlastSegment) {
        case 'edititem';
            include 'controllers/item.controller.php';
            $item = new ItemController;

            $itemID = $lastSegment;
            $itemType = $segments[count($segments) - 2];

            //$itemID = $_POST['itemID'];
            //$itemType = $_POST['itemtype'];
            
            $item->edit($itemType, $itemID);
            exit();
    }
}
