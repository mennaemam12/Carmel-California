<?php
require_once 'database.php';

class Order{

    protected $db;

    protected $id;

    protected $userId;

    protected $itemId;

    protected $quantity;

    protected $selected_option;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function setID($id)
    {
        $this->id = $id;
    }

    public function getID()
    {
        return $this->id;
    }

    public static function getOrderDetails($id)
    {
        $db = new Database();
        $db->query('SELECT * FROM orders WHERE UserId = :id');
        $db->bind(':id', $id);

        $row = $db->single();

        //Check row
        if ($db->rowCount() > 0) {
            return $row;
        }

        return false;
    }

    public function saveOrderDetails($id, $item)
    {
        $this->db->query('INSERT INTO orders (UserId, ItemId, ItemType, SelectedOption, Quantity) 
        VALUES (:userid, :itemid, :itemtype, :selectedoption, :quantity)');
        //Bind values
        $this->db->bind(':userid', $item->getUserId());
        $this->db->bind(':itemtype', $item->getItemType());
        $this->db->bind(':itemid', $item->getItemId());
        $this->db->bind(':selectedoption', $item->getSelectedOption());
        $this->db->bind(':quantity', $item->getQuantity());
        //Execute
        if ($this->db->execute())
            return true;

        return false;
    }
}

?>