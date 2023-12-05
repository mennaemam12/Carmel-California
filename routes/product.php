<?php
include 'controllers/itemOption.controller.php';
// Path: routes/product.php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include 'controllers/item.controller.php';

    //check if isset
    if (!isset($_GET['type']) || !isset($_GET['id'])) {
        include 'views/404.php';
        exit();
    }

    $itemType = $_GET['type'];
    $itemID = $_GET['id'];

    // Check if the item type & item id are valid
    if (!ItemController::doesExist($itemType, $itemID)) {
        include 'views/404.php';
        exit();
    }

    //Passed checks
    $item = Item::findItemByID($itemType, $itemID);

    $result = ItemOption::getItemOptions($itemType, $itemID);
    include 'views/singleProduct.php';
    exit();
}
