<?php
// Path: routes/product.php

// Get the current URL
$url = $_SERVER['REQUEST_URI'];

// segments
$segments = explode('/', $url);
$lastSegment = trim(strtolower($segments[count($segments) - 1]));
$thirdlastSegment = trim(strtolower($segments[count($segments) - 3]));

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    switch ($thirdlastSegment) {
        case 'product':
            include 'controllers/item.controller.php';

            $itemID = $lastSegment;
            $itemType = $segments[count($segments) - 2];

            // Check if the item type & item id are valid
            if (!ItemController::doesExist($itemType, $itemID)) {
                include 'views/404.php';
                exit();
            }

            //Passed checks
            include 'views/singleProduct.php';
            exit();
        default:
            include 'views/404.php';
            exit();
    }
}
