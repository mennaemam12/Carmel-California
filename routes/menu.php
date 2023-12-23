<?php
require_once 'models/User.php';
require_once 'controllers/menu.controller.php';
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

    if (!isset($_GET['action'])) {
        $menu = new MenuController;
        $menu->getMenu();
        exit();
    }

    switch ($_GET['action']) {
        case 'customize-salad':
            include 'views/customize_salad.php';
            exit();
        default:
            include 'views/404.php';
            exit();
    }

}
