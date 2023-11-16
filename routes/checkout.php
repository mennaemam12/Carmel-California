<?php
// Path: routes/checkout.php

include 'projectFolderName.php';

// Commenting till we have a proper database
// Check if the user is not logged in
// if (!isset($_SESSION['userType'])) {
//     header('Location: ' .$projectFolder. '/'); // Redirect to the home page    
//     exit();
// }

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include 'views/checkout.php';
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include Controller
}

