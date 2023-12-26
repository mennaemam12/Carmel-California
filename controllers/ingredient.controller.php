<?php
require_once 'models/Ingredient.php';
require_once 'helpers/session.helper.php';


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
            $this->errorMsg = 'Please fill all inputs';
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
        $category = strtolower($category);
        $name = strtolower($name);

        $uploadDir = 'public/images/salad-ingredients/' . $category . '/';
//        $imageFileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $imageFileType = 'webp';

        $imageName = $name . '.' . $imageFileType;
        $targetPath = $uploadDir . $imageName;

        // Create the category subfolder if it doesn't exist
        if (!is_dir($uploadDir))
            mkdir($uploadDir, 0755);

        // Move the uploaded file to the destination subfolder
        if (move_uploaded_file($file['tmp_name'], $targetPath))
            return $targetPath;

        return false;

    }

    public function add()
    {
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Init data
        $data = [
            'ingredientname' => trim($_POST['ingredientname']),
            'category' => trim($_POST['category']),
            'categorymax' => trim($_POST['categorymax']),
            'price' => trim($_POST['price']),
            'image' => $_FILES['file']
        ];

        if (Ingredient::findIngredientByName($data['ingredientname'])) {
            flash("formError", "Ingredient with the same name already exists", 'form-message form-message-red');
            redirect("/dashboard/menu?action=addingredient");
            exit();
        }

        if ($this->validateItem($data)) {
            $imagePath = $this->saveImage($_FILES['file'], $data['category'], $data['ingredientname']);

            if (!$imagePath) {
                flash("ImageError", 'form-message form-message-red');
                redirect("/dashboard/menu?action=addingredient");
                exit();
            }

            // Validation successful, create an Ingredient object
            $this->ingredientModel = new Ingredient(null,$data['ingredientname'], $data['category'], $data['categorymax'], $data['price'], $imagePath);

            if ($this->ingredientModel->add()) {
                flash("formSuccess", "Ingredient added successfully", 'form-message form-message-green');
                redirect("/dashboard/menu?action=addingredient");
                exit();
            }
            flash("formError", "Failed to add ingredient to the database", 'form-message form-message-red');
            redirect("/dashboard/menu?action=addingredient");
            exit();
        }

        flash("formError", $this->errorMsg, 'form-message form-message-red');
        redirect("/dashboard/menu?action=addingredient");
    }

    public function getSections()
    {
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
        include 'views/customize_salad.php';
    }


    public static function getAjaxTotal()
    {
        $json_data = file_get_contents("php://input");

        $order = json_decode($json_data, true);

        $orderObjects = array();

        $baseTotal = 0;
        $baseChoice = (!empty($order['base'])) ? $order['base'] : '';
        $base = '';
        $baseChoice = trim($baseChoice);
        if ($baseChoice != '') {
            switch ($baseChoice) {
                case 'Lettuce':
                    include 'design-patterns/Lettuce.php';
                    $base = new Lettuce();
                    $orderObjects[] = $base;
                    break;
                case 'Arugula':
                    include_once 'design-patterns/Arugula.php';
                    $base = new Arugula();
                    $orderObjects[] = $base;
                    break;
                case 'Mix Greens':
                    include 'design-patterns/MixGreens.php';
                    $base = new MixGreens();
                    $orderObjects[] = $base;
                    break;
                case 'Baby Rocca':
                    include 'design-patterns/BabyRocca.php';
                    $base = new BabyRocca();
                    $orderObjects[] = $base;
                    break;
                case 'Coriander':
                    include 'design-patterns/Coriander.php';
                    $base = new Coriander();
                    $orderObjects[] = $base;
                    break;
                default:
                    include_once 'design-patterns/AddedBase.php';
                    $added = new AddedBase($baseChoice);
                    $orderObjects[] = $added;
                    break;
            }
        }


        $toppings = $order['topping'];
        if (!empty($toppings)) {
            $toppings = explode(',', $order['topping']);
            foreach ($toppings as $toppingChoice):
                switch ($toppingChoice) {
                    case 'Onions':
                        include 'design-patterns/Onions.php';
                        $onions = new Onions($base);
                        $orderObjects[] = $onions;
                        break;
                    case 'Red Beans':
                        include 'design-patterns/RedBeans.php';
                        $redbeans = new RedBeans($base);
                        $orderObjects[] = $redbeans;
                        break;
                    case 'Cherry Tomato':
                        include 'design-patterns/CherryTomato.php';
                        $cherrytom = new CherryTomato($base);
                        $orderObjects[] = $cherrytom;
                        break;
                    case 'Pepper':
                        include 'design-patterns/Pepper.php';
                        $pepper = new Pepper($base);
                        $orderObjects[] = $pepper;
                        break;
                    default:
                        include 'design-patterns/AddedDecorator.php';
                        $added = new AddedDecorator($base, $toppingChoice);
                        $orderObjects[] = $added;
                        break;
                }
            endforeach;
        }

        $proteins = $order['protein'];
        if (!empty($proteins)) {
            $proteins = explode(',', $order['protein']);
            foreach ($proteins as $proteinChoice):
                switch ($proteinChoice) {
                    case 'Grilled Chicken':
                        include 'design-patterns/GrilledChicken.php';
                        $chick = new GrilledChicken($base);
                        $orderObjects[] = $chick;
                        break;
                    case 'Grilled Turkey':
                        include 'design-patterns/GrilledTurkey.php';
                        $turkey = new GrilledChicken($base);
                        $orderObjects[] = $turkey;
                        break;
                    case 'Grilled Shrimp':
                        include 'design-patterns/GrilledShrimp.php';
                        $shrimp = new GrilledShrimp($base);
                        $orderObjects[] = $shrimp;
                        break;
                    default:
                        include 'design-patterns/AddedDecorator.php';
                        $added = new AddedDecorator($base, $proteinChoice);
                        $orderObjects[] = $added;
                        break;
                }
            endforeach;
        }

        $dressingChoice = (!empty($order['dressing'])) ? $order['dressing'] : '';
        if ($dressingChoice != '') {
            switch ($dressingChoice) {
                case 'Balsamic':
                    include 'design-patterns/Balsamic.php';
                    $dressing = new Balsamic($base);
                    $orderObjects[] = $dressing;
                    break;
                case 'Lemon Mustard':
                    include 'design-patterns/LemonMustard.php';
                    $dressing = new LemonMustard($base);
                    $orderObjects[] = $dressing;
                    break;
                case 'Thai Ranch':
                    include 'design-patterns/ThaiRanch.php';
                    $dressing = new ThaiRanch($base);
                    $orderObjects[] = $dressing;
                    break;
                default:
                    include 'design-patterns/AddedDecorator.php';
                    $added = new AddedDecorator($base, $proteinChoice);
                    $orderObjects[] = $added;
                    break;
            }
        }


        $total = 0;
        foreach ($orderObjects as $item) {
            $total += $item->getPrice();
        }

        echo $total;

    }

    public static function getSaladItemInfo() {

        $json_data = file_get_contents("php://input");
        $id = json_decode($json_data, true);

        $item = Ingredient::findIngredientByID($id);

        $response = array(
            'name' => $item->getName(),
            'category' => strtolower($item->getCategory()),
            'price' => $item->getPrice(),
            'max' => $item->getCategoryMax(),
        );

        echo json_encode($response);
        exit();
    }


}