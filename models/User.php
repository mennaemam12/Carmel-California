<?php
require_once 'database.php';

class User {

    private $db;
    private $id;
    private $fullName;
    private $email;
    private $username;
    private $password;
    private $phone;
    private $type;
    private $cart=array();

    public function __construct(){
        $this->db = new Database;
    }

    public function setID($id){
        $this->id=$id;
    }

    public function getID(){
        return $this->id;
    }

    public function setFullName($fullName) {
        $this->fullName = $fullName;
    }

    public function getFullName() {
        return $this->fullName;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getType() {
        return $this->Type;
    }

    public function addToCart($item) {
        $this->cart[] = $item;
    }

    public function getCart() {
        return $this->cart;
    }

    //Find user by email or username
    public function findUserByEmailOrUsername($email, $username){
        $this->db->query('SELECT * FROM users WHERE Username = :username OR Email = :email');
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function getalluser(){
        $this->db->query('SELECT * FROM users');
        $rows = $this->db->resultSet();
        if ($this->db->rowCount() > 0) {
            return $rows;
        } else {
            return false;
        }
    }

    //Register User
    public function register(){
        $this->db->query('INSERT INTO users (FullName, Email, UserName, UserPass, PhoneNumber,Usertype) 
        VALUES (:fullname, :email, :username, :userpass, :phonenumber,:usertype)');
        //Bind values
        $this->db->bind(':fullname', $this->fullName);
        $this->db->bind(':email', $this->email);
        $this->db->bind(':username', $this->username);
        $this->db->bind(':userpass', $this->password);
        $this->db->bind(':phonenumber', $this->phone);
        $this->db->bind(':usertype',$this->type);
        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //Login user
    public function login($nameOrEmail, $password){
        $row = $this->findUserByEmailOrUsername($nameOrEmail, $nameOrEmail);

        if($row == false) return false;

        $hashedPassword = $row->UserPass;
        if(password_verify($password, $hashedPassword)){
            return $row;
        }else{
            return false;
        }
    }

    //Reset Password
    public function resetPassword($newPwdHash, $tokenEmail){
        $this->db->query('UPDATE users SET UserPass=:pwd WHERE Email=:email');
        $this->db->bind(':userpass', $newPwdHash);
        $this->db->bind(':email', $tokenEmail);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function Makeadmin($tokenEmail){
        $this->db->query('UPDATE users SET Usertype="admin" WHERE Email=:email');
        $this->db->bind(':email', $tokenEmail);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function delete($ID)
    {
        $this->db->query('DELETE FROM users  WHERE id=:id');
        
        $this->db->bind(':id', $ID);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}