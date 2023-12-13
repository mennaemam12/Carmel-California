<?php
require_once 'database.php';
class Permission
{
    protected $db;
    protected $id;
    protected $description;
    protected $path;

    public function __construct($id = null, $description = null, $path = null)
    {
        $this->db = new Database;
        if ($id == null)
            return false;

        $this->id = $id;

        if ($description != null && $path != null) {
            $this->description = $description;
            $this->path = $path;
            return true;
        }

        if (!$data = self::getData($id))
            return false;

        $this->description = $data->description;
        $this->path = $data->path;
        return true;
    }

    private static function getData($id)
    {
        $db = new Database;
        $db->query('SELECT * FROM permissions where id = :id');
        $db->bind(':id', $id);

        if (!$db->execute())
            return false;

        return $db->single();
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

        foreach ($result as $row)
            $permissions[] = new Permission($row->id, $row->description, $row->path);


        return $permissions;
    }

}