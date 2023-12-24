<?php
require_once 'database.php';
require_once 'models/Item.php';

class Cart{
    protected $db;
    protected $id;
    protected $user_id;
    protected $item_type;
    protected $item_id;
    protected $selected_option;
    protected $quantity;


    public function __construct(){
        $this->db = new Database;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }


    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function setItemType($item_type) {
        $this->item_type = $item_type;
    }

    public function getItemType() {
        return $this->item_type;
    }

    public function setItemId($item_id) {
        $this->item_id = $item_id;
    }

    public function getItemId() {
        return $this->item_id;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setSelectedOption($selected_option) {
        $this->selected_option = $selected_option;
    }

    public function getSelectedOption() {
        return $this->selected_option;
    }

    public function serialize() {
        return serialize([
            $this->id,
            $this->user_id,
            $this->item_type,
            $this->item_id,
            $this->selected_option,
            $this->quantity,
        ]);
    }

    public function unserialize($serialized) {
        list(
            $this->id,
            $this->user_id,
            $this->item_type,
            $this->item_id,
            $this->selected_option,
            $this->quantity,
        ) = unserialize($serialized);
    }

    public function add(){
        $this->db->query('INSERT INTO cart (User_id, Item_type, Item_id, Quantity) 
        VALUES (:userID, :itemType, :itemID, :quantity)');

        $this->db->bind(':userID', $this->user_id);
        $this->db->bind(':Item_type', $this->item_type);
        $this->db->bind(':Item_id', $this->item_id);
        $this->db->bind(':quantity', $this->quantity);

        if ($this->db->execute())
            return true;

        return false;
    }

    public static function getCartItems($user_id) {
        $db = new Database;
        $db->query('SELECT * FROM cart WHERE User_id = :user_id');
        $db->bind(':user_id', $user_id);
        $rows = $db->resultSet();
        $items = array();
        foreach ($rows as $row)
            $items[] = Item::findItemByID($row->Item_type, $row->Item_id);

        return $items;
    }

    public static function getCartQuantity($user_id) {
        $db = new Database;
        $db->query('SELECT * FROM cart WHERE User_id = :user_id');
        $db->bind(':user_id', $user_id);
        $rows = $db->resultSet();
        $quantity = 0;
        foreach ($rows as $row)
            $quantity += $row->Quantity;

        return $quantity;
    }

//    public function getCart($user){
//
//        $sql = "SELECT * FROM `cart` WHERE User_id= :userID";
//        $this->db->query($sql);
//        $this->db->bind(":userID", $user->id);
//        $rows =$this->db->resultSet();
//        foreach($rows as $row){
//            $items[]=Item::findItemByID($row->Item_type,$row->Item_id);
//        }
//        include_once 'views/cart.php';
//    }

}