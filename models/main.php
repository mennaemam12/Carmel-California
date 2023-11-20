<?php
class MainItem extends Item{

    public function getMainItems(){
         $this->db->query('SELECT * FROM main');
         $result=$this->db->resultSet();
         // Convert the result set into an array of MainItem objects
         $mainItems = [];
         foreach ($result as $row) {
            $mainItem = new MainItem();

            // Assuming you have setters for properties in MainItem class
            $mainItem->setItemName($row->Name);
            $mainItem->setPrice($row->Price);
            $mainItem->setCategory($row->Category);
            $mainItem->setDescription($row->Description);
            $mainItem->setImagePath($row->ImagePath);

            $mainItems[] = $mainItem;
       }

       return $mainItems;
    }
}

?>