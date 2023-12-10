<?php
    require_once 'models/Cart.php'; 
    require_once 'models/User.php'; 
    require_once 'helpers/session.helper.php';
    include 'projectFolderName.php';

    class CartController{
        private $cartModel;
        public function __construct(){
        }

        public function addToUserSession(){

            // Now, $data contains the values sent from the frontend
            $id = $_POST['id'];
            $type = $_POST['type'];
            $quantity = $_POST['quantity'];
        
            $this->cartModel = new Cart;
            $user= new User;
            if(isset($_SESSION['user'])){
                $user->unserialize($_SESSION['user']);

                $this->cartModel->setUserId($user->getID());
                $this->cartModel->setItemType($type);
                $this->cartModel->setItemId($id);
                $this->cartModel->setQuantity($quantity);
            
                // Check if the selectedOption is set in $_POST and not an empty string
                if (isset($_POST['selectedOption']) && $_POST['selectedOption'] !== '') {
                    $selectedOption = $_POST['selectedOption'];
                    $this->cartModel->setSelectedOption($selectedOption);
                } 
            
               $user->addToCart($this->cartModel->serialize());
               $_SESSION['user'] = $user->serialize();

            
                // Return a JSON response with a boolean value
                $response = true;
                echo $response;
           }
        }

        public static function viewCart(){
            $cartItems=array();
            $user=new User;
            $user->unserialize($_SESSION['user']);
            foreach($user->getCart() as $cartItem){
                $cart=new Cart;
                $cart->unserialize($cartItem);
                $cartItems[]=$cart;
            }
            
    
            foreach($cartItems as $item){
                $items[]=Item::findItemByID($item->getItemType(),$item->getItemId());
            }
    
            include_once 'views/cart.php';
        }
    }

?>
