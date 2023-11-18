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
                'ItemName' => trim($_POST['ItemName']),
                'Price' => trim($_POST['Price']),
                'Category' => trim($_POST['Category']),
                'Descriptions' => trim($_POST['Descriptions'])
            ];

            //Validate inputs
            if(empty($data['ItemName']) || empty($data['Price']) || empty($data['Category']) || 
            empty($data['Descriptions'])){
                die("fill out all inputs");
                // flash("itemadd", "Please fill out all inputs");
                // redirect($GLOBALS['projectFolder']."/itemadd");
            }

            //User with the same email or password already exists
            if($this->ItemModel->findItemByName($data['ItemName'])){
                die("Name already taken");
                // flash("itemadd", "Name already taken");
                // redirect($GLOBALS['projectFolder']."/itemadd");
            }

            //Passed all validation checks.

            //Register User
            if($this->ItemModel->add($data)){
              //show in menu
              die("done");
            }else{
                die("Something went wrong");
            }
        }
}