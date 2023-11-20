<?php
require_once 'database.php';
class Ingredient
{

    private $db;
    protected $name;
    protected $category;
    protected $price;
    protected $imagePath;

    public static function construct()
    {
        $db = new Database;
    }
    
    public function __construct($name=NULL, $category = NULL, $price = NULL, $imagePath = NULL)
    {
        $this->db = new Database;
        $this->name = $name;
        $this->category = $category;
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

    public function getImagePath()
    {
        return $this->imagePath;
    }

    public function findItemByName($ItemName)
    {
        $this->db->query('SELECT * FROM saladingredients WHERE Name = :itemname');
        $this->db->bind(':ingredientname', $ItemName);
        $row = $this->db->single();

        //Check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getIngredients()
    {
        $this->db->query('SELECT * FROM saladingredients');
        $row = $this->db->resultSet();

        //Check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function add()
    {
        $this->db->query("INSERT INTO saladingredients (Name, Category, Price, ImagePath) 
            VALUES (:ingredientname, :category, :price, :image_path)");

        $this->db->bind(':ingredientname', $this->getName());
        $this->db->bind(':price', $this->getPrice());
        $this->db->bind(':category', $this->getCategory());
        $this->db->bind(':image_path', $this->getImagePath());

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