<?php
require_once 'database.php';
require_once 'models/Review.php';
require_once 'models/UserType.php';
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
        $this->type = new UserType($type);
        $this->type = $this->type->serialize();
    }

    public function getType() {
        $userType = new UserType();
        $userType->unserialize($this->type);
        return $userType;
    }

    public function addToCart($item) {
        $this->cart[] = $item;
    }

    public function getCart() {
        return $this->cart;
    }

    public function serialize() {
        return serialize([
            $this->id,
            $this->fullName,
            $this->email,
            $this->username,
            $this->password,
            $this->phone,
            $this->type,
            $this->cart
        ]);
    }

    public function unserialize($serialized) {
        list(
            $this->id,
            $this->fullName,
            $this->email,
            $this->username,
            $this->password,
            $this->phone,
            $this->type,
            $this->cart
        ) = unserialize($serialized);
    }

    //Find user by email or username
    public function findUserByEmailOrUsername($email, $username){
        $this->db->query('SELECT * FROM users WHERE Username = :username OR Email = :email');
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0)
            return $row;

        return false;
    }

    public static function findUserByID($id){
        $db = new Database();
        $db->query('SELECT * FROM users WHERE id = :id');
        $db->bind(':id', $id);

        $row = $db->single();

        //Check row
        if($db->rowCount() > 0) {
            $user = new User();
            $user->setID($row->id);
            $user->setFullName($row->FullName);
            $user->setEmail($row->Email);
            $user->setUsername($row->UserName);
            $user->setPhone($row->PhoneNumber);
            $user->setType($row->Usertype);
            return $user;
        }

        return false;
    }

    public static function getAllUsers(){
        $db = new Database();
        $db->query('SELECT * FROM users');
        $rows = $db->resultSet();
        if ($db->rowCount() < 0)
            return [];

        $users = [];
        for ($i = 0; $i < count($rows); $i++) {
            $user = new User();
            $user->setID($rows[$i]->id);
            $user->setFullName($rows[$i]->FullName);
            $user->setEmail($rows[$i]->Email);
            $user->setUsername($rows[$i]->UserName);
            $user->setPhone($rows[$i]->PhoneNumber);
            $user->setType($rows[$i]->Usertype);
            $users[] = $user;
        }

        return $users;
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
        $this->db->bind(':usertype',$this->getType()->getID());
        //Execute
        if($this->db->execute())
            return true;

        return false;
    }

    //Login user
    public function login($nameOrEmail, $password){
        $row = $this->findUserByEmailOrUsername($nameOrEmail, $nameOrEmail);

        if(!$row)
            return false;

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

    public function editUserType() {
        $usertype = self::getType()->getID();

        $this->db->query('UPDATE users SET Usertype=:usertype WHERE id=:id');
        $this->db->bind(':id', $this->id);
        $this->db->bind(':usertype', $usertype);

        if (!$this->db->execute())
            return false;

        return true;
    }

    public function delete($ID)
    {
        $this->db->query('DELETE FROM users  WHERE id=:id');
        
        $this->db->bind(':id', $ID);

        if (!Review::deleteReviewsWithUserId($ID))
            return false;

        //Execute
        if ($this->db->execute())
            return true;

        return false;
    }
    public function getLastInsertedID(){
       return $this->db->lastInsertId();
    }
}