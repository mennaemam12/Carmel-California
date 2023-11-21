<?php
class SideItem extends Item{

    public function __construct() {
        parent::__construct();
    }

    public function getSideItems(){
        $sideItems = [];
         $this->db->query('SELECT * FROM sides');
         $result=$this->db->resultSet();
            
            // Convert the result set into an array of SideItem objects 
            foreach ($result as $row) {
                    $sideItem = new SideItem();

                    // Assuming you have setters for properties in SideItem class
                    $sideItem->setName($row->Name);
                    $sideItem->setPrice($row->Price);
                    $sideItem->setCategory($row->Category);
                    $sideItem->setDescription($row->Description);
                    $sideItem->setImagePath($row->ImagePath);

                    $sideItems[] = $sideItem;
            }
        

        return $sideItems;
    }
}

?>