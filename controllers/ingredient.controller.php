<?php
require_once 'models/Ingredient.php';
require_once 'helpers/session.helper.php';
include 'projectFolderName.php';

class IngredientController
{

    private $ingredientModel;

    public function __construct()
    {

    }

    public function validateItem($data, $imagePath)
    {
        if (empty($data['ingredientname']) || empty($data['category']) || empty($data['price'])) {
            flash("formError", "Please fill out all inputs");
            redirect($GLOBALS['projectFolder'] . "/dashboard/addingredient");
            return false;
        }

        if (!is_string($data['ingredientname'])) {
            flash("formError", "Invalid ingredient name");
            redirect($GLOBALS['projectFolder'] . "/dashboard/addingredient");
            return false;
        }

        if (!is_numeric($data['price']) || $data['price'] <= 0) {
            flash("formError", "Invalid price");
            redirect($GLOBALS['projectFolder'] . "/dashboard/addingredient");
            return false;
        }

        if (!is_string($data['category'])) {
            flash("formError", "Invalid category");
            redirect($GLOBALS['projectFolder'] . "/dashboard/addingredient");
            return false;
        }

        if (!$imagePath) {
            flash("formError", "Failed to save image", 'form-message form-message-red');
            redirect($GLOBALS['projectFolder'] . "/dashboard/addingredient");
            return false;
        }

        return true;
    }

    private function saveImage($file, $category, $name)
    {
        $uploadDir = 'public/images/salad-ingredients/'. $category . '/';
        $imageFileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        // Generate a unique name for the image
        $imageName = $name . '.' . $imageFileType;
        $targetPath = $uploadDir . $imageName;

        // Create the category subfolder if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755);
        }

        // Move the uploaded file to the destination subfolder
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            return $targetPath;
        } else {
            //flash("formError", "Failed to save the image in path ", 'form-message form-message-red');
            //redirect($GLOBALS['projectFolder']."/dashboard/additem");
            return false;
        }
    }

    public function add()
    {
        //Sanitize POST data
        //$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Init data
        $data = [
            'ingredientname' => trim($_POST['ingredientname']),
            'category' => trim($_POST['category']),
            'price' => trim($_POST['price']),
        ];

        // flash("formError", "Item name: ".$_FILES['file']['name'], 'form-message form-message-green');
        // redirect($GLOBALS['projectFolder']."/dashboard/addItem");
        //handle image path
        $imagePath = $this->saveImage($_FILES['file'], $data['category'], $data['ingredientname']);

        if ($this->validateItem($data, $imagePath)) {

            // Validation successful, create an Item object
            $this->ingredientModel = new Ingredient($data['ingredientname'], $data['category'], $data['price'], $imagePath);

            if ($this->ingredientModel->add()) {
                flash("formSuccess", "Ingredient added successfully", 'form-message form-message-green');
                redirect($GLOBALS['projectFolder'] . "/dashboard/addingredient");
            } else {
                flash("formError", "Failed to add ingredient to the database", 'form-message form-message-red');
                redirect($GLOBALS['projectFolder'] . "/dashboard/addingredient");
            }
        } else {
            redirect($GLOBALS['projectFolder'] . "/dashboard/addingredient");
        }
    }
}