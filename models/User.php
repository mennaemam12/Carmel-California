<?php
require_once 'database.php';

class User {

    private $db;

    public function __construct(){
        $this->db = new Database;
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
    public function register($data){
        $this->db->query('INSERT INTO users (FullName, Email, UserName, UserPass, PhoneNumber,Usertype) 
        VALUES (:fullname, :email, :username, :userpass, :phonenumber,:usertype)');
        //Bind values
        $this->db->bind(':fullname', $data['FullName']);
        $this->db->bind(':email', $data['Email']);
        $this->db->bind(':username', $data['Username']);
        $this->db->bind(':userpass', $data['UserPass']);
        $this->db->bind(':phonenumber', $data['PhoneNumber']);
        $this->db->bind(':usertype',"user");
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