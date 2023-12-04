<?php
// Path: routes/menu.php

// Get the current URL
$url = $_SERVER['REQUEST_URI'];

// segments
$segments = explode('/', $url);
$lastSegment = trim(strtolower($segments[count($segments) - 1]));


$thirdlastSegment = trim(strtolower($segments[count($segments) - 3]));


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    switch ($thirdlastSegment) {
        case 'menu':
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
    }

    switch($lastSegment){
        case "menu":
            //include 'views/menu.php';
            include 'controllers/menu.controller.php';
            $menu=new MenuController;
            $menu->getMenu();
            
            exit();
    }
    // EXAMPLE: if the url is /menu/anythingElse
    // Then dont show the menu page
    if (count($segments) > 3) {
        include 'views/404.php';// show the 404 page
        exit();
    }

    
}
?>

