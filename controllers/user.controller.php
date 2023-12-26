<?php
require_once 'models/User.php';
require_once 'models/Cart.php';
require_once 'helpers/session.helper.php';


class UserController
{

    private $userModel;
    private $errorMsg;

    private function validateLogin($data)
    {
        if (empty($data['Email']) || empty($data['UserPass'])) {
            $this->errorMsg = "Please fill out all inputs";
            return false;
        }
        return true;
    }

    private function validateSignUp($data)
    {
        if (
            empty($data['FullName']) || empty($data['Email']) || empty($data['PhoneNumber']) ||
            empty($data['UserPass']) || empty($data['UserConfPass'])
        ) {
            $this->errorMsg = "Please fill out all inputs";
            return false;
        }

        if (!filter_var($data['Email'], FILTER_VALIDATE_EMAIL)) {
            $this->errorMsg = "Invalid Email";
            return false;
        }

        if (strlen($data['UserPass']) < 8) {
            $this->errorMsg = "Password must be at least 8 characters long";
            return false;
        } else if ($data['UserPass'] !== $data['UserConfPass']) {
            $this->errorMsg = "Passwords do not match";
            return false;
        }

        return true;
    }

    public function __construct()
    {
        $this->userModel = new User;
    }

    public function editUserType()
    {
        if (!isset($_POST['id']) || !isset($_POST['usertype'])) {
            flash("formError", "Please fill out all inputs");
            redirect($GLOBALS['projectFolder'] . "/dashboard/users?action=edituser&id=" . $_POST['id']);
            exit();
        }

        $id = trim($_POST['id']);
        $usertype = trim($_POST['usertype']);

        if (!is_numeric($id) || !is_numeric($usertype)) {
            flash("formError", "Invalid input");
            redirect($GLOBALS['projectFolder'] . "/dashboard/users?action=edituser&id=" . $_POST['id']);
            exit();
        }

        if (empty($id) || empty($usertype)) {
            flash("formError", "Please fill out all inputs");
            redirect($GLOBALS['projectFolder'] . "/dashboard/users?action=edituser&id=" . $_POST['id']);
            exit();
        }

        $this->userModel->setID($id);
        $this->userModel->setType($usertype);

        if ($this->userModel->editUserType()) {
            flash("formSuccess", "User updated successfully");
            redirect($GLOBALS['projectFolder'] . "/dashboard/users?action=edituser&id=" . $_POST['id']);
            exit();
        }

        flash("formError", "Something went wrong");
        redirect($GLOBALS['projectFolder'] . "/dashboard/users?action=edituser&id=" . $_POST['id']);
        exit();

    }

    public function signup()
    {
        //Process form

        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Init data
        $data = [
            'FullName' => trim($_POST['FullName']),
            'Email' => trim($_POST['Email']),
            'UserPass' => trim($_POST['UserPass']),
            'UserConfPass' => trim($_POST['UserConfPass']),
            'PhoneNumber' => trim($_POST['PhoneNumber'])
        ];

        //Validate inputs
        if (!$this->validateSignUp($data)) {
            $response = array('msg' => $this->errorMsg);
            echo json_encode($response);
            exit();
        }

        //User with the same email or password already exists
        if ($this->userModel->findUserByEmail($data['Email'])) {
            $this->errorMsg = "Email is already taken";
            $response = array('msg' => $this->errorMsg);
            echo json_encode($response);
            exit();
        }

        //Passed all validation checks.
        //Now going to hash password
        $data['UserPass'] = password_hash($data['UserPass'], PASSWORD_DEFAULT);
        $this->userModel->setFullName($data['FullName']);
        $this->userModel->setEmail($data['Email']);
        $this->userModel->setPassword($data['UserPass']);
        $this->userModel->setPhone($data['PhoneNumber']);
        $this->userModel->setType(1);

        //Register User
        if ($this->userModel->signup()) {
            $id = $this->userModel->getLastInsertedID();
            $this->userModel->setID($id);
            $this->createUserSession($this->userModel);

            $this->errorMsg = "success";
            $response = array('msg' => $this->errorMsg);
            echo json_encode($response);
            return;
        }

        die("Something went wrong");
    }

    public function login()
    {
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Init data
        $data = [
            'Email' => trim($_POST['Email']),
            'UserPass' => trim($_POST['UserPass'])
        ];

        if (!$this->validateLogin($data)) {
            $response = array('msg' => $this->errorMsg);
            echo json_encode($response);
            exit();
        }

        //Check for user/email
        if ($this->userModel->findUserByEmail($data['Email'])) {
            //User Found
            $loggedInUser = $this->userModel->login($data['Email'], $data['UserPass']);
            if (!$loggedInUser) {
                $this->errorMsg = "Wrong Password";
                $response = array('msg' => $this->errorMsg);
                echo json_encode($response);
                exit();
            }

            $this->userModel->setID($loggedInUser->id);
            $this->userModel->setFullName($loggedInUser->FullName);
            $this->userModel->setEmail($loggedInUser->Email);
            $this->userModel->setPhone($loggedInUser->PhoneNumber);
            $this->userModel->setType($loggedInUser->Usertype);
            $this->createUserSession($this->userModel);

            $this->errorMsg = "success";
            $response = array('msg' => $this->errorMsg);
            echo json_encode($response);
            return;
        }

        $this->errorMsg = "User not found";
        $response = array('msg' => $this->errorMsg);
        echo json_encode($response);
        exit();
    }

    public function readCart($userid)
    {
        $results = $this->userModel->readCart($userid);
        $cartItems = array();
        foreach ($results as $result) {
            $cart = new Cart;
            $cart->setUserId($result->User_id);
            $cart->setItemType($result->Item_type);
            $cart->setItemId($result->Item_id);
            $cart->setSelectedOption($result->Selected_Option);
            $cart->setQuantity($result->Quantity);
            $cartItems[] = $cart;
        }
        return $cartItems;
    }

    public function createUserSession($user)
    {
        $cartItems = $this->readCart($user->getID());
        foreach ($cartItems as $cartItem)
            $user->addToCart($cartItem->serialize());

        $_SESSION['user'] = $user->serialize();
    }

    public function logout()
    {
        $this->userModel->unserialize($_SESSION['user']);
        $this->saveCart();
        unset($_SESSION['user']);
        session_destroy();
        redirect($GLOBALS['projectFolder'] . "/index");
    }

    public function saveCart()
    {
        $this->userModel->eraseCart();

        $cartItems = array();
        $user = new User;
        $user->unserialize($_SESSION['user']);

        foreach ($user->getCart() as $cartItem) {
            $cart = new Cart;
            $cart->unserialize($cartItem);
            $cartItems[] = $cart;
        }

        foreach ($cartItems as $item)
            $user->saveCart($item);
    }


}