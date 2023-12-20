<?php
require_once 'database.php';
require_once 'models/BreakfastItem.php';
require_once 'models/DrinkItem.php';
require_once 'models/MainItem.php';
require_once 'models/SideItem.php';
require_once 'models/DessertItem.php';
require_once 'models/Item.php';

class Discount
{
    //type , category , percentage , coupon , start_date , end_date , valid
    protected $db;
    protected $id;
    protected $type;
    protected $category;
    protected $percentage;
    protected $coupon;
    protected $start_date;
    protected $end_date;
    protected $valid;

    public function __construct()
    {
        $this->db = new Database;
    }

    //setters
    public function setID($id)
    {
        $this->id = $id;
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

    public function setCoupon($coupon)
    {
        $this->coupon = $coupon;
    }

    public function setData($row) {
        $this->id = $row->id;
        $this->type = $row->type;
        $this->category = $row->category;
        $this->percentage = $row->percentage;
        $this->coupon = $row->coupon;
        $this->start_date = $row->start_date;
        $this->end_date = $row->end_date;
        $this->valid = $row->valid;
    }

    public function setStartDate($start_date)
    {
        // Convert 'd/m/Y' to 'Y-m-d' format
        $formattedStartDate = DateTime::createFromFormat('d/m/Y', $start_date);
        $this->start_date = $formattedStartDate->format('Y-m-d');
    }

    public function setEndDate($end_date)
        {
            // Convert 'd/m/Y' to 'Y-m-d' format
            $formattedEndDate = DateTime::createFromFormat('d/m/Y', $end_date);

            // Add 30 days to the start date
            $startDate = DateTime::createFromFormat('Y-m-d', $this->start_date);
            $startDate->add(new DateInterval('P30D')); // Adding 30 days

            // Set the end date as 30 days after the start date
            $this->end_date = $startDate->format('Y-m-d');
        }

    public function setValid()
    {
        // Convert start date and end date strings to DateTime objects
        $startDateTime = DateTime::createFromFormat('d/m/Y', $this->getStartDate());
        $endDateTime = DateTime::createFromFormat('d/m/Y', $this->getEndDate());

        // Calculate the difference between dates
        $interval = $endDateTime->diff($startDateTime);

        // Get the difference in days
        $daysDifference = $interval->days;

        // Check if there are days left
        if ($daysDifference > 0)
            $this->valid = "YES"; // There are days left between start and end dates
        else
            $this->valid = "NO"; // There are no days left between start and end dates
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

    public function getCoupon()
    {
        return $this->coupon;
    }

    public function getStartDate()
    {
        // Convert 'Y-m-d' to 'd/m/Y' format
        $formattedStartDate = DateTime::createFromFormat('Y-m-d', $this->start_date);
        return $formattedStartDate->format('d/m/Y');
    }

    public function getEndDate()
    {
        // Convert 'Y-m-d' to 'd/m/Y' format
        $formattedEndDate = DateTime::createFromFormat('Y-m-d', $this->end_date);
        return $formattedEndDate->format('d/m/Y');
    }

    public function getValid()
    {
        return $this->valid;
    }


    //add discount
    public function addDiscount()
    {
        // Retrieve existing discount with same category and percentage
        $sql = "SELECT * FROM discount WHERE category = :category AND percentage = :percentage";
        $this->db->query($sql);
        $this->db->bind(':category', $this->category);
        $this->db->bind(':percentage', $this->percentage);
        $existingDiscount = $this->db->single();

        if ($existingDiscount) {
            // call edit function 
            $this->editDiscount($existingDiscount->id);
            return true;

        } else {
            // Add new discount
            $sql = "INSERT INTO discount (type , category , percentage , coupon , start_date , end_date , valid) VALUES (:type , :category , :percentage , :coupon , :start_date , :end_date , :valid)";
            $this->db->query($sql);
            $this->db->bind(':type', $this->type);
            $this->db->bind(':category', $this->category);
            $this->db->bind(':percentage', $this->percentage);
            $this->db->bind(':coupon', $this->coupon);
            $this->db->bind(':start_date', $this->start_date);
            $this->db->bind(':end_date', $this->end_date);
            $this->db->bind(':valid', $this->valid);
            if ($this->db->execute()) {
                return true;
            }
        }

        return false;
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

    public static function getDiscountByID($id) {
        $db = new Database;
        $db->query('SELECT * FROM discount WHERE id = :id');
        $db->bind(':id', $id);
        $row = $db->single();

        if ($db->rowCount() > 0) {
            $discount = new Discount;
            $discount->setData($row);
            return $discount;
        }

        return false;
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
    public static function getDiscountByCoupon($coupon)
    {
        $db = new Database;
        $db->query('SELECT * FROM discount WHERE coupon = :coupon');
        $db->bind(':coupon', $coupon);
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
    public function editDiscount($ID)
    {
        $sql = "UPDATE discount SET type = :type , category = :category , percentage = :percentage , coupon = :coupon , start_date = :start_date , end_date = :end_date , valid = :valid WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind(':type', $this->type);
        $this->db->bind(':category', $this->category);
        $this->db->bind(':percentage', $this->percentage);
        $this->db->bind(':coupon', $this->coupon);
        $this->db->bind(':start_date', $this->start_date);
        $this->db->bind(':end_date', $this->end_date);
        $this->db->bind(':valid', $this->valid);
        $this->db->bind(':id', $this->id);

        if ($this->db->execute())
            return true;

        return false;
    }


    ///edit discount coupon
    public function editDiscountcoupon($id)
    {
        $sql = "UPDATE discount SET coupon = :coupon WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind(':coupon', $this->coupon);
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