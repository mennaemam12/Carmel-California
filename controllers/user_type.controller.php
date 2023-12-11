<?php
require_once 'models/UserType.php';

class UserTypeController
{
    private $userTypeModel;

    public function __construct()
    {
        $this->userTypeModel = new UserType();
    }


    public function add()
    {
        if (!isset($_POST['usertype-name']) || empty(trim($_POST['usertype-name']))) {
            flash("formError", "Please specify a name for this user type");
            redirect($GLOBALS['projectFolder'] . "\dashboard\addusertype");
            exit();
        }

        $name = strtolower(trim($_POST['usertype-name']));

        if (UserType::doesExist($name)) {
            flash("formError", "This name already exists");
            redirect($GLOBALS['projectFolder'] . "\dashboard\addusertype");
            exit();
        }

        $this->userTypeModel->setName($name);
        if ($this->userTypeModel->add()) {
            flash("formError", "Successfully added");
            redirect($GLOBALS['projectFolder']. "\dashboard\addusertype");
            return true;
        }

        flash("formError", "Error saving into database");
        redirect($GLOBALS['projectFolder']. "\dashboard\addusertype");
        return false;
    }
}