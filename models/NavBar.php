<?php
// Path: models/NavBar.php

require_once 'database.php';
require_once 'models/Item.php';
class NavBar{

    protected $db;
    protected $id;
    protected $name;
    protected $path;

    //constructor 
    public function __construct($id, $name, $path){
        $this->db = new Database;
        $this->id = $id;
        $this->name = $name;
        $this->path = $path;
    }
    //getters and setters
    public function setId($id) {
        $this->id = $id;
    }
    public function getName() {
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getPath() {
        return $this->path;
    }
    public function setPath($path){
        $this->path = $path;
    }
    public function getId() {
        return $this->id;
    }
    //get all nav items
    public static function getNav() {
        $db = new Database();
        $db->query("SELECT * FROM navbar WHERE name NOT IN ('Dashboard', 'Logout', 'Sign in')");
        if ($db->execute())
            return $db->resultSet();

        return false;
    }

    public static function getCustom($navItem) {
        $db = new Database();
        $db->query("SELECT * FROM navbar WHERE name = :navItem");
        $db->bind(':navItem', $navItem);

        if ($db->execute())
            return $db->single();

        return false;
    }

    //add new name to db 
    public static function addNav($name, $path) {
        // Create a new PDO instance (replace with your actual connection)
        $db = new PDO('mysql:host=localhost;dbname=Carmel-California', 'root', '');
    
        // Write the query
        $query = "INSERT INTO navbar (name, path) VALUES (:name, :path)";
    
        // Prepare and execute the query
        $stmt = $db->prepare($query);
        $stmt->execute(array(
            ':name' => $name,
            ':path' => $path
        ));
    
        // Fetch all results
        $navItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $navItems;
    }

}