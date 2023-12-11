<?php
require_once 'database.php';
class UserType
{
    private $db;
    private $id;
    private $name;
    private $pages;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function setID($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPages($pages)
    {
        $this->pages = $pages;
    }

}