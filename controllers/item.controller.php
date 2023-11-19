<?php
    require_once 'models/Item.php';
    require_once 'helpers/session.helper.php';
    include 'projectFolderName.php';

    class ItemController {

        private $itemModel;
        
        public function __construct(){
            
        }

        public function validateItem($data,$imagePath){
            if (empty($data['itemtype']) || empty($data['item_name']) || empty($data['price']) 
            || empty($data['category']) || empty($data['description'])) {
                flash("AddItem", "Please fill out all inputs");
                return false;
            }
    
            if ( !is_string($data['item_name'])) {
                flash("AddItem", "Invalid item name");
                return false;
            }
    
            if (!is_numeric($data['price']) || $data['price'] <= 0) {
                flash("AddItem", "Invalid price");
                return false;
            }
    
            if (!is_string($data['category'])) {
                flash("AddItem", "Invalid category");
                return false;
            }
    
            if (!is_string($data['description'])) {
                flash("AddItem", "Invalid description ");
                return false;
            }

            if (!$imagePath) {
                flash("AddItem", "Failed to save the image", 'form-message form-message-red');
                return false;
            }

            return true;
        }

        private function saveImage($file, $category) {
            $uploadDir = 'public/images/' . $category . '/';  
            $imageFileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    
            // Generate a unique name for the image
            $imageName = uniqid('image_') . '.' . $imageFileType;
            $targetPath = $uploadDir . $imageName;
    
            // Create the category subfolder if it doesn't exist
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
    
            // Move the uploaded file to the destination subfolder
            if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                return $targetPath;
            } else {
                return false;
            }
        }

        public function add(){
           
            
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init data
            $data = [
                'item_name' => trim($_POST['itemname']),
                'category' => trim($_POST['category']),
                'description' => trim($_POST['descriptions']),
                'price' => trim($_POST['price']),
                'itemtype'=> trim($_POST['itemtype'])
            ];

            //handle image path
            $imagePath = $this->saveImage($_FILES['image'], $data['itemtype']);

            if ($this->validateItem($data,$imagePath)) {

                // Validation successful, create an Item object
                $this ->$itemModel = new Item($data['itemname'], $data['category'], $data['description'], $data['price'], $imagePath);
    
                if ($this->$itemModel->add($data['itemtype'])) {
                    flash("formSuccess", "Item added successfully", 'form-message form-message-green');
                    redirect($GLOBALS['projectFolder']."/addItem");
                } else {
                    flash("formError", "Failed to add item to the database", 'form-message form-message-red');
                    redirect($GLOBALS['projectFolder']."/addItem");
                }
            } else {
                redirect($GLOBALS['projectFolder']."/addItem");
            }
            
            
            if($this->ItemModel->add($data)){
                //show in menu
                die("done");
            }else{
                die("Something went wrong");
            }
        }
}