//fetch.php
<?php
  include_once 'database.php';
  include_once 'controllers/menu.controller.php';
  include_once 'models/DrinkItem.php';
  include_once 'models/MainItem.php';
  include_once 'models/SideItem.php';
  include_once 'models/DessertItem.php';
  include_once 'models/BreakfastItem.php';


  

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    if (isset($_POST['type'])) {
        // check type value 
        if($_POST['type'] === 'drinks'){
            $drinkItems= DrinkItem::getDrinkItems();
            $menuController = new MenuController();
            $uniqueCategories = $menuController->extractUniqueCategories($drinkItems);
        }
        else if ($_POST['type'] === 'main'){
            $mainItems= MainItem::getMainItems();
            $menuController = new MenuController();
            $uniqueCategories = $menuController->extractUniqueCategories($mainItems);
        }
        else if ($_POST['type'] === 'sides'){
            $sideItems= SideItem::getSideItems();
            $menuController = new MenuController();
            $uniqueCategories = $menuController->extractUniqueCategories($sideItems);
        }
        else if ($_POST['type'] === 'dessert'){
            $dessertItems= DessertItem::getDessertItems();
            $menuController = new MenuController();
            $uniqueCategories = $menuController->extractUniqueCategories($dessertItems);
        }
        else if ($_POST['type'] === 'breakfast'){
            $breakfastItems= BreakfastItem::getBreakfastItems();
            $menuController = new MenuController();
            $uniqueCategories = $menuController->extractUniqueCategories($breakfastItems);
        }
        else{
            echo "Invalid request"; // Handle the case when 'type' is not set in POST data
        }
        var_dump("in var->".$uniqueCategories[0]);

        $out = '';
        // foreach ($uniqueCategories as $category) {  
        //     echo "in tags"; 
        //     $out .=  '<option>' . $category . '</option>'; 
        // }
        // echo $out;
        foreach ($uniqueCategories as $category) {
            if (is_string($category)) {
                // If $category is a string, create the option tag
                echo "in category as a string";
                $out .= '<option value="' . $category . '">' . $category . '</option>';
                echo $out;
            } elseif (is_array($category)) {
                // If $category is an array, you might handle it differently
                // For example, extract the values and concatenate them
                echo "in category as an array";
                $out .= '<option value="' . implode('-', $category) . '">' . implode('-', $category) . '</option>';
            }
            // You can add more conditions or handling based on your data structure
        }
    } else {
        echo "Invalid request"; // Handle the case when 'type' is not set in POST data
    }
}
?>