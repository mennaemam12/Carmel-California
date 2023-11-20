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
                flash("formError", "Please fill out all inputs");
                redirect($GLOBALS['projectFolder']."/dashboard/addItem");
                return false;
            }
    
            if ( !is_string($data['item_name'])) {
                flash("formError", "Invalid item name");
                redirect($GLOBALS['projectFolder']."/dashboard/additem");
                return false;
            }
    
            if (!is_numeric($data['price']) || $data['price'] <= 0) {
                flash("formError", "Invalid price");
                redirect($GLOBALS['projectFolder']."/dashboard/additem");
                return false;
            }
    
            if (!is_string($data['category'])) {
                flash("formError", "Invalid category");
                redirect($GLOBALS['projectFolder']."/dashboard/additem");
                return false;
            }
    
            if (!is_string($data['description'])) {
                flash("formError", "Invalid description ");
                redirect($GLOBALS['projectFolder']."/dashboard/additem");
                return false;
            }

            if (!$imagePath) {
                flash("formError", "Failed to save the image", 'form-message form-message-red');
                redirect($GLOBALS['projectFolder']."/dashboard/additem");
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
                mkdir($uploadDir,0755);
            }
    
            // Move the uploaded file to the destination subfolder
            if (move_uploaded_file($file['tmp_name'],$targetPath)) {
                return $targetPath;
            } else {
                //flash("formError", "Failed to save the image in path ", 'form-message form-message-red');
                //redirect($GLOBALS['projectFolder']."/dashboard/additem");
                return false;
            }
        }

        public function add(){
           
            
            //Sanitize POST data
            //$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init data
            $data = [
                'item_name' => trim($_POST['itemname']),
                'category' => trim($_POST['category']),
                'description' => trim($_POST['descriptions']),
                'price' => trim($_POST['price']),
                'itemtype'=> trim($_POST['itemtype'])
            ];

            // flash("formError", "Item name: ".$_FILES['file']['name'], 'form-message form-message-green');
            // redirect($GLOBALS['projectFolder']."/dashboard/addItem");
            //handle image path
            $imagePath = $this->saveImage($_FILES['file'], $data['itemtype']);

            if ($this->validateItem($data,$imagePath)) {

                // Validation successful, create an Item object
                $this->itemModel = new Item($data['item_name'], $data['category'], $data['description'], $data['price'], $imagePath);
    
                if ($this->itemModel->add($data['itemtype'])) {
                    flash("formSuccess", "Item added successfully", 'form-message form-message-green');
                    redirect($GLOBALS['projectFolder']."/dashboard/addItem");
                } else {
                    flash("formError", "Failed to add item to the database", 'form-message form-message-red');
                    redirect($GLOBALS['projectFolder']."/dashboard/additem");
                }
            } else {
                redirect($GLOBALS['projectFolder']."/dashboard/additem");
            }
        }
}