<?php
require_once 'controllers/item.controller.php';
require_once 'models/Item.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['action'])) {
        include 'views/dashboard/menu/menu_dashboard.php';
        exit();
    }

    $action = strtolower(trim($_GET['action']));
    
    switch ($action) {
        case 'additem':
            include 'views/dashboard/menu/additem.php';
            exit();
        case 'edititem':
            if (!isset($_GET['id']) || !isset($_GET['type'])) {
                include 'views/404.php';
                exit();
            }

            $itemID = $_GET['id'];
            $itemType = $_GET['type'];

            // Check if the item type & item id are valid
            if (!ItemController::doesExist($itemType, $itemID)) {
                include 'views/404.php';
                exit();
            }

            $item = Item::findItemByID($itemType, $itemID);
            include 'views/dashboard/menu/edititem.php';
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
        case 'additem':
            $item = new ItemController;
            $item->add();
            exit();

        case 'edititem':
            $item = new ItemController;
            if (!isset($_POST['itemtype']) || !isset($_POST['id'])) {
                include 'views/404.php';
                exit();
            }

            $type = $_POST['itemtype'];
            $id = $_POST['id'];

            $item->edit($type, $id);
            exit();

        case 'deleteitem':
            $item = new ItemController;
            $itemID = $_POST['id'];
            $itemType = $_POST['type'];
            $item->delete($itemType, $itemID);
            exit();
        default:
            include 'views/404.php';
            exit();
    }
}
