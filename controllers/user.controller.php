<?php
    require_once 'models/User.php';
    require_once 'helpers/session.helper.php';
    include 'projectFolderName.php';
   

    class UserController {

        private $userModel;
        
        public function __construct(){
            $this->userModel = new User;
        }

        public function register(){
            //Process form
            
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init data
            $data = [
                'FullName' => trim($_POST['FullName']),
                'Email' => trim($_POST['Email']),
                'Username' => trim($_POST['Username']),
                'UserPass' => trim($_POST['UserPass']),
                'UserConfPass' => trim($_POST['UserConfPass']),
                'PhoneNumber' => trim($_POST['PhoneNumber'])
            ];

            //Validate inputs
            if(empty($data['FullName']) || empty($data['Email']) || empty($data['Username']) || 
            empty($data['UserPass']) || empty($data['UserConfPass'])){
                flash("formError", "Please fill out all inputs");
                redirect($GLOBALS['projectFolder']."/signup");
            }

            if(!preg_match("/^[a-zA-Z0-9]*$/", $data['Username'])){
                flash("formError", "Invalid username");
                redirect($GLOBALS['projectFolder']."/signup");
            }

            if(!filter_var($data['Email'], FILTER_VALIDATE_EMAIL)){
                flash("formError", "Invalid email");
                redirect($GLOBALS['projectFolder']."/signup");
            }

            if(strlen($data['UserPass']) < 6){
                flash("formError", "Invalid password");
                redirect($GLOBALS['projectFolder']."/signup");
            } else if($data['UserPass'] !== $data['UserConfPass']){
                flash("formError", "Passwords don't match");
                redirect($GLOBALS['projectFolder']."/signup");
            }

            //User with the same email or password already exists
            if($this->userModel->findUserByEmailOrUsername($data['Email'], $data['Username'])){
                flash("formError", "Username or email already taken");
                redirect($GLOBALS['projectFolder']."/signup");
            }

            //Passed all validation checks.
            //Now going to hash password
            $data['UserPass'] = password_hash($data['UserPass'], PASSWORD_DEFAULT);
            $id = $this->userModel->db->lastInsertId();
            $this->userModel->setID($id);
            $this->userModel->setFullName($data['FullName']);
            $this->userModel->setEmail($data['Email']);
            $this->userModel->setUsername($data['Username']);
            $this->userModel->setPassword($data['UserPass']);
            $this->userModel->setPhone($data['PhoneNumber']);
            $this->userModel->setType("user");

            //Register User
            if($this->userModel->register()){
                // $logged=$this->userModel->findUserByEmailOrUsername($data['Email'], $data['FullName']);
                // if($logged){
                //Create session
                $this->createUserSession($this->userModel);     
                // }else{
                //     die("Something went wrong while logging in");
                // }
            }else{
                die("Something went wrong");
            }
        }

    public function login(){
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Init data
        $data=[
            'Name/Email' => trim($_POST['Name/Email']),
            'UserPass' => trim($_POST['UserPass'])
        ];

        if(empty($data['Name/Email']) || empty($data['UserPass'])){
            flash("formError", "Please fill out all inputs");
            header("location:". $GLOBALS['projectFolder']."/login");
            exit();
        }

        //Check for user/email
        if($this->userModel->findUserByEmailOrUsername($data['Name/Email'], $data['Name/Email'])){
            //User Found
            $loggedInUser = $this->userModel->login($data['Name/Email'], $data['UserPass']);
            if($loggedInUser){
                //Cre
                $this->userModel->setID($loggedInUser->id);
                $this->userModel->setFullName($loggedInUser->FullName);
                $this->userModel->setEmail($loggedInUser->Email);
                $this->userModel->setUsername($loggedInUser->UserName);
                $this->userModel->setPhone($loggedInUser->PhoneNumber);
                $this->userModel->setType($loggedInUser->Usertype);
                $this->createUserSession($this->userModel);
            }else{
                flash("formError", "Password Incorrect");
                header("location:". $GLOBALS['projectFolder']."/login");

            }
        }else{
            flash("formError", "No user found");
            header("location:". $GLOBALS['projectFolder']."/login");

        }
    }

    public function createUserSession($user){
        $_SESSION['user'] = $user;
        header("location:". $GLOBALS['projectFolder']."/index");
    }

    public function logout(){
        unset($_SESSION['user']);
        session_destroy();
        redirect($GLOBALS['projectFolder']."/index");
    }
}

    // $init = new UserController;

    // //Ensure that user is sending a post request
    // if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     switch($_POST['type']){
    //         case 'register':
    //             $init->register();
    //             break;
    //         case 'login':
    //             $init->login();
    //             break;
    //         default:
    //         redirect($GLOBALS['projectFolder']."/index");
    //     }
        
    // }else{
    //     switch($_GET['q']){
    //         case 'logout':
    //             $init->logout();
    //             break;
    //         default:
    //         redirect($GLOBALS['projectFolder']."/index");
    //     }
    // }

    