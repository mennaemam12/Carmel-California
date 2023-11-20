<?php
class DrinkItem extends Item{

    public function getDrinksItems(){
         $this->db->query('SELECT * FROM drinks');
         $result=$this->db->resultSet();
         // Convert the result set into an array of DrinkItem objects
         $drinkItems = [];
         foreach ($result as $row) {
            $drinkItem = new DrinkItem();

            // Assuming you have setters for properties in DrinkItem class
            $drinkItem->setItemName($row->Name);
            $drinkItem->setPrice($row->Price);
            $drinkItem->setCategory($row->Category);
            $drinkItem->setDescription($row->Description);
            $drinkItem->setImagePath($row->ImagePath);

            $drinkItems[] = $drinkItem;
       }

       return $drinkItems;
    }
}

?>