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
            redirect("\dashboard\users?action=addtype");
            exit();
        }

        $name = strtolower(trim($_POST['usertype-name']));

        if (UserType::doesExist($name)) {
            flash("formError", "This name already exists");
            redirect("\dashboard\users?action=addtype");
            exit();
        }

        $this->userTypeModel->setName($name);

        if ($this->userTypeModel->add()) {
            flash("formError", "Successfully added");
            redirect("\dashboard\users?action=addtype");
            return true;
        }

        flash("formError", "Error saving into database");
        redirect("\dashboard\users?action=addtype");
        return false;
    }

    public function edit() {
        if (!isset($_POST['usertype-name']) || empty(trim($_POST['usertype-name']))) {
            flash("formError", "Please specify a name for this user type");
            redirect("\dashboard\users?action=edittype&id=" . $_POST['id']);
            exit();
        }

        $name = strtolower(trim($_POST['usertype-name']));

        $this->userTypeModel->setName($name);
        $this->userTypeModel->setID($_POST['id']);

        if ($this->userTypeModel->edit()) {
            flash("formError", "Successfully edited");
            redirect("\dashboard\users?action=edittype&id=" . $_POST['id']);
            return true;
        }

        flash("formError", "Error saving into database");
        redirect("\dashboard\users?action=edittype&id=" . $_POST['id']);
        return false;
    }

    public function delete() {
        if (!isset($_POST['id']) || empty(trim($_POST['id']))) {
            flash("formError", "Please specify a user type");
            redirect("\dashboard\users?action=viewusertypes");
            exit();
        }

        if (UserType::isDefault($_POST['id'])) {
            flash("formError", "You cannot delete the default user type");
            redirect("\dashboard\users?action=viewusertypes");
            exit();
        }
        
        $id = trim($_POST['id']);
        $this->userTypeModel->setID($id);

        if ($this->userTypeModel->delete()) {
            flash("formError", "Successfully deleted");
            redirect("\dashboard\users?action=viewusertypes");
            exit();
        }

        flash("formError", "Error deleting from database");
        redirect("\dashboard\users?action=viewusertypes");
        exit();
    }
}