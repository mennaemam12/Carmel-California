<?php
// Path: routes/about.php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include 'views/about.php';
    exit();
}

