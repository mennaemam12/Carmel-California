<?php
require_once 'database.php';
session_start();

class Cart{
    protected $id;
    protected $user_id;
    protected $item_type;
    protected $item_id;
    protected $quantity;

    public function __construct($user_id,$item_type,$item_id,$quantity){
        $this->user_id=$user_id;
        $this->item_type=$item_type;
        $this->item_id=$item_id;
        $this->quantity=$quantity;

    }

    public function add(){
        $this->db->query('INSERT INTO cart (User_id, Item_type, Item_id, Quantity) 
        VALUES (:userID, :itemType, :itemID, :quantity)');

        $this->db->bind(':userID', $this->user_id);
        $this->db->bind(':Item_type', $this->item_type);
        $this->db->bind(':Item_id', $this->item_id);
        $this->db->bind(':quantity', $this->quantity);

        if ($this->db->execute()){
            return true;
        }
        else{
            return false;
        }

    }

    public function getCart(){
        $sql = "SELECT * FROM `cart` WHERE User_id= :userID";
        $this->db->query($sql);
        $this->db->bind(":userID", $_SESSION['userId']);
        $rows =$this->db->resultSet();
        foreach($rows as $row){
            
        }

    }


}

?>