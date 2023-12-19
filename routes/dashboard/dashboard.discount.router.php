<?php
require_once 'controllers/discount.controller.php';
require_once 'models/Discount.php';

if (isset($_SESSION['user'])) {
    $user = new User;
    $user->unserialize($_SESSION['user']);
    $userType = $user->getType();

    // Check if the user is allowed to access this page
    if (!$userType->isAllowed('dashboard/discount')) {
        include 'views/404.php';
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['action'])) {
        include 'views/dashboard/discount/dashboard_discount.php';
        exit();
    }

    $action = strtolower(trim($_GET['action']));

    switch ($action) {
        case 'add':
            include 'views/dashboard/discount/add_discount.php';
            exit();
        case 'edit':
            $discount_id = trim($_GET['id']);
            $discount = Discount::getDiscountByID($discount_id);

            if (!$discount) {
                include 'views/404.php';
                exit();
            }

            include 'views/dashboard/discount/edit_discount.php';
            exit();
        default:
            include 'views/404.php';
            exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_GET['action'])) {
        include 'views/404.php';
        exit();
    }

    $action = strtolower(trim($_GET['action']));

    switch ($action) {
        case'add':
            $discount = new DiscountController;
            $discount->add();
            exit();
        case 'edit':
            $discount = new DiscountController;
            $discount->edit();
            exit();
        default:
            include 'views/404.php';
            exit();
    }
}
