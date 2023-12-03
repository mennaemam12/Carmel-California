<?php
require_once 'models/Item.php';
require_once 'models/Discount.php';
require_once 'helpers/session.helper.php';
include 'projectFolderName.php';

class DiscountController{

    private $discountModel;
    private $errorMsg = "";

    public function __construct()
    {

    }
    //validate
    public function validateDiscount($data)
    {
        $this->errorMsg = "";
        if (
            empty($data['type']) || empty($data['category']) || empty($data['percentage'])
            || empty($data['copoun']) || empty($data['start_date']) || empty($data['end_date']) || empty($data['valid'])
        ) {
            $this->errorMsg = "Please fill in all the fields";
            return false;
        }

        if (!is_string($data['type'])) {
            $this->errorMsg = "Invalid type";
            return false;
        }

        if (!is_string($data['category'])) {
            $this->errorMsg = "Invalid category";
            return false;
        }

        if (!is_numeric($data['percentage']) || $data['percentage'] <= 0) {
            $this->errorMsg = "Invalid percentage";
            return false;
        }

        if (!is_string($data['copoun'])) {
            $this->errorMsg = "Invalid copoun";
            return false;
        }

        if (!is_string($data['start_date'])) {
            $this->errorMsg = "Invalid start date";
            return false;
        }

        if (!is_string($data['end_date'])) {
            $this->errorMsg = "Invalid end date";
            return false;
        }

        if (!is_string($data['valid'])) {
            $this->errorMsg = "Invalid valid";
            return false;
        }

        return true;
    }

    // add discount 
    public function add()
    {
        $this->discountModel = new Discount;
        $this->errorMsg = "";
        $data = [
            'type' => $_POST['type'],
            'category' => $_POST['category'],
            'percentage' => $_POST['percentage'],
            'copoun' => $_POST['copoun'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'valid' => $_POST['valid'],
        ];
        if ($this->validateDiscount($data)) {
            $this->discountModel->setType($data['type']);
            $this->discountModel->setCategory($data['category']);
            $this->discountModel->setPercentage($data['percentage']);
            $this->discountModel->setCopoun($data['copoun']);
            $this->discountModel->setStartDate($data['start_date']);
            $this->discountModel->setEndDate($data['end_date']);
            $this->discountModel->setValid($data['valid']);
            if ($this->discountModel->addDiscount()) {
                header('location:dashboard/discount');
                flash("formSuccess", "Discount added successfully", 'form-message form-message-green');
            } else {
                flash("formError", "Failed to add discount to the database", 'form-message form-message-red');
                $this->errorMsg = "Something went wrong, please try again later";
            }
        }
        $_SESSION['error'] = $this->errorMsg;
        header('location:dashboard/discount');
    }
    //edit discount
    public function edit($ID)
    {
        $this->discountModel = new Discount;
        $this->errorMsg = "";
        $data = [
            'type' => $_POST['type'],
            'category' => $_POST['category'],
            'percentage' => $_POST['percentage'],
            'copoun' => $_POST['copoun'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'valid' => $_POST['valid'],
        ];
        if ($this->validateDiscount($data)) {
            $this->discountModel->setType($data['type']);
            $this->discountModel->setCategory($data['category']);
            $this->discountModel->setPercentage($data['percentage']);
            $this->discountModel->setCopoun($data['copoun']);
            $this->discountModel->setStartDate($data['start_date']);
            $this->discountModel->setEndDate($data['end_date']);
            $this->discountModel->setValid($data['valid']);
            if ($this->discountModel->editDiscount($ID)) {
                header('location:dashboard/discount');
            } else {
                $this->errorMsg = "Something went wrong, please try again later";
                
            }
        }
        $_SESSION['error'] = $this->errorMsg;
        header('location:dashboard/discount');
    }

    //delete discount
    public function delete($ID)
    {
        $this->discountModel = new Discount;
        $this->errorMsg = "";
        if ($this->discountModel->deleteDiscount($ID)) {
            header('location:dashboard/discount');
        } else {
            $this->errorMsg = "Something went wrong, please try again later";
        }
        $_SESSION['error'] = $this->errorMsg;
        header('location:dashboard/discount');
    }

    //get all discounts
    public function getAllDiscounts()
    {
        $this->discountModel = new Discount;
        return $this->discountModel->getAllDiscounts();
    }
    

    

}
?>