<?php
require_once 'database.php';

class Item {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //Find user by email or username
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

    //Register User
    public function add($data){
        $this->db->query('INSERT INTO :itemtype (itemname, price, category, descriptions) 
        VALUES (:itemname, :price, :category, :descriptions)');
        //Bind values
        $this->db->bind(':itemtype', $data['itemtype']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':descriptions', $data['descriptions']);
        $this->db->bind(':itemname', $data['itemname']);
        //Execute
        // $stmt=array(
        //     ":itemtype" => $data['itemtype'],
        //     ":price" => $data['price'],
        //     ":category" => $data['category'],
        //     ":descriptions" =>  $data['descriptions'],
        //     ":itemname" => $data['itemname'] 
        // );

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