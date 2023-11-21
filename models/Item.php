<?php
require_once 'database.php';
require_once 'models/Breakfast.php';
require_once 'models/Drinks.php';
require_once 'models/main.php';
require_once 'models/Dinner.php';
require_once 'models/Sides.php';
class Item
{

    private $db;
    protected $name;
    protected $category;
    protected $description;
    protected $price;
    protected $imagePath;

    public function __construct($name, $category, $description, $price, $imagePath)
    {
        $this->db = new Database;
        $this->name = $name;
        $this->category = $category;
        $this->description = $description;
        $this->price = $price;
        $this->imagePath = $imagePath;
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

    public static function findItemByID($id, $itemType)
    {
        $db = new Database;
        $itemType = strtolower($itemType);

        $db->query('SELECT * FROM ' . $itemType . ' WHERE id = :id');
        $db->bind(':id', $id);
        $result = $db->single();

        //Check row
        if ($db->rowCount() > 0) {
            return $result;
        } else {
            return false;
        }
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
    public function add($itemType)
    {
        $itemType = strtolower($itemType);

        switch ($itemType) {
            case 'breakfast':
                $item = new BreakfastItem($this->name, $this->category, $this->description, $this->price, $this->imagePath);
                break;
            case 'main':
                $item = new MainItem($this->name, $this->category, $this->description, $this->price, $this->imagePath);
                break;
            case 'drinks':
                $item = new DrinkItem($this->name, $this->category, $this->description, $this->price, $this->imagePath);
                break;
            case 'sides':
                $item = new SideItem($this->name, $this->category, $this->description, $this->price, $this->imagePath);
                break;
            case 'dinner':
                $item = new DinnerItem($this->name, $this->category, $this->description, $this->price, $this->imagePath);
                break;
            default:
                return false;
        }

        $this->db->query('INSERT INTO ' . $itemType . ' (Name, Category, Description, Price, ImagePath) 
            VALUES (:item_name, :category, :description, :price, :image_path)');

        $this->db->bind(':item_name', $item->getName());
        $this->db->bind(':price', $item->getPrice());
        $this->db->bind(':category', $item->getCategory());
        $this->db->bind(':description', $item->getDescription());
        $this->db->bind(':image_path', $item->getImagePath());

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

        switch ($itemType) {
            case 'breakfast':
                $item = new BreakfastItem($this->name, $this->category, $this->description, $this->price, $this->imagePath);
                break;
            case 'main':
                $item = new MainItem($this->name, $this->category, $this->description, $this->price, $this->imagePath);
                break;
            case 'drinks':
                $item = new DrinkItem($this->name, $this->category, $this->description, $this->price, $this->imagePath);
                break;
            case 'sides':
                $item = new SideItem($this->name, $this->category, $this->description, $this->price, $this->imagePath);
                break;
            case 'dinner':
                $item = new DinnerItem($this->name, $this->category, $this->description, $this->price, $this->imagePath);
                break;
            default:
                return false;
        }
        $this->db->query('UPDATE ' . $itemType . ' SET Name=:item_name ,Category=:category ,Description=:description ,Price=:price, ImagePath=:image_path WHERE id=:id');
        $this->db->bind(':id', $ID);
        $this->db->bind(':item_name', $item->getName());
        $this->db->bind(':price', $item->getPrice());
        $this->db->bind(':category', $item->getCategory());
        $this->db->bind(':description', $item->getDescription());
        $this->db->bind(':image_path', $item->getImagePath());

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
