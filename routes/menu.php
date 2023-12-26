<?php
require_once 'models/User.php';
require_once 'controllers/menu.controller.php';
require_once 'controllers/ingredient.controller.php';

$url = $_SERVER['REQUEST_URI'];
$segments = explode('/', $url);

// Path: routes/menu.php

if (isset($_SESSION['user'])) {
    $user = new User;
    $user->unserialize($_SESSION['user']);
    $userType = $user->getType();

    // Check if the user is allowed to access this page
    if (!$userType->isAllowed('menu')) {
        include 'views/404.php';
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (count($segments) > 2) {
        include 'views/404.php';// show the 404 page
        exit();
    }

    if (!isset($_GET['action'])) {
        $menu = new MenuController;
        $menu->getMenu();
        exit();
    }

    switch ($_GET['action']) {
        case 'customize-salad':
            $ing = new IngredientController;
            $ing->getSections();
//            include 'views/customize_salad.php';
            exit();
        default:
            include 'views/404.php';
            exit();
    }

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($_GET['action']) {
        case 'getsaladiteminfo':
            IngredientController::getSaladItemInfo();
            exit();
        case 'getsaladtotal':
            IngredientController::getAjaxTotal();
            exit();
    }
}
