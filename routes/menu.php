<?php
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

    //include 'views/menu.php';
    include 'controllers/menu.controller.php';
    $menu = new MenuController;
    $menu->getMenu();
}
