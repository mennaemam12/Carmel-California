<?php
require_once 'database.php';
class Ingredient
{
    private $db;
    protected $id;
    protected $name;
    protected $category;
    protected $categorymax;
    protected $price;
    protected $imagePath;


    public function construct()
    {
        $this->db = new Database;
    }

    public function __construct($id = null,$name = NULL, $category = NULL, $categorymax = NULL, $price = NULL, $imagePath = NULL)
    {
        $this->db = new Database;
        $this->name = $name;
        $this->category = $category;
        $this->categorymax = $categorymax;
        $this->price = $price;
        $this->imagePath = $imagePath;
    }

    public function getID() {
        return $this->id;
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

    public function getCategoryMax()
    {
        return $this->categorymax;
    }

    public function getImagePath()
    {
        return $this->imagePath;
    }

    public static function findIngredientByID($IngredientID)
    {
        $db = new Database;

        $db->query('SELECT * FROM saladingredients WHERE ID = :ingredientid');
        $db->bind(':ingredientid', $IngredientID);
        $row = $db->single();

        //Check row
        if ($db->rowCount() > 0)
            return new Ingredient($row->id,$row->Name, $row->Category, $row->CategoryMax, $row->Price, $row->ImagePath);

        return false;
    }

    public static function findIngredientByName($IngredientName)
    {
        $db = new Database;

        $db->query('SELECT * FROM saladingredients WHERE Name = :ingredientname');
        $db->bind(':ingredientname', $IngredientName);
        $row = $db->single();

        //Check row
        if ($db->rowCount() > 0) {
            return $row;
        } else
            return false;
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
        $this->db->query("INSERT INTO saladingredients (Name, Category, CategoryMax, Price, ImagePath) 
            VALUES (:ingredientname, :category, :categorymax, :price, :image_path)");

        $this->db->bind(':ingredientname', $this->getName());
        $this->db->bind(':price', $this->getPrice());
        $this->db->bind(':category', $this->getCategory());
        $this->db->bind(':categorymax', $this->getCategoryMax());
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