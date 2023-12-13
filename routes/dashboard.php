<?php
@session_start();
// Path: routes/dashboard.php

include 'projectFolderName.php';
require_once 'helpers/session.helper.php';
require_once "controllers/user_type.controller.php";
require_once "models/User.php";

// Check if the user is already logged in
if (!isset($_SESSION['user'])) {
    include 'views/404.php';
    exit();
}

$user = new User;
$user->unserialize($_SESSION['user']);
$userType = $user->getType();

// Check if the user is allowed to access this page
if (!$userType->isAllowed('dashboard')) {
    include 'views/404.php';
    exit();
}

// Get the current URL
$url = $_SERVER['REQUEST_URI'];

// segments
$segments = explode('/', $url);
$lastSegment = trim(strtolower($segments[count($segments) - 1]));
if (strpos($lastSegment, '?') !== false)
    $lastSegment = strstr($lastSegment, '?', true);

$thirdlastSegment = trim(strtolower($segments[count($segments) - 3]));

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (count($segments) < 4) {
        include 'views/dashboard/dashboard.php';
        exit();
    }

    switch ($thirdlastSegment) {
        case 'editdiscount':
            include 'controllers/discount.controller.php';

            $itemID = $lastSegment;
            $itemType = $segments[count($segments) - 2];

            include 'views/dashboard/editdiscount.php';
            exit();
    }

    // Switch based on the last segment
    switch ($lastSegment) {
        case 'menu':
            include_once 'routes/dashboard/dashboard.menu.router.php';
            exit();
        case 'users':
            include_once 'routes/dashboard/dashboard.users.router.php';
            exit();
        case 'addingredient':
            include 'views/dashboard/addingredient.php';
            exit();
        case 'addoption':
            include 'views/dashboard/addItemOption.php';
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
        case 'points':
            include 'views/dashboard/points.php';
            exit();
        case 'discount':
            include 'views/dashboard/discount.php';
            exit();
        case 'viewdiscount':
            include 'views/dashboard/viewdiscount.php';
            exit();
        case 'reviews':
            include 'views/dashboard/reviews.php';
            exit();
        default:
            include 'views/404.php';
            exit();
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    switch ($lastSegment) {
        case 'menu':
            include_once 'routes/dashboard/dashboard.menu.router.php';
            exit();

        case 'users':
            include_once 'routes/dashboard/dashboard.users.router.php';
            exit();

        case 'addingredient':
            include 'controllers/ingredient.controller.php';
            $ingredient = new IngredientController;
            $ingredient->add();
            exit();

        case 'addoptions':
            $items = [];
            include 'controllers/item.controller.php';
            ItemController::getAjaxCategories();
            exit();

        case 'addoption':
            include 'controllers/itemOption.controller.php';
            $option = new OptionController;
            $option->addOption();
            exit();

        case'discount':
            include 'controllers/discount.controller.php';
            $discount = new DiscountController;
            $discount->add();
            exit();
    }

    // if (isset($_POST['type'])) {
    //     $menuController = new MenuController();
    //     $uniqueCategories = $menuController->extractUniqueCategories($_POST['type']);
    //     var_dump($uniqueCategories);

    //     $out = '';
    //     foreach ($uniqueCategories as $category) {   
    //         $out .=  '<option>' . $category . '</option>'; 
    //     }
    //     echo $out;
    // } else {
    //     echo "Invalid request"; // Handle the case when 'type' is not set in POST data
    // }
} else {
    die ("something wrong in discount");

}
