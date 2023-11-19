<?php
    require_once 'models/Item.php';
    require_once 'helpers/session.helper.php';
    include 'projectFolderName.php';

    class ItemController {

        private $ItemModel;
        
        public function __construct(){
            $this->ItemModel = new Item;
        }

        public function add(){
            //Process form
            
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init data
            $data = [
                'itemname' => trim($_POST['itemname']),
                'price' => trim($_POST['price']),
                'category' => trim($_POST['category']),
                'descriptions' => trim($_POST['descriptions']),
                'itemtype'=> trim($_POST['itemtype'])
            ];

            //Validate inputs
            if(empty($data['itemname']) || empty($data['price']) || empty($data['category']) || 
            empty($data['descriptions'])){
                die("fill out all inputs");
                // flash("itemadd", "Please fill out all inputs");
                // redirect($GLOBALS['projectFolder']."/itemadd");
            }

            //User with the same email or password already exists
            // if($this->ItemModel->findItemByName($data['itemname'],$data['itemtype'])){
            //     die("Name already taken");
            //     // flash("itemadd", "Name already taken");
            //     // redirect($GLOBALS['projectFolder']."/itemadd");
            // }

            //Passed all validation checks.
            // if(!($this->ItemModel->findItemByName($data['itemname'],$data['itemtype']))){
            //     die("pass");
            // }
            //Register User
             if($this->ItemModel->add($data)){
              //show in menu
              die("done");
            }else{
                die("Something went wrong");
            }
        }
}