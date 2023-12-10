<?php
require_once 'database.php';

class Review
{
    protected $db;
    protected $id;
    protected $user_id;
    protected $item_id;
    protected $message;
    protected $rating;
    protected $userName;
    protected $date;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setItem($item_type, $item_id)
    {
        $this->item_type = $item_type;
        $this->item_id = $item_id;
    }

    public function getItemType()
    {
        return $this->item_type;
    }

    public function getItemId()
    {
        return $this->item_id;
    }

    public function setRating($rating)
    {
        if ($rating > 5 || $rating < 1)
            return false;
        $this->rating = $rating;
        return true;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setUserName($name)
    {
        $this->userName = $name;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function add()
    {
        $this->db->query('INSERT INTO reviews (user_id, item_id, item_type, message, rating) 
        VALUES (:userID, :itemID, :itemType, :message, :rating)');

        $this->db->bind(':userID', $this->user_id);
        $this->db->bind(':itemID', $this->item_id);
        $this->db->bind(':itemType', $this->item_type);
        $this->db->bind(':message', $this->message);
        $this->db->bind(':rating', $this->rating);


        if ($this->db->execute())
            return true;

        return false;
    }

    public static function getReviews($item_type, $item_id)
    {
        $db = new Database;
        $db->query('SELECT reviews.*, users.FullName as name  
                FROM reviews 
                JOIN users ON reviews.user_id = users.id 
                WHERE reviews.item_id = :itemID AND reviews.item_type = :itemType');
        $db->bind(':itemID', $item_id);
        $db->bind(':itemType', $item_type);
        $rows = $db->resultSet();


        $reviews = [];
        if ($db->rowCount() <= 0)
            return [];

        foreach ($rows as $row) {
            $review = new Review;
            $review->setItem($row->item_type, $row->item_id);
            $review->setMessage($row->message);
            $review->setRating($row->rating);
            $review->setDate($row->date);
            $review->setUserName($row->name);
            $reviews[] = $review;
        }
        return $reviews;
    }

}

?>