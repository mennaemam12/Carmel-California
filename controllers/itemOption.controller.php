<?php
require_once 'models/ItemOption.php';
require_once 'helpers/session.helper.php';
include 'projectFolderName.php';

class OptionController{
    private $optionModel;

    public function __construct()
    {
    }
    
    public function addOption(){
        $data = [
            'itemCategory' => trim($_POST['category']),
            'optionCriteria' => trim($_POST['option-criteria']),
            'optionValues' => array_map('trim', $_POST['option-values']),
        ];

        if (!ctype_alpha($data['optionCriteria'])) {
            flash("formError", "Invalid option criteria", 'form-message form-message-red');
            redirect($GLOBALS['projectFolder'] . "/dashboard/addoption");
            exit();
        }

        foreach ($data['optionValues'] as $value) {
            if (!ctype_alpha($value)) {
                flash("formError", "Invalid option value", 'form-message form-message-red');
                redirect($GLOBALS['projectFolder'] . "/dashboard/addoption");
                exit();
            }
        }

        $this->optionModel=new ItemOption;
        $this->optionModel->setCategory($data['itemCategory']);
        $this->optionModel->setCriteria($data['optionCriteria']);
        $this->optionModel->setOptions($data['optionValues']);

        if ($this->optionModel->addOption()) {
            flash("formSuccess", "Item added successfully", 'form-message form-message-green');
            redirect($GLOBALS['projectFolder'] . "/dashboard/additem");
            exit();
        }
        else{
            flash("formError", "Failed to add item to the database", 'form-message form-message-red');
            redirect($GLOBALS['projectFolder'] . "/dashboard/additem");
            exit();
        }
        
    }

}

?>