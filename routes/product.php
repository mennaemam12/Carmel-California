<?php
@session_start();
require_once 'controllers/itemOption.controller.php';
require_once 'controllers/review.controller.php';

if (isset($_SESSION['user'])) {
    $user = new User;
    $user->unserialize($_SESSION['user']);
    $userType = $user->getType();

    // Check if the user is allowed to access this page
    if (!$userType->isAllowed('product')) {
        include 'views/404.php';
        exit();
    }
}

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
    if(isset($_POST['id'])){
        include 'controllers/cart.controller.php';
        $cartController=new CartController;
        $cartController->addToUserSession();
        exit();
    }

}
