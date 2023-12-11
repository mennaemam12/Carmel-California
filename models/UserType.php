<?php
require_once 'database.php';
class UserType
{
    private $db;
    private $id;
    private $name;
//    private $pages;

    public function __construct($id = null)
    {
        $this->db = new Database;
        if ($id == null)
            return false;

        $this->id = $id;

        if (!$data = self::getData($id))
            return false;

        $this->name = $data->name;
//        $this->pages = $data->pages;
    }

    private static function getData($id) {
        $db = new Database;
        $db->query('SELECT * FROM user_type where id = :id');
        $db->bind(':id', $id);

        if (!$db->execute())
            return false;

        return $db->single();
    }

    public function setID($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function add() {
        $this->db->query('INSERT INTO user_type (name) VALUES (:name)');
        $this->db->bind(':name', $this->name);

        if ($this->db->execute())
            return true;

        return false;
    }

    public function edit() {
        $this->db->query('UPDATE user_type SET name=:name WHERE id=:id');
        $this->db->bind(':id', $this->id);
        $this->db->bind(':name', $this->name);

        if ($this->db->execute())
            return true;

        return false;
    }


}