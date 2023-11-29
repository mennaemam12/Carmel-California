<?php
    require_once 'models/Item.php';
    require_once 'helpers/session.helper.php';
    include 'projectFolderName.php';

    class MenuController{
        private $itemModel;
        private $breakfastModel;
        private $mainModel;
        private $drinkModel;
        private $sideModel;

        public function __construct(){
        }

        public function getMenu(){
            

            $breakfastItems= BreakfastItem::getBreakfastItems();
            $mainItems= MainItem::getMainItems();
            $drinkItems= DrinkItem::getDrinkItems();
            $sideItems= SideItem::getSideItems();
            $dessertItems= DessertItem::getDessertItems();

             
            // Extract unique categories for each set of items
            $breakfastCategories = !empty($breakfastItems) ? $this->extractUniqueCategories($breakfastItems) : [];
            $mainCategories = !empty($mainItems) ? $this->extractUniqueCategories($mainItems) : [];
            $drinkCategories = !empty($drinkItems) ? $this->extractUniqueCategories($drinkItems) : [];
            $sideCategories = !empty($sideItems) ? $this->extractUniqueCategories($sideItems) : [];
            $dessertCategories = !empty($dessertItems) ? $this->extractUniqueCategories($dessertItems) : [];
            
            // Include the view file and pass the variables to it
            include_once 'views/menu.php';
           
            
        }

        public function extractUniqueCategories($categoryItems) {
            $uniqueCategories = [];
    
            foreach ($categoryItems as $item) {
                $category = $item->getCategory(); 
                if (!in_array($category, $uniqueCategories)) {
                    $uniqueCategories[] = $category;
                }
            }
            return $uniqueCategories;
            //include_once 'views/dashboard/discount.php';
        }


    }


        // Instantiate the MenuController
        $menuController = new MenuController();
        // Check if the request is an AJAX request
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["action"])) {
            if ($_GET["action"] == "getCategories") {
                // Handle AJAX request for categories
                if (isset($_GET['type'])) {
                    switch ($_GET['type']) {
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
                            $items = DessertItem::getDessertsItems();
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
        
                    $uniqueCategories = $menuController->extractUniqueCategories($items);
        
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
                } else {
                    http_response_code(400);
                    echo "Type parameter is missing";
                }
            } else {
                http_response_code(400);
                echo "Invalid action parameter";
            }
        } else {
            // If it's not an AJAX request, render the menu
            $menuController->getMenu();
        }
        include_once 'views/dashboard/addItemOption.php';
?>