<?php
// Path: index.php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include 'views/index.php';
    exit();
}
?>

