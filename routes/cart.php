<?php
// Path: routes/cart.php

// Check if the user is not logged in
if (!isset($_SESSION['userType'])) {
    header('Location: /'); // Redirect to the home page
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include 'views/cart.php';
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include Controller
}

