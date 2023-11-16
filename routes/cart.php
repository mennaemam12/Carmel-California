<?php
// Path: routes/cart.php
include 'projectFolderName.php';

// Check if the user is not logged in
// Commenting till we have a proper database
// if (!isset($_SESSION['userType'])) {
//     header('Location: ' .$projectFolder. '/'); // Redirect to the home page
//     exit();
// }

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include 'views/cart.php';
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include Controller
}

