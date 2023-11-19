<?php
// Path: routes/menu.php

// Get the current URL
$url = $_SERVER['REQUEST_URI'];

// segments
$segments = explode('/', $url);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    // EXAMPLE: if the url is /menu/anythingElse
    // Then dont show the menu page
    if (count($segments) > 3) {
        include 'views/404.php';// show the 404 page
        exit();
    }

    include 'views/menu.php';
    exit();
}
?>

