<?php
// Path: routes/salad-order
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include 'controllers/ingredient.controller.php';
    $ing = new IngredientController;
    $ing->getSections();
    
    exit();
}
?>