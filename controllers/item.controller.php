<?php
require_once 'models/Item.php';
require_once 'helpers/session.helper.php';
include 'projectFolderName.php';

class ItemController
{
    
    private $itemModel;
    private $errorMsg = "";
    public function __construct()
    {
    }

    public function validateItem($data)
    {
        $this->errorMsg = "";
        if (
            empty($data['itemtype']) || empty($data['item_name']) || empty($data['price'])
            || empty($data['category']) || empty($data['description'])
        ) {
            $this->errorMsg = "Please fill in all the fields";
            return false;
        }

        if (!is_string($data['item_name'])) {
            $this->errorMsg = "Invalid item name";
            return false;
        }

        if (!is_numeric($data['price']) || $data['price'] <= 0) {
            $this->errorMsg = "Invalid price";
            return false;
        }

        if (!is_string($data['category'])) {
            $this->errorMsg = "Invalid category";
            return false;
        }

        if (!is_string($data['description'])) {
            $this->errorMsg = "Invalid description";
            return false;
        }

        return true;
    }

    private function saveImage($file, $category)
    {
        $this->errorMsg = "";
        // Check if the file is set and not empty
        if (!isset($file) || empty($file)) {
            // File wasn't inputted in the form
            $this->errorMsg = "Please upload an image";
            return false;
        }

        $uploadDir = 'public/images/' . $category . '/';
        $imageFileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        // Generate a unique name for the image
        $imageName = uniqid('image_') . '.' . $imageFileType;
        $targetPath = $uploadDir . $imageName;

        // Create the category subfolder if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755);
        }

        // Move the uploaded file to the destination subfolder
        if (move_uploaded_file($file['tmp_name'], $targetPath))
            return $targetPath;
        else
            return false;
    }

    public function add()
    {
        //Init data
        $data = [
            'item_name' => trim($_POST['itemname']),
            'category' => trim($_POST['category']),
            'description' => trim($_POST['descriptions']),
            'price' => trim($_POST['price']),
            'itemtype' => trim($_POST['itemtype'])
        ];
		
        if (Item::findItemByName($data['item_name'], $data['itemtype'])) {
            flash("formSuccess", "Item name is already taken", 'form-message form-message-red');
            redirect($GLOBALS['projectFolder'] . "/dashboard/menu?action=additem");
            exit();
        }

        if ($this->validateItem($data)) {

            //handle image path
            $imagePath = $this->saveImage($_FILES['file'], $data['itemtype']);

            if (!$imagePath) {
                if ($this->errorMsg == "")
                    $this->errorMsg = "Failed to save image";
                flash("formError", $this->errorMsg, 'form-message form-message-red');
                redirect($GLOBALS['projectFolder'] . "/dashboard/menu?action=additem");
                exit();
            }


            // Validation successful, create an Item object
            $this->itemModel = new Item();

			$this->itemModel->setName($data['item_name']);
			$this->itemModel->setCategory($data['category']);
			$this->itemModel->setDescription($data['description']);
			$this->itemModel->setPrice($data['price']);
			$this->itemModel->setImagePath($imagePath);

            if ($this->itemModel->add($data['itemtype'])) {
                flash("formSuccess", "Item added successfully", 'form-message form-message-green');
                redirect($GLOBALS['projectFolder'] . "/dashboard/menu?action=additem");
                exit();
            }

            flash("formError", "Failed to add item to the database", 'form-message form-message-red');
            redirect($GLOBALS['projectFolder'] . "/dashboard/menu?action=additem");
            exit();
        }

        if ($_FILES['file']['size'] <= 0) {
            flash("formError", "Please upload an image", 'form-message form-message-red');
            redirect($GLOBALS['projectFolder'] . "/dashboard/menu?action=additem");
            exit();
        }

        flash("formError", $this->errorMsg, 'form-message form-message-red');
        redirect($GLOBALS['projectFolder'] . "/dashboard/menu?action=additem");
    }


    public function edit($itemType, $ID)
    {
        $itemType = strtolower($itemType);

        //Init data
        $data = [
            'item_name' => trim($_POST['itemname']),
            'category' => trim($_POST['category']),
            'description' => trim($_POST['descriptions']),
            'price' => trim($_POST['price']),
            'itemtype' => trim($_POST['itemtype'])
        ];



        if ($this->validateItem($data)) {

            //handle image path
            if ($_FILES['file']['size'] > 0){
                $imagePath = (Item::findItemByID($itemType, $ID))->ImagePath;
                unlink($imagePath);
                $imagePath = $this->saveImage($_FILES['file'], $data['itemtype']);
            
            }
            else
                // get the current image path from the database
                $imagePath = (Item::findItemByID($itemType, $ID))->ImagePath; // No image was uploaded so no need to update the image

            if (!$imagePath) {
                flash("formError", "Failed to save image", 'form-message form-message-red');
                redirect($GLOBALS['projectFolder'] . "/dashboard/menu?action=edititem&type=" . $itemType . '&id=' .  $ID);
                exit();
            }

            // Validation successful, create an Item object
            $this->itemModel = new Item();

			$this->itemModel->setName($data['item_name']);
			$this->itemModel->setCategory($data['category']);
			$this->itemModel->setDescription($data['description']);
			$this->itemModel->setPrice($data['price']);
			$this->itemModel->setImagePath($imagePath);

            if ($this->itemModel->edit($itemType, $ID)) {
                flash("formSuccess", "Item edited successfully", 'form-message form-message-green');
                redirect($GLOBALS['projectFolder'] . "/dashboard/menu?action=edititem&type=" . $itemType . '&id=' .  $ID);
                exit();
            }

            flash("formError", "Failed to edit item in the database", 'form-message form-message-red');
            redirect($GLOBALS['projectFolder'] . "/dashboard/menu?action=edititem&type=" . $itemType . '&id=' .  $ID);
            exit();
        }

        flash("formError", $this->errorMsg, 'form-message form-message-red');
        redirect($GLOBALS['projectFolder'] . "/dashboard/menu?action=edititem&type=" . $itemType . '&id=' .  $ID);
        exit();
    }



    public static function isItemType($itemType)
    {
        $itemType = strtolower($itemType);

        $itemTypes = array(
            "breakfast",
            "desserts",
            "drinks",
            "main",
            "sides"
        );

        if (in_array($itemType, $itemTypes))
            return true;
        else
            return false;
    }


    public static function doesExist($itemType, $itemID)
    {
        // Check if the item type is valid
        // Checking for example: 'breakfast', 'dinner' etc
        // $itemType is $segments[count($segments) - 2];

        if (!ItemController::isItemType($itemType))
            return false;

        // Check if the item exists
        // Checking for example: 'breakfast/1', 'dinner/2' etc
        // $itemID is $lastSegment;

        if (!Item::doesItemExist($itemType, intval($itemID)))
            return false;

        return true;
    }
    public function delete($itemType, $ID)
    {
        $itemType = strtolower($itemType);
            // get the current image path from the database
            $imagePath = (Item::findItemByID($itemType, $ID))->ImagePath; // No image was uploaded so no need to update the image
            // Validation successful, create an Item object
            $this->itemModel = new Item();

			//$this->itemModel->setImagePath($imagePath);

            if ($this->itemModel->delete($itemType, $ID)) {
                unlink($imagePath);
                flash("formSuccess", "Item deleted successfully", 'form-message form-message-green');
                redirect($GLOBALS['projectFolder'] . "/dashboard/menu");
                exit();
            }

        flash("formError", "Failed to delete item from the database", 'form-message form-message-red');
        redirect($GLOBALS['projectFolder'] . "/dashboard/menu");
        exit();
    }

    public static function getAjaxCategories(){
        $items=[];
        include 'controllers/menu.controller.php';
        // Instantiate the MenuController
        $menuController = new MenuController();

         // Handle AJAX request for categories
         if (isset($_POST['type'])) {
             switch ($_POST['type']) {
                 case 'breakfast':
                     $items = BreakfastItem::getBreakfastItems();
                     break;
                 case 'main':
                     $items = MainItem::getMainItems();
                     break;
                 case 'drinks':
                     $items = DrinkItem::getDrinkItems();
                     break;
                 case 'desserts':
                     $items = DessertItem::getDessertItems();
                     break;
                 case 'sides':
                     $items = SideItem::getSideItems();
                     break;
                 default:
                     http_response_code(400);
                     echo "Invalid item type";
                     exit;
             }
 
             // Check if $items is not false (indicating an error)
             if ($items === false) {
                 http_response_code(500);
                 echo "Error fetching items";
                 exit;
             }
 
             // Check if $items is an array
             if (!is_array($items)) {
                 http_response_code(500);
                 echo "Unexpected data format for items";
                 exit;
             }

             $uniqueCategories = !empty($items)? $menuController->extractUniqueCategories($items):[];
 
             // Check if $uniqueCategories is not false (indicating an error)
             if ($uniqueCategories === false) {
                 http_response_code(500);
                 echo "Error extracting unique categories";
                 exit;
             }
 
             // Return the categories as JSON
             $jsonResponse = json_encode($uniqueCategories);
 
             // Check for JSON encoding errors
             if ($jsonResponse === false) {
                 $jsonError = json_last_error_msg();
                 http_response_code(500);
                 echo "JSON encoding error: $jsonError";
                 exit;
             }
 
             echo $jsonResponse;
             exit;
         } else {
             http_response_code(400);
             echo "Type parameter is missing";
         }
    }

   

}
