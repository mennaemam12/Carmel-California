<?php
class SideItem extends Item{

    public function __construct($name, $category, $description, $price, $imagePath) {
        parent::__construct($name, $category, $description, $price, $imagePath);
    }

    public static function getSideItems(){
        $result = Item::getItems('sides');
        if (!$result)
            return [];
        $sideItems = [];
         
            
            // Convert the result set into an array of SideItem objects 
            foreach ($result as $row) {
                    $sideItem = new SideItem($row->Name, $row->Category, $row->Description, $row->Price, $row->ImagePath);

                    $sideItems[] = $sideItem;
            }
        

        return $sideItems;
    }
}

?>