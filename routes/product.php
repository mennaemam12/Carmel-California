<?php
require_once 'controllers/itemOption.controller.php';
require_once 'controllers/review.controller.php';
$url = $_SERVER['REQUEST_URI'];

// segments
$segments = explode('/', $url);
$lastSegment = trim(strtolower($segments[count($segments) - 1]));
$thirdlastSegment = trim(strtolower($segments[count($segments) - 3]));

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        include_once 'controllers/item.controller.php';

        $itemID = $_GET['id'];
        $itemType = $_GET['type'];

        $_SESSION['itemID'] = $itemID;
        $_SESSION['itemType'] = $itemType;

        // Check if the item type & item id are valid
        if (!ItemController::doesExist($itemType, $itemID)) {
            include 'views/404.php';
            exit();
        }

        $item = Item::findItemByID($itemType, $itemID);

        $reviews = Review::getReviews($itemType, $itemID);

        $result = ItemOption::getItemOptions($itemType, $itemID);
        include 'views/singleProduct.php';
        exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['review-message'])) {
        $review = new ReviewController;
        $review->add();
        exit();
    }
//    switch($lastSegment){
//     case 'addToCart':
        include 'controllers/cart.controller.php';
        $cartController=new CartController;
        $cartController->addToUserSession();
//         exit();
//    }

}
