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
<<<<<<< Updated upstream
        default:
            include 'views/404.php';
=======
        case 'chartjs':
            include 'views/dashboard/chartjs.php';
            break;
        //orderTracks
        case 'orderTracks':
            include 'views/dashboard/orderTracks.php';
            break;
        case 'drivers':
            include 'views/dashboard/drivers.php';
            break;
        case 'loginAdmin':
            include 'views/dashboard/loginAdmin.php';
            break;
        case 'registerAdmin':
            include 'views/dashboard/registerAdmin.php';
            break;
        case 'employee':
            include 'views/dashboard/employee.php';
            break;
        case 'customer':
            include 'views/dashboard/customer.php';
            break;
        case 'points':
            include 'views/dashboard/points.php';
            break;
        case 'reviews':
            include 'views/dashboard/reviews.php';
            break;
        
        default:
            include 'views/dashboard/orderTracks.php';
>>>>>>> Stashed changes
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
