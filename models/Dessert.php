<?php
class DessertItem extends Item{

    public function getDessertItems(){
         $this->db->query('SELECT * FROM desserts');
         $result=$this->db->resultSet();
         // Convert the result set into an array of dessertItem objects
         $dessertItems = [];
         foreach ($result as $row) {
            $dessertItem = new dessertItem();

            // Assuming you have setters for properties in dessertItem class
            $dessertItem->setItemName($row->Name);
            $dessertItem->setPrice($row->Price);
            $dessertItem->setCategory($row->Category);
            $dessertItem->setDescription($row->Description);
            $dessertItem->setImagePath($row->ImagePath);

            $dessertItems[] = $dessertItem;
       }

       return $dessertItems;
    }
}

?>