<?php
class ItemOption{
    protected $db;
    private $category;
    private $criteria;
    private $options;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function getCriteria() {
        return $this->criteria;
    }

    public function setCriteria($criteria) {
        $this->criteria = $criteria;
    }

    public function getOptions() {
        return $this->options;
    }

    public function setOptions($options) {
        $this->options = $options;
    }

    public function addOption(){
        $categoryID = $this->db->getCategoryIdByName($this->category);

        // Check if the category ID was found
        if ($categoryID !== false) {
            // Category exists, proceed to insert into options table
            $this->db->query('INSERT INTO options (Category_id, Criteria) VALUES (:categoryID, :criteria)');
            $this->db->bind(':categoryID', $categoryID);
            $this->db->bind(':criteria', $this->criteria);
        
            // Execute the query
            $this->db->execute();
        } 
        
    }

}


?>