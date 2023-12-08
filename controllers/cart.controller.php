<?php
    require_once 'models/Cart.php'; 
    require_once 'helpers/session.helper.php';
    include 'projectFolderName.php';

    class CartController{
        private $cartModel;
        public function __construct(){
        }

        public static function addToUserSession(){
            session_start();

            // Now, $data contains the values sent from the frontend
            $id = $_POST['id'];
            $type = $_POST['type'];
            $quantity = $_POST['quantity'];

            $cartModel=new Cart;
            $cartModel->setUserId($_SESSION['user']->getID());
            $cartModel->setItemType($type);
            $cartModel->setItemId($id);
            $cartModel->setQuantity($quantity);
            if ($_POST['$selectedOption']!='') {
                $selectedOption = $_POST['$selectedOption'];
                $cartModel->setSelectedOption($selectedOption);
            } 

            $cartModel->serialize();
            $_SESSION['user']->cart=$_SESSION['user']->addToCart($cartModel);

            $response = json_encode(true);
            echo $response;
        }
    }

?>
