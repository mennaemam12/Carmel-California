<?php
require_once 'database.php';

class BillingDetails {

    private $db;
    private $id;
    private $firstname;
    private $lastname;
    private $area;
    private $streetname;
    private $buildingnum;
    private $floornum;
    private $apartmentnum;
    private $postcode;

    public function __construct(){
        $this->db = new Database;
    }

    public function setID($id){
        $this->id=$id;
    }

    public function getID(){
        return $this->id;
    }

    public static function getUserBillingDetails($id){
        $db = new Database();
        $db->query('SELECT * FROM billing_details WHERE UserId = :id');
        $db->bind(':id', $id);

        $row = $db->single();

        //Check row
        if ($db->rowCount() > 0) {
            return $row;
        }

        return false;
    }

    public function saveBillingDetails($id, $data){
        $this->db->query("INSERT INTO billing_details (UserId, FirstName, LastName, Area, Street, Building, Floor, Apartment, Postalcode) 
            VALUES (:id, :firstname, :lastname, :area, :street, :bulding, :floor, :apartment, :postalcode)");

        $this->db->bind(':id', $id);
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':area', $data['area']);
        $this->db->bind(':street', $data['street']);
        $this->db->bind(':bulding', $data['building']);
        $this->db->bind(':floor', $data['floor']);
        $this->db->bind(':apartment', $data['apartment']);
        $this->db->bind(':postalcode', $data['postalcode']);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

?>