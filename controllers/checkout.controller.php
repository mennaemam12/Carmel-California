<?php
require_once 'models/Cart.php';
require_once 'models/User.php';
require_once 'helpers/session.helper.php';

include 'models/Discount.php';
include 'models/BillingDetails.php';

class CheckoutController
{
    private $checkoutModel;
    public function __construct()
    {
    }

    public static function viewCheckout()
    {
        $items = array();
        $cartItems = array();
        $user = new User;
        $user->unserialize($_SESSION['user']);
        foreach ($user->getCart() as $cartItem) {
            $cart = new Cart;
            $cart->unserialize($cartItem);
            $cartItems[] = $cart;
        }


        foreach ($cartItems as $item) {
            $items[] = Item::findItemByID($item->getItemType(), $item->getItemId());
        }
        $count = count($items);
        $delivery = 50;
        $total = 0;
        foreach ($items as $item) {
            $total += $item->Price;
        }



        $details = BillingDetails::getUserBillingDetails($user->getID());
        if ($details) {
            $firstname = $details->FirstName;
            $lastname = $details->LastName;
            $area = $details->Area;
            $street = $details->Street;
            $building = $details->Building;
            $floor = $details->Floor;
            $apartment = $details->Apartment;
            $postalcode = $details->Postalcode;
        } else {
            $fullname = explode(' ', $user->getFullName());
            $firstname = $fullname[0];
            $lastname = $fullname[1];
            $area = "";
            $street = "";
            $building = "";
            $floor = "";
            $apartment = "";
            $postalcode = "";
        }
        include 'views/checkout.php';
    }

    public static function checkDiscount()
    {
        $code = $_POST['discountcode'];

        $items = array();
        $cartItems = array();
        $user = new User;
        $user->unserialize($_SESSION['user']);
        foreach ($user->getCart() as $cartItem) {
            $cart = new Cart;
            $cart->unserialize($cartItem);
            $cartItems[] = $cart;
        }


        foreach ($cartItems as $item) {
            $items[] = Item::findItemByID($item->getItemType(), $item->getItemId());
        }

        $result = Discount::getDiscountByCoupon($code);
        $discount = 0;
        if ($result) {
            foreach ($items as $item) {
                if (strtolower($item->Category) === $result->category) {
                    $discount = $result->percentage;
                }
            }
        }

        echo $discount;
    }


    public static function validateCheckout()
    {
        $json_data = file_get_contents("php://input");

        $formdata = json_decode($json_data, true);

        $user = new User;
        $user->unserialize($_SESSION['user']);

        if (
            empty($formdata['firstname']) || empty($formdata['lastname']) || empty($formdata['area']) ||
            empty($formdata['street']) || empty($formdata['building']) || empty($formdata['floor']) || empty($formdata['apartment'])
        ) {
            echo "Please fill all required fields.";
        } else {
            if ($formdata['save']) {

                $id = $user->getID();
                $bill = new BillingDetails();
                $bill->saveBillingDetails($id, $formdata);
            }
            include 'models/Order.php';
            $order = new Order();
            foreach ($user->getCart() as $cartItem) {
                $cart = new Cart;
                $cart->unserialize($cartItem);
                $cartItems[] = $cart;
            }
            foreach ($cartItems as $item) {
                $items[] = Item::findItemByID($item->getItemType(), $item->getItemId());
                $order->saveOrderDetails($user->getID(), $item);
                
            }
            $cartItems=array();
            $user=new User;
            $user->unserialize($_SESSION['user']);
            foreach($user->getCart() as $cartItem){
                $cart=new Cart;
                $cart->unserialize($cartItem);
                $cartItems[]=$cart;
            }
            $cartItems = array_values($cartItems);
            $user->emptyCart();
            $_SESSION['user'] = $user->serialize(); 
                     
        }
      redirect("/cart");
    }
}
?>