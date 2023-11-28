<?php
require_once 'database.php';
require_once 'models/BreakfastItem.php';
require_once 'models/DrinkItem.php';
require_once 'models/MainItem.php';
require_once 'models/SideItem.php';
require_once 'models/DessertItem.php';
require_once 'models/Item.php';
class Discount{

    //type , category , percentage , copoun , valid
    protected $db;
    protected $type;
    protected $category;
    protected $percentage;
    protected $copoun;
    protected $valid;
    public function __construct($type , $category , $percentage , $copoun, $valid) {
        $this->db = new Database;
        $this->type = $type;
        $this->category = $category;
        $this->percentage = $percentage;
        $this->copoun = $copoun;
        $this->valid = $valid;
    }


    public function getType()
    {
        return $this->type;
    }
    public function getCategory()
    {
        return $this->category;
    }
    public function getPercentage()
    {
        return $this->percentage;
    }
    public function getCopoun()
    {
        return $this->copoun;
    }
    public function getValid()
    {
        return $this->valid;
    }
    public function setType($type)
    {
        $this->type = $type;
    }
    public function setCategory($category)
    {
        $this->category = $category;
    }
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;
    }
    public function setCopoun($copoun)
    {
        $this->copoun = $copoun;
    }
    public function setValid($valid)
    {
        $this->valid = $valid;
    }
    public function addDiscount()
    {
        $sql = "INSERT INTO discount (type , category , percentage , copoun , valid) 
        VALUES (:type , :category , :percentage , :copoun , :valid)";
        $this->db->query($sql);
        $this->db->bind(':type', $this->type);
        $this->db->bind(':category', $this->category);
        $this->db->bind(':percentage', $this->percentage);
        $this->db->bind(':copoun', $this->copoun);
        $this->db->bind(':valid', $this->valid);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //get items of the type chosen 
    public function getItems($type){
        
    }




}



?>