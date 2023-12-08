<?php
include 'controllers/itemOption.controller.php';

$url = $_SERVER['REQUEST_URI'];

// segments
$segments = explode('/', $url);
$lastSegment = trim(strtolower($segments[count($segments) - 1]));
$thirdlastSegment = trim(strtolower($segments[count($segments) - 3]));

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
        include 'controllers/item.controller.php';

        $itemID = $_GET['id'];
        $itemType = $_GET['type'];

        // Check if the item type & item id are valid
        if (!ItemController::doesExist($itemType, $itemID)) {
            include 'views/404.php';
            exit();
        }

        $item = Item::findItemByID($itemType, $itemID);

        $result = ItemOption::getItemOptions($itemType, $itemID);
        include 'views/singleProduct.php';
        exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    switch($lastSegment){
//     case 'addToCart':
        include 'controllers/cart.controller.php';
        $cartController=new CartController;
        $cartController->addToUserSession();
//         exit();
//    }

}
