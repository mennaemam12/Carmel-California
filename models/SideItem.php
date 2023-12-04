<?php
class SideItem extends Item{

    public function __construct() {
        parent::__construct();
    }

    public static function getSideItems(){
       
        $result = Item::getItems('sides');
        if (!$result)
            return [];
        
        // Convert the result set into an array of objects
        $items = [];
        foreach ($result as $row) {
            $item = new SideItem;
			
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