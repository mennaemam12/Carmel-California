<?php
require_once 'models/NavBar.php';
require_once 'models/User.php';
require_once 'controllers/cart.controller.php';
class NavController
{
    public static function viewNav()
    {
        $user = new User;
        $quantity = 0;

        $navItems = NavBar::getNav();
        $logout = NavBar::getCustom('Logout');
        $signin = NavBar::getCustom('Sign in');
        $admin = NavBar::getCustom('Dashboard');

        if (isset($_SESSION['user'])) {
            $user->unserialize($_SESSION['user']);
            $quantity = CartController::getCartSessionQuantity();
        }

        include_once 'views/partials/nav.php';
    }
}