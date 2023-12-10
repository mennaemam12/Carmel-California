<?php
// Path: routes/menu.php


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    //include 'views/menu.php';
    include 'controllers/menu.controller.php';
    $menu = new MenuController;
    $menu->getMenu();
}
