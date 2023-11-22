<?php
require_once 'database.php';
require_once 'models/BreakfastItem.php';
require_once 'models/DrinkItem.php';
require_once 'models/MainItem.php';
require_once 'models/SideItem.php';
require_once 'models/DessertItem.php';
class Item {

    protected $db;
    protected $name;
    protected $category;
    protected $description;
    protected $price;
    protected $imagePath;
    
    public function __construct($name, $category, $description, $price, $imagePath) {
        $this->db = new Database;
        $this->name = $name;
        $this->category = $category;
        $this->description = $description;
        $this->price = $price;
        $this->imagePath = $imagePath;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setImagePath($imagePath) {
        $this->imagePath=$imagePath;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getImagePath()
    {
        return $this->imagePath;
    }

    public function findItemByName($itemName, $itemType)
    {
        $itemType = strtolower($itemType);

        $this->db->query('SELECT * FROM ' . $itemType . ' WHERE Name = :itemname');
        $this->db->bind(':itemname', $itemName);
        $row = $this->db->single();

        //Check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public static function findItemByID($itemType, $id)
    {
        $db = new Database;
        $itemType = strtolower($itemType);

        $db->query('SELECT * FROM ' . $itemType . ' WHERE id = :id');
        $db->bind(':id', $id);
        $result = $db->single();

        //Check row
        if ($db->rowCount() > 0)
            return $result;
        else
            return false;
    }

    public function getItemData($itemType, $ID)
    {
        $itemType = strtolower($itemType);
        $this->db->query('SELECT * FROM ' . $itemType);

        $rows = $this->db->resultSet();
        if ($this->db->rowCount() > 0) {
            return $rows;
        } else {
            return false;
        }
    }
    public static function getAllItems()
    {
        $db = new Database;
        $db->query('SELECT *, "breakfast" AS itemType FROM breakfast 
                    UNION SELECT *, "main" AS itemType FROM main 
                    UNION SELECT *, "drinks" AS itemType FROM drinks 
                    UNION SELECT *, "sides" AS itemType FROM sides 
                    UNION SELECT *, "desserts" AS itemType FROM desserts');
        $rows = $db->resultSet();

        if ($db->rowCount() > 0)
            return $rows;
        else
            return false;
    }


    public static function getItems($itemType)
    {
        $itemType = strtolower($itemType);
        $db = new Database;

        $db->query('SELECT * FROM ' . $itemType);
        $rows = $db->resultSet();
        if ($db->rowCount() > 0) {
            return $rows;
        } else {
            return false;
        }
    }

    public function add($item_type) {
      
        
        $this->db->query('INSERT INTO ' . $item_type . ' (Name, Category, Description, Price, ImagePath) 
            VALUES (:item_name, :category, :description, :price, :image_path)');
    
        $this->db->bind(':item_name', $this->name);
        $this->db->bind(':price', $this->price);
        $this->db->bind(':category', $this->category);
        $this->db->bind(':description', $this->description);
        $this->db->bind(':image_path', $this->imagePath);
    
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Update item
    public function edit($itemType, $ID)
    {
        $itemType = strtolower($itemType);

        $this->db->query('UPDATE ' . $itemType . ' SET Name=:item_name ,Category=:category ,Description=:description ,Price=:price, ImagePath=:image_path WHERE id=:id');
        $this->db->bind(':id', $ID);
        $this->db->bind(':item_name',  $this->getName());
        $this->db->bind(':price', $this->getPrice());
        $this->db->bind(':category',$this->getCategory());
        $this->db->bind(':description',$this->getDescription());
        $this->db->bind(':image_path',  $this->getImagePath());

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public static function doesItemExist($itemType, $ID)
    {
        $itemType = strtolower($itemType);
        $db = new Database;

        $db->query('SELECT * FROM ' . $itemType . ' WHERE id = :id');
        $db->bind(':id', $ID);

        $result = $db->single();

        // returns true if rowCount() > 0
        return $db->rowCount() > 0;
    }
}
