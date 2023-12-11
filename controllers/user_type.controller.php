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
        $this->userTypeModel->setName($_POST['name']);
        if ($this->userTypeModel->add())
            return true;

        return false;
    }
}