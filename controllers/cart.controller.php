<?php
    require_once 'models/Cart.php'; 
    require_once 'models/User.php'; 
    require_once 'helpers/session.helper.php';
    include 'projectFolderName.php';

    class CartController{
        private $cartModel;
        public function __construct(){
        }

        public function findItem($id,$type,$selected_option,$cartItems){
            for ($i=0;$i<count($cartItems);$i++){
                if($cartItems[$i]->getItemId()==$id && $cartItems[$i]->getItemType()==$type &&
                 $cartItems[$i]->getSelectedOption()==$selected_option){
                    return $i;
                }
            }
            return '';
        }

        public function addToUserSession(){

            // Now, $data contains the values sent from the frontend
            $id = $_POST['id'];
            $type = $_POST['type'];
            $quantity = $_POST['quantity'];
            $selected_option= $_POST['selectedOption'];
            
            $cartItems=array();
            $this->cartModel = new Cart;
            $user= new User;
            $index='';
            if(isset($_SESSION['user'])){
                $user->unserialize($_SESSION['user']);

                if($user->getcart() != null){
                   
                    foreach($user->getCart() as $cartItem){
                        $cart=new Cart;
                        $cart->unserialize($cartItem);
                        $cartItems[]=$cart;
                    }
                    $index=$this->findItem($id,$type,$selected_option,$cartItems);
                }

                if($index!='') {
                    $existingQuantity = $cartItems[$index]->getQuantity();
                    $newQuantity = $existingQuantity + $quantity;
                    
                    $cartItems[$index]->setQuantity($newQuantity);
                    echo $newQuantity;

                }
                else if($index==''){
                    $this->cartModel->setUserId($user->getID());
                    $this->cartModel->setItemType($type);
                    $this->cartModel->setItemId($id);
                    $this->cartModel->setSelectedOption($selected_option);
                    $this->cartModel->setQuantity($quantity);

                        $cartItems[] = $this->cartModel;
                }

                $user->emptyCart();
                foreach($cartItems as $cartItem){
                    $user->addToCart($cartItem->serialize());
                }
                
                $_SESSION['user'] = $user->serialize();    
                    
            
                // Return a JSON response with a boolean value
                $response = true;
                echo $response;
           }
        }

     

        public static function viewCart(){
            $items=array();
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
