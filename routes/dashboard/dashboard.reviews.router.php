<?php
require_once 'controllers/discount.controller.php';
require_once 'models/Discount.php';

if (isset($_SESSION['user'])) {
    $user = new User;
    $user->unserialize($_SESSION['user']);
    $userType = $user->getType();

    // Check if the user is allowed to access this page
    if (!$userType->isAllowed('dashboard/reviews')) {
        include 'views/404.php';
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['action'])) {
        include 'views/dashboard/dashboard_reviews.php';
        exit();
    }
}
