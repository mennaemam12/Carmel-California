<?php
class DrinkItem extends Item{

    public function __construct($name, $category, $description, $price, $imagePath) {
        parent::__construct($name, $category, $description, $price, $imagePath);
    }

    public static function getDrinkItems(){

        $result = Item::getItems('drinks');
        if (!$result)
            return [];
        
        $drinkItems = [];
            
            // Convert the result set into an array of DrinkItem objects
            foreach ($result as $row) {
                $drinkItem = new DrinkItem($row->Name, $row->Category, $row->Description, $row->Price, $row->ImagePath);

                $drinkItems[] = $drinkItem;
            
            }

       return $drinkItems;
    }
}

?>