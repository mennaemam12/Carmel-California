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

    public function validateItem($data, $imagePath)
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

        if (!$imagePath) {
            $this->errorMsg = "Invalid image// Failed to save image";
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

        $this->itemModel = new Item($data['item_name'], $data['category'], $data['description'], $data['price'], "");

        if ($this->itemModel->findItemByName($data['item_name'], $data['itemtype'])) {
            flash("formSuccess", "Item name already taken", 'form-message form-message-red');
            redirect($GLOBALS['projectFolder'] . "/dashboard/additem");
            exit();
        }

        //handle image path
        $imagePath = $this->saveImage($_FILES['file'], $data['itemtype']);

        if (!$imagePath) {
            if ($this->errorMsg == "")
                $this->errorMsg = "Failed to save image";
            flash("formError", $this->errorMsg, 'form-message form-message-red');
            redirect($GLOBALS['projectFolder'] . "/dashboard/additem");
            exit();
        }

        if ($this->validateItem($data, $imagePath)) {

            // Validation successful, create an Item object
            $this->itemModel = new Item($data['item_name'], $data['category'], $data['description'], $data['price'], $imagePath);

            if ($this->itemModel->add($data['itemtype'])) {
                flash("formSuccess", "Item added successfully", 'form-message form-message-green');
                redirect($GLOBALS['projectFolder'] . "/dashboard/additem");
                exit();
            }

            flash("formError", "Failed to add item to the database", 'form-message form-message-red');
            redirect($GLOBALS['projectFolder'] . "/dashboard/additem");
            exit();
        }

        flash("formError", $this->errorMsg, 'form-message form-message-red');
        redirect($GLOBALS['projectFolder'] . "/dashboard/additem");
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

        //handle image path
        if ($_FILES['file']['size'] > 0)
            $imagePath = $this->saveImage($_FILES['file'], $data['itemtype']);
        else
            // get the current image path from the database
            $imagePath = (Item::findItemByID($itemType, $ID))->ImagePath; // No image was uploaded so no need to update the image

        if (!$imagePath) {
            flash("formError", "Failed to save image", 'form-message form-message-red');
            redirect($GLOBALS['projectFolder'] . "/dashboard/edititem/" . $itemType . '/' .  $ID);
            exit();
        }

        if ($this->validateItem($data, $imagePath)) {

            // Validation successful, create an Item object
            $this->itemModel = new Item($data['item_name'], $data['category'], $data['description'], $data['price'], $imagePath);

            if ($this->itemModel->edit($itemType, $ID)) {
                flash("formSuccess", "Item edited successfully", 'form-message form-message-green');
                redirect($GLOBALS['projectFolder'] . "/dashboard/edititem/" . $itemType . '/' .  $ID);
                exit();
            }

            flash("formError", "Failed to edit item in the database", 'form-message form-message-red');
            redirect($GLOBALS['projectFolder'] . "/dashboard/edititem/" . $itemType . '/' .  $ID);
            exit();
        }

        flash("formError", $this->errorMsg, 'form-message form-message-red');
        redirect($GLOBALS['projectFolder'] . "/dashboard/edititem/" . $itemType . '/' .  $ID);
        exit();
    }

    public static function isItemType($itemType)
    {
        $itemType = strtolower($itemType);

        $itemTypes = array(
            "breakfast",
            "dinner",
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
}
