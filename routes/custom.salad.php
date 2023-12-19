<?php
@session_start();

$url = $_SERVER['REQUEST_URI'];

// segments
$segments = explode('/', $url);
$lastSegment = trim(strtolower($segments[count($segments) - 1]));

if (strpos($lastSegment, '?') !== false)
    $lastSegment = strstr($lastSegment, '?', true);


// Path: routes/salad-order
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include 'controllers/ingredient.controller.php';
    $ing = new IngredientController;
    $ing->getSections();
    
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo $lastSegment;
    switch ($lastSegment) {
        case 'viewtotal':
            echo "hello";
            include 'controllers/ingredient.controller.php';
            IngredientController::getAjaxTotal();
            exit();
        case 'addtocart':

        default:
            include 'views/404.php';
            exit();
    }
}
?>