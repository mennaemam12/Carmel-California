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

        public static function extractUniqueCategories($categoryItems) {
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
      
?>