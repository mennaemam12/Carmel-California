<?php
@session_start();
// Path: routes/dashboard.php

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

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (count($segments) < 3) {
        include 'views/dashboard/dashboard.php';
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

        case 'discount':
            include_once 'routes/dashboard/dashboard.discount.router.php';
            exit();

        case 'reports':
            include_once 'routes/dashboard/dashboard.reports.router.php';
            exit();

        case 'orders':
            include_once 'routes/dashboard/dashboard.orders.router.php';
            exit();

        case 'reviews':
            include_once 'routes/dashboard/dashboard.reviews.router.php';
            exit();
//        case 'drivers':
//            include 'views/dashboard/drivers.php';
//            exit();
//        case 'loginadmin':
//            include 'views/dashboard/loginadmin.php';
//            exit();
//        case 'registeradmin':
//            include 'views/dashboard/registeradmin.php';
//            exit();
//        case 'points':
//            include 'views/dashboard/points.php';
//            exit();
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

        case 'discount':
            include_once 'routes/dashboard/dashboard.discount.router.php';
            exit();
    }
} else {
    die ("something wrong in discount");
}
