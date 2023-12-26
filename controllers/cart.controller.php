<?php
require_once 'models/Cart.php';
require_once 'models/User.php';
require_once 'helpers/session.helper.php';


class CartController
{
    private $cartModel;

    public function __construct()
    {
    }


    public function findItem($id, $type, $selected_option, $cartItems)
    {
        for ($i = 0; $i < count($cartItems); $i++) {
            if ($cartItems[$i]->getItemId() == $id && $cartItems[$i]->getItemType() == $type &&
                $cartItems[$i]->getSelectedOption() == $selected_option) {
                return $i;
            }
        }
        return '';
    }

    public function addToUserSession()
    {

        // Now, $data contains the values sent from the frontend
        $id = $_POST['id'];
        $type = $_POST['type'];
        $quantity = $_POST['quantity'];
        $selected_option = $_POST['selectedOption'];

        $cartItems = array();
        $this->cartModel = new Cart;
        $user = new User;
        $index = '';
        if (isset($_SESSION['user'])) {
            $user->unserialize($_SESSION['user']);

            if ($user->getcart() != null) {

                foreach ($user->getCart() as $cartItem) {
                    $cart = new Cart;
                    $cart->unserialize($cartItem);
                    $cartItems[] = $cart;
                }
                $index = $this->findItem($id, $type, $selected_option, $cartItems);
            }

            if ($index != '') {
                $existingQuantity = $cartItems[$index]->getQuantity();
                $newQuantity = $existingQuantity + $quantity;

                $cartItems[$index]->setQuantity($newQuantity);

            } else if ($index === '') {
                $this->cartModel->setUserId($user->getID());
                $this->cartModel->setItemType($type);
                $this->cartModel->setItemId($id);
                $this->cartModel->setSelectedOption($selected_option);
                $this->cartModel->setQuantity($quantity);
                $cartItems[] = $this->cartModel;
            }

            $user->emptyCart();
            foreach ($cartItems as $cartItem)
                $user->addToCart($cartItem->serialize());


            $_SESSION['user'] = $user->serialize();

            // Return a JSON response with a boolean value
            $response = array(
                'success' => true,
                'cartQuantity' => $this->getCartSessionQuantity()
            );

            echo json_encode($response);
        }
    }

    public static function getCartSessionQuantity()
    {
        $user = new User;
        $user->unserialize($_SESSION['user']);
        $cartItems = array();
        foreach ($user->getCart() as $cartItem) {
            $cart = new Cart;
            $cart->unserialize($cartItem);
            $cartItems[] = $cart;
        }

        $quantity = 0;
        foreach ($cartItems as $citem)
            $quantity += $citem->getQuantity();

        return $quantity;
    }


    public static function viewCart()
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

        foreach ($cartItems as $item)
            $items[] = Item::findItemByID($item->getItemType(), $item->getItemId());

        include_once 'views/cart.php';
    }

    public static function updateQuantity($increment)
    {
        $cartItems = array();
        $user = new User;
        $user->unserialize($_SESSION['user']);
        foreach ($user->getCart() as $cartItem) {
            $cart = new Cart;
            $cart->unserialize($cartItem);
            $cartItems[] = $cart;
        }
        $existingQuantity = $cartItems[$_POST['index']]->getQuantity();

        if (!$increment && $existingQuantity == 1) {
            echo json_encode(array('success' => false));
            exit();
        }

        if ($increment)
            $newQuantity = $existingQuantity + 1;
        else
            $newQuantity = $existingQuantity - 1;

        $cartItems[$_POST['index']]->setQuantity($newQuantity);

        $user->emptyCart();
        foreach ($cartItems as $cartItem)
            $user->addToCart($cartItem->serialize());

        $_SESSION['user'] = $user->serialize();

        $total = 0;
        $cartQuantity = 0;
        $items = Cart::getCartSessionItems();

        for ($i = 0; $i < count($cartItems); $i++) {
            $total += $items[$i]->Price * $cartItems[$i]->getQuantity();
            $cartQuantity += $cartItems[$i]->getQuantity();
        }

        $itemTotal = $cartItems[$_POST['index']]->getQuantity() * $items[$_POST['index']]->Price;

        $response = array(
            'success' => true,
            'quantity' => $newQuantity,
            'itemTotal' => $itemTotal,
            'subtotal' => $total,
            'total' => $total,
            'cartQuantity' => $cartQuantity
        );

        echo json_encode($response);
    }

    public static function removeItem()
    {
        $cartItems = array();
        $user = new User;
        $user->unserialize($_SESSION['user']);
        foreach ($user->getCart() as $cartItem) {
            $cart = new Cart;
            $cart->unserialize($cartItem);
            $cartItems[] = $cart;
        }

        unset($cartItems[intval($_POST['i'])]);

        // Reindex the array
        $cartItems = array_values($cartItems);
        $user->emptyCart();
        foreach ($cartItems as $cartItem)
            $user->addToCart($cartItem->serialize());

        $_SESSION['user'] = $user->serialize();

        redirect("/cart");
        echo $_POST['i'];
    }
}

