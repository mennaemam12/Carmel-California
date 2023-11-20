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
            $breakfastModel=new BreakfastItem;
            $mainModel=new MainItem;
            $drinkModel=new DrinkItem;
            $sideModel=new SideItem;

            $breakfastItems=$breakfastModel->getBreakfastItems();
            $mainItems=$mainModel->getMainItems();
            $drinkItems=$drinkModel->getDrinksItems();
            $sideItems=$sideModel->getSidesItems();

            // Extract unique categories for each set of items
            $breakfastCategories = $this->extractUniqueCategories($breakfastItems);
            $mainCategories = $this->extractUniqueCategories($mainItems);
            $drinkCategories = $this->extractUniqueCategories($drinkItems);
            $sideCategories = $this->extractUniqueCategories($sideItems);
            
            // Include the view file and pass the variables to it
            include_once '../views/menu.php';
        }

        private function extractUniqueCategories($categoryItems) {
            $uniqueCategories = [];
    
            foreach ($categoryItems as $item) {
                $category = $item->getCategory(); 
                if (!in_array($category, $uniqueCategories)) {
                    $uniqueCategories[] = $category;
                }
            }
    
            return $uniqueCategories;
        }


    }

?>