<?php
require_once 'database.php';

class Item {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //Find user by email or username
    public function findItemByName($ItemName){
        $this->db->query('SELECT * FROM items WHERE ItemName = :ItemName');
        $this->db->bind(':ItemName', $ItemName);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    //Register User
    public function add($data){
        $this->db->query('INSERT INTO items (ItemName, Price, Category, Descriptions) 
        VALUES (:ItemName, :Price, :Category, :Descriptions)');
        //Bind values
        $this->db->bind(':ItemName', $data['ItemName']);
        $this->db->bind(':Price', $data['Price']);
        $this->db->bind(':Category', $data['Category']);
        $this->db->bind(':Descriptions', $data['Descriptions']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
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