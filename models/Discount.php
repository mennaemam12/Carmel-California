<?php
require_once 'database.php';
require_once 'models/BreakfastItem.php';
require_once 'models/DrinkItem.php';
require_once 'models/MainItem.php';
require_once 'models/SideItem.php';
require_once 'models/DessertItem.php';
require_once 'models/Item.php';
class Discount{

    //type , category , percentage , copoun , start_date , end_date , valid
    protected $db;
    protected $type;
    protected $category;
    protected $percentage;
    protected $copoun;
    protected $start_date;
    protected $end_date;
    protected $valid;

    public function __construct() {
        $this->db = new Database;
    }

    //setters
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
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
    }
    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;
    }
    public function setValid($valid)
    {
        $this->valid = $valid;
    }
    //getters
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
    public function getStartDate()
    {
        return $this->start_date;
    }
    public function getEndDate()
    {
        return $this->end_date;
    }
    public function getValid()
    {
        return $this->valid;
    }



    
     //add discount
        public function addDiscount()
        {
            $sql = "INSERT INTO discount (type , category , percentage , copoun , start_date , end_date , valid) VALUES (:type , :category , :percentage , :copoun , :start_date , :end_date , :valid)";
            $this->db->query($sql);
            $this->db->bind(':type', $this->type);
            $this->db->bind(':category', $this->category);
            $this->db->bind(':percentage', $this->percentage);
            $this->db->bind(':copoun', $this->copoun);
            $this->db->bind(':start_date', $this->start_date);
            $this->db->bind(':end_date', $this->end_date);
            $this->db->bind(':valid', $this->valid);
            $this->db->execute();
        }
    


     //get all discounts
    public static function getAllDiscounts()
    {
        $db = new Database;
        $db->query('SELECT * FROM discount');
        $rows = $db->resultSet();
        if ($db->rowCount() > 0) {
            return $rows;
        } else {
            return false;
        }
    }

     //find item by category
        public static function findDiscountByCategory($category)
        {
            $db = new Database;
            $db->query('SELECT * FROM discount WHERE category = :category');
            $db->bind(':category', $category);
            $row = $db->single();
            if ($db->rowCount() > 0) {
                return $row;
            } else {
                return false;
            }
        }
    


     //get discount by coupon
        public static function getDiscountByCopoun($copoun)
        {
            $db = new Database;
            $db->query('SELECT * FROM discount WHERE copoun = :copoun');
            $db->bind(':copoun', $copoun);
            $row = $db->single();
            if ($db->rowCount() > 0) {
                return $row;
            } else {
                return false;
            }
        }
    


    //get discount by type
    public static function getDiscountByType($type)
    {
        $db = new Database;
        $db->query('SELECT * FROM discount WHERE type = :type');
        $db->bind(':type', $type);
        $row = $db->single();
        if ($db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }
     //edit discount
        public function editDiscount($id)
        {
            $sql = "UPDATE discount SET type = :type , category = :category , percentage = :percentage , copoun = :copoun , start_date = :start_date , end_date = :end_date , valid = :valid WHERE id = :id";
            $this->db->query($sql);
            $this->db->bind(':type', $this->type);
            $this->db->bind(':category', $this->category);
            $this->db->bind(':percentage', $this->percentage);
            $this->db->bind(':copoun', $this->copoun);
            $this->db->bind(':start_date', $this->start_date);
            $this->db->bind(':end_date', $this->end_date);
            $this->db->bind(':valid', $this->valid);
            $this->db->bind(':id', $id);
            $this->db->execute();
        }
    
    

    ///edit discount copoun
    public function editDiscountCopoun($id)
    {
        $sql = "UPDATE discount SET copoun = :copoun WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind(':copoun', $this->copoun);
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    //delete discount
    public static function deleteDiscount($id)
    {
        $db = new Database;
        $db->query('DELETE FROM discount WHERE id = :id');
        $db->bind(':id', $id);
        $db->execute();
    }

    
    
    
    




}



?>