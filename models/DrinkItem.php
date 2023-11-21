<?php
class DrinkItem extends Item{

    public function __construct() {
        parent::__construct();
    }

    public function getDrinkItems(){
        $drinkItems = [];
        $this->db->query('SELECT * FROM drinks');
            $result=$this->db->resultSet();
            
            // Convert the result set into an array of DrinkItem objects
            foreach ($result as $row) {
                $drinkItem = new DrinkItem();

                // Assuming you have setters for properties in DrinkItem class
                $drinkItem->setName($row->Name);
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