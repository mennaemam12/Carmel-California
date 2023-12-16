<?php
require_once 'models/Ingredient.php';
require_once 'helpers/session.helper.php';
include 'projectFolderName.php';

class IngredientController
{

    private $ingredientModel;

    private $errorMsg;

    public function __construct()
    {

    }

    public function validateItem($data)
    {
        if (empty($data['ingredientname']) || empty($data['category']) || empty($data['price'])) {
            $this->errorMsg ='Please fill all inputs';
            return false;
        }

        if (!ctype_alpha($data['ingredientname'])) {
            $this->errorMsg = 'Ingredient Name is invalid.';
            return false;
        }

        if (!is_numeric($data['price']) || $data['price'] <= 0) {
            $this->errorMsg = 'Price is invalid.';
            return false;
        }

        if (!ctype_alpha($data['category'])) {
            $this->errorMsg = 'Category is invalid.';
            return false;
        }

        if (!is_numeric($data['categorymax'])) {
            $this->errorMsg = 'Category Max is invalid.';
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
            'categorymax' => trim($_POST['categorymax']),
            'price' => trim($_POST['price']),
        ];

        if(Ingredient::findIngredientByName($data['ingredientname'])) {
            flash("formError", "Ingredient with the same name already exists", 'form-message form-message-red');
            redirect($GLOBALS['projectFolder']."/dashboard/additem");
            exit();
        }

        if ($this->validateItem($data)) {
            $imagePath = $this->saveImage($_FILES['file'], $data['category'], $data['ingredientname']);

            if(!$imagePath) {
                flash("ImageError",'form-message form-message-red');
                redirect($GLOBALS['projectFolder']."/dashboard/addingredient");
                exit();
            }

            // Validation successful, create an Item object
            $this->ingredientModel = new Ingredient($data['ingredientname'], $data['category'],$data['categorymax'], $data['price'], $imagePath);

            if ($this->ingredientModel->add()) {
                flash("formSuccess", "Ingredient added successfully", 'form-message form-message-green');
                redirect($GLOBALS['projectFolder'] . "/dashboard/addingredient");
                exit();
            } else {
                flash("formError", "Failed to add ingredient to the database", 'form-message form-message-red');
                redirect($GLOBALS['projectFolder'] . "/dashboard/addingredient");
                exit();
            }
        }

        flash("formError", $this->errorMsg, 'form-message form-message-red');
        redirect($GLOBALS['projectFolder']."/dashboard/addingredient");
        
        
    }

    public function getSections(){
        $ing = new Ingredient();
        $ingredients = $ing->getIngredients();
        $bases = array();
        $proteins = array();
        $addons = array();
        $dressings = array();
        $toppings = array();
        $cheeses = array();
        $fruits = array();
        foreach ($ingredients as $ingredient) {
            $category = $ingredient->Category;
            switch ($category) {
                case 'Base':
                    $bases[] = $ingredient;
                    break;
                case 'Topping':
                    $toppings[] = $ingredient;
                    break;
                case 'Protein':
                    $proteins[] = $ingredient;
                    break;
                case 'Dressing':
                    $dressings[] = $ingredient;
                    break;
                case 'Fruit':
                    $fruits[] = $ingredient;
                    break;
                case 'Add Ons':
                    $addons[] = $ingredient;
                    break;
                case 'Cheese':
                    $cheeses[] = $ingredient;
                    break;
            }
        }
        $counter = 1;
        $items = array();
        include_once('views/customize.php');
    }
}