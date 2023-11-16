<?php
// Path: routes/product.php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include 'views/singleProduct.php';
    exit();
}

