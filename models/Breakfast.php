<?php
class BreakfastItem extends Item{

    public function getBreakfastItems(){
         $this->db->query('SELECT * FROM breakfast');
         $result=$this->db->resultSet();
          // Convert the result set into an array of BreakfastItem objects
        $breakfastItems = [];
        foreach ($result as $row) {
            $breakfastItem = new BreakfastItem();

            // Assuming you have setters for properties in BreakfastItem class
            $breakfastItem->setItemName($row->Name);
            $breakfastItem->setPrice($row->Price);
            $breakfastItem->setCategory($row->Category);
            $breakfastItem->setDescription($row->Description);
            $breakfastItem->setImagePath($row->ImagePath);

            $breakfastItems[] = $breakfastItem;
        }

        return $breakfastItems;
    }

}

?>