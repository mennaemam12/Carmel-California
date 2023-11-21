<?php
class DessertItem extends Item{

    public function __construct() {
        parent::__construct();
    }

    public function getDessertItems(){
        $dessertItems = [];
        $this->db->query('SELECT * FROM desserts');
            $result=$this->db->resultSet();
            
            // Convert the result set into an array of dessertItem objects
            foreach ($result as $row) {
                $dessertItem = new dessertItem();

                // Assuming you have setters for properties in dessertItem class
                $dessertItem->setName($row->Name);
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