<?php
class DrinkItem extends Item{

    public function __construct() {
        parent::__construct();
    }

    public static function getDrinkItems(){
       
        $result = Item::getItems('drinks');
        if (!$result)
            return [];
        
        // Convert the result set into an array of objects
        $items = [];
        foreach ($result as $row) {
            $item = new DrinkItem;
			
			$item->setName($row->Name);
			$item->setCategory($row->Category);
			$item->setDescription($row->Description);
			$item->setPrice($row->Price);
			$item->setImagePath($row->ImagePath);
			
            $items[] = $item;
        }

        return $items;
    }
}

?>