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
            // $breakfastModel=new BreakfastItem;
            // $mainModel=new MainItem;
            // $drinkModel=new DrinkItem;
            // $sideModel=new SideItem;
            // $dessertModel=new DessertItem;

			// $breakfastItems = $breakfastModel->getBreakfastItems();
			// $mainItems = $mainModel->getMainItems();
			// $drinkItems = $drinkModel->getBreakfastItems();
			// $sideItems = $sideModel->getSideItems();
			// $dessertItems = $dessertModel->getDessertItems();

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

?>