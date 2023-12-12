<?php
require_once 'database.php';

class UserType
{
    private $db;
    private $id;
    private $name;


    public function __construct($id = null, $name = null)
    {
        $this->db = new Database;
        if ($id == null)
            return false;

        $this->id = $id;

        if ($name != null) {
            $this->name = $name;
            exit();
        }

        if (!$data = self::getData($id))
            return false;

        $this->name = $data->name;
    }

    private static function getData($id)
    {
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

    public function add()
    {
        $this->db->query('INSERT INTO user_type (name) VALUES (:name)');
        $this->db->bind(':name', $this->name);

        if ($this->db->execute()) {
            $this->id = $this->db->lastInsertId();
            if (!$this->updatePermissions())
                return false;

            return true;
        }

        return false;
    }

    private function updatePermissions()
    {
        if (!isset($_POST['selectedPermissions']))
            return false;


        $this->deletePermissions();

        // Assuming your select element has the name "selectedPermissions"
        $selectedPermissionIDs = $_POST['selectedPermissions'];

        foreach ($selectedPermissionIDs as $permissionID) {
            echo $permissionID." HERE\n";
            $this->db->query('INSERT INTO usertype_permissions (usertype_id, permission_id) VALUES (:usertype_id, :permission_id)');
            $this->db->bind(':usertype_id', $this->id);
            $this->db->bind(':permission_id', $permissionID);
            $this->db->execute();
        }
        return true;
    }


    private
    function deletePermissions()
    {
        $this->db->query('DELETE FROM usertype_permissions WHERE usertype_id = :id');
        $this->db->bind(':id', $this->id);

        $this->db->execute();
    }

    public
    function edit()
    {
        $this->db->query('UPDATE user_type SET name=:name WHERE id=:id');
        $this->db->bind(':id', $this->id);
        $this->db->bind(':name', $this->name);

        if ($this->db->execute())
            return true;

        return false;
    }

    public
    static function doesExist($name)
    {
        $name = strtolower($name);
        $db = new Database;
        $db->query('SELECT * FROM user_type WHERE name = :name');
        $db->bind(':name', $name);
        $db->execute();

        return $db->rowCount() > 0;
    }

    public
    static function getAllUserTypes()
    {
        $db = new Database;
        $db->query('SELECT * FROM user_type');
        $db->execute();

        return $db->resultSet();
    }
}