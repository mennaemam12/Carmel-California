<?php
require_once 'database.php';
class BreakfastItem extends Item{
    public function __construct($name, $category, $description, $price, $imagePath) {
        parent::__construct($name, $category, $description, $price, $imagePath);
    }

    public static function getBreakfastItems(){
       
        $result = Item::getItems('breakfast');
        if (!$result)
            return [];
        
        // Convert the result set into an array of BreakfastItem objects
        $breakfastItems = [];
        foreach ($result as $row) {
            $breakfastItem = new BreakfastItem($row->Name, $row->Category, $row->Description, $row->Price, $row->ImagePath);

            $breakfastItems[] = $breakfastItem;
        }

        return $breakfastItems;

         
    }

}

?>