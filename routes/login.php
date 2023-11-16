<?php
// Path: routes/login.php

include 'projectFolderName.php';

// Commenting till we have a proper database
// Check if the user is already logged in
// if (isset($_SESSION['userType'])) {
//     header('Location: ' .$projectFolder. '/'); // Redirect to the home page
//     exit();
// }

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include 'views/login.php';
    exit();
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include your UserController or handle the login logic here

    // example: 
    // include 'controllers/UserController.php';
    // UserController::login($_POST); // Assuming login function is static and accepts form data
}

