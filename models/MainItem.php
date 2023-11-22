<?php
class MainItem extends Item{

    public function __construct($name, $category, $description, $price, $imagePath) {
        parent::__construct($name, $category, $description, $price, $imagePath);
    }
    public static function getMainItems(){
        $result = Item::getItems('main');
        if (!$result)
            return [];
        
        $mainItems = [];

        // Convert the result set into an array of MainItem objects
        foreach ($result as $row) {
            $mainItem = new MainItem($row->Name, $row->Category, $row->Description, $row->Price, $row->ImagePath);

            $mainItems[] = $mainItem;
        }

       return $mainItems;
    }
}

?>