<?php
class MainItem extends Item{

    public function __construct() {
        parent::__construct();
    }

    public static function getMainItems(){
       
        $result = Item::getItems('main');
        if (!$result)
            return [];
        
        // Convert the result set into an array of objects
        $items = [];
        foreach ($result as $row) {
            $item = new MainItem;
			
            $item->setID($row->id);
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