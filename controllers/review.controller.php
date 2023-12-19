<?php
require_once 'models/Review.php';
require_once 'models/User.php';
require_once 'helpers/session.helper.php';
require_once 'controllers/item.controller.php';

class ReviewController
{
    private $reviewModel;
    private $errorMsg = "";

    public function __construct()
    {
    }

    public function validate($data)
    {
        $this->errorMsg = "";
        if (
            empty($data['message'])
        ) {
            $this->errorMsg = "Review cannot be empty";
            return false;
        }

        if ($data['rating'] > 5 || $data['rating'] < 1) {
            $this->errorMsg = "Invalid Rating";
            return false;
        }

        return true;
    }

    public function add()
    {
        if (!isset($_SESSION['user'])) {
            flash("reviewError", "You must be logged in to add a review", 'form-message form-message-red');
            redirect("/product?type=" . $_SESSION['itemType'] . "&id=" . $_SESSION['itemID']);
            exit();
        }

        $user = new User;
        $user->unserialize($_SESSION['user']);

        //Init data
        $data = [
            'user_id' => $user->getID(),
            'item_id' => $_SESSION['itemID'],
            'item_type' => $_SESSION['itemType'],
            'message' => trim($_POST['review-message']),
            'rating' => trim($_POST['rating'])
        ];

        if (!ItemController::doesExist($data['item_type'], $data['item_id'])) {
            flash("reviewError", "Item not found", 'form-message form-message-red');
            redirect("/product?type=" . $data['item_type'] . "&id=" . $data['item_id']);
            exit();
        }

        if ($this->validate($data)) {
            // Validation successful, create a Review object
            $this->reviewModel = new Review();

            $this->reviewModel->setUserId($data['user_id']);
            $this->reviewModel->setItem($data['item_type'], $data['item_id']);
            $this->reviewModel->setMessage($data['message']);
            $this->reviewModel->setRating($data['rating']);

            if ($this->reviewModel->add()) {
                flash("reviewError", "Review added successfully", 'form-message form-message-green');
                redirect("/product?type=" . $data['item_type'] . "&id=" . $data['item_id']);
                exit();
            }

            flash("reviewError", "Failed to add review to the database", 'form-message form-message-red');
            redirect("/product?type=" . $data['item_type'] . "&id=" . $data['item_id']);
            exit();
        }
    }
}
