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
    
    public function __construct() {
        $this->db = new Database;

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

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getImagePath() {
        return $this->imagePath;
    }

    public function findItemByName($ItemName,$ItemType){
        $this->db->query('SELECT * FROM :itemtype WHERE itemname = :itemname');
        $this->db->bind(':itemname', $ItemName);
        $this->db->bind(':itemtype', $ItemType);
        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
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
    // public function resetPassword($data){
    //     $this->db->query('UPDATE items SET UserPass=:pwd WHERE Email=:email');
    //     $this->db->bind(':userpass', $newPwdHash);
    //     $this->db->bind(':email', $tokenEmail);

    //     //Execute
    //     if($this->db->execute()){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }
}