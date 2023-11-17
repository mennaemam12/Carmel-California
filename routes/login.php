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
    include 'controllers/user.controller.php';
    $user = new UserController;
    $user->login();
}

