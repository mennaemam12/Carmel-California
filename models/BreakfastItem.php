<?php
require_once 'database.php';
class BreakfastItem extends Item{
    public function __construct() {
        parent::__construct();
    }

    public static function getBreakfastItems(){
       
        $result = Item::getItems('breakfast');
        // Convert the result set into an array of BreakfastItem objects
        $breakfastItems = [];
        foreach ($result as $row) {
            $breakfastItem = new BreakfastItem();

            // Assuming you have setters for properties in BreakfastItem class
            $breakfastItem->setName($row->Name);
            $breakfastItem->setPrice($row->Price);
            $breakfastItem->setCategory($row->Category);
            $breakfastItem->setDescription($row->Description);
            $breakfastItem->setImagePath($row->ImagePath);

            $breakfastItems[] = $breakfastItem;
        }

        return $breakfastItems;

         
    }

}

?>