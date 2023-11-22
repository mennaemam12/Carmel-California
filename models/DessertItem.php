<?php
class DessertItem extends Item{

    public function __construct($name, $category, $description, $price, $imagePath) {
        parent::__construct($name, $category, $description, $price, $imagePath);
    }

    public static function getDessertItems(){
        $result = Item::getItems('desserts');
        if (!$result)
            return [];

        $dessertItems = [];
        // Convert the result set into an array of dessertItem objects
        foreach ($result as $row) {
            $dessertItem = new DessertItem($row->Name, $row->Category, $row->Description, $row->Price, $row->ImagePath);

            $dessertItems[] = $dessertItem;
        }

       return $dessertItems;
    }
}

?>