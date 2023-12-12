<?php
require_once 'database.php';
class Permission
{
    private $db;
    private $id;
    private $description;
    private $path;

    public function __construct($id = null, $description = null, $path = null)
    {
        $this->db = new Database;
        if ($id == null)
            return false;

        $this->id = $id;
        $this->description = $description;
        $this->path = $path;
        return true;
    }

    public function setID($id)
    {
        $this->id = $id;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setPath($path)
    {
        $this->path = $path;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPath()
    {
        return $this->path;
    }

    public static function getAllPermissions() {
        $db = new Database;
        $db->query('SELECT * FROM permissions');
        $db->execute();

        $result = $db->resultSet();
        $permissions = [];

        foreach ($result as $row) {
            $permission = new Permission($row->id, $row->description, $row->path);
            $permissions[] = $permission;
        }

        return $permissions;
    }

}