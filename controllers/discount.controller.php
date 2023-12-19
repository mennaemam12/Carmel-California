<?php
require_once 'models/Item.php';
require_once 'models/Discount.php';
require_once 'helpers/session.helper.php';
include 'projectFolderName.php';

class DiscountController
{
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
            || empty($data['start_date']) || empty($data['end_date'])
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

        if (!is_string($data['start_date'])) {
            $this->errorMsg = "Invalid start date";
            return false;
        }

        if (!is_string($data['end_date'])) {
            $this->errorMsg = "Invalid end date";
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
            'coupon' => $_POST['coupon'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
        ];

        if (!$this->validateDiscount($data)) {
            flash("formError", $this->errorMsg, 'form-message form-message-red');
            redirect($GLOBALS['projectFolder'] . "/dashboard/discount?action=add");
            exit();
        }

        if ($_POST['coupon'] == '')
            $data['coupon'] = NULL;

        $this->discountModel->setType($data['type']);
        $this->discountModel->setCategory($data['category']);
        $this->discountModel->setPercentage($data['percentage']);
        $this->discountModel->setCoupon($data['coupon']);
        $this->discountModel->setStartDate($data['start_date']);
        $this->discountModel->setEndDate($data['end_date']);
        $this->discountModel->setValid();

        if ($this->discountModel->addDiscount()) {
            flash("formSuccess", "Discount added successfully", 'form-message form-message-green');
            redirect($GLOBALS['projectFolder'] . "/dashboard/discount?action=add");
            exit();
        } else
            $this->errorMsg = "Failed to add discount to the database";

        flash("formError", $this->errorMsg);
        redirect($GLOBALS['projectFolder'] . "/dashboard/discount?action=add");
        exit();
    }

    //edit discount
    public function edit()
    {
        if (!isset($_POST['id'])) {
            $this->errorMsg = "Invalid discount";
            flash("formError", $this->errorMsg);
            redirect($GLOBALS['projectFolder'] . "/dashboard/discount?action=edit&id=" . $_POST['id']);
            exit();
        }

        $this->discountModel = new Discount;
        $this->errorMsg = "";

        $data = [
            'id' => $_POST['id'],
            'type' => $_POST['type'],
            'category' => $_POST['category'],
            'percentage' => $_POST['percentage'],
            'coupon' => $_POST['coupon'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'valid' => $_POST['valid'],
        ];

        if (!$this->validateDiscount($data)) {
            flash("formError", $this->errorMsg, 'form-message form-message-red');
            redirect($GLOBALS['projectFolder'] . "/dashboard/discount?action=edit&id=" . $_POST['id']);
            exit();
        }

        $this->discountModel->setID($data['id']);
        $this->discountModel->setType($data['type']);
        $this->discountModel->setCategory($data['category']);
        $this->discountModel->setPercentage($data['percentage']);
        $this->discountModel->setCoupon($data['coupon']);
        $this->discountModel->setStartDate($data['start_date']);
        $this->discountModel->setEndDate($data['end_date']);
        $this->discountModel->setValid($data['valid']);

        if ($this->discountModel->editDiscount($ID)) {
            flash("formSuccess", "Discount edited successfully", 'form-message form-message-green');
            redirect($GLOBALS['projectFolder'] . "/dashboard/discount?action=edit&id=" . $_POST['id']);
            exit();
        }
        flash("formError", "Failed to edit discount");

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