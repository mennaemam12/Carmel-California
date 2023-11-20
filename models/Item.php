<?php
require_once 'database.php';

class Item {

    private $db;
    protected $name;
    protected $category;
    protected $description;
    protected $price;
    protected $imagePath;
    
    public function __construct($name,$category,$description, $price, $imagePath) {
        $this->db = new Database;
        $this->name = $name;
        $this->category = $category;
        $this->description=$description;
        $this->price = $price;
        $this->imagePath= $imagePath;
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
        $item = null;
    
        switch ($item_type) {
            case 'Breakfast':
                $item = new BreakfastItem($this->name, $this->category, $this->description, $this->price, $this->imagePath);
                break;
            case 'Main':
                $item = new MainItem($this->name, $this->category, $this->description, $this->price, $this->imagePath);
                break;
            case 'Drink':
                $item = new DrinkItem($this->name, $this->category, $this->description, $this->price, $this->imagePath);
                break;
            case 'Side':
                $item = new SideItem($this->name, $this->category, $this->description, $this->price, $this->imagePath);
            default:
                return false;
        }
    
        
        $this->db->query('INSERT INTO ' . $item_type . ' (Itemname, Category, Description, Price, ImagePath) 
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