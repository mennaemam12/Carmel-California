<?php
// Path: routes/cart.php

include 'projectFolderName.php';


// Commenting till we have a proper database
// Check if the user is already logged in
// if (isset($_SESSION['userType'])) {
//     header('Location: ' .$projectFolder. '/'); // Redirect to the home page
//     exit();
// }

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include 'views/additem.php';
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'controllers/item.controller.php';
    $item = new ItemController;
    $item->add();
}

