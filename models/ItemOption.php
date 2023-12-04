<?php
require_once 'database.php';
require_once 'models/Item.php';
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
            $lastInsertedOptionId = $this->db->lastInsertId();
            foreach($this->options as $value){
                // Insert into option_values table
                $this->db->query('INSERT INTO option_values (id_options, value) VALUES (:optionID, :optionValue)');
                $this->db->bind(':optionID', $lastInsertedOptionId);
                $this->db->bind(':optionValue', $value);
                $this->db->execute();
            }
            return true;
        } 
        return false;
        
    }

    private function getOptionValues($valuesID,$criteria){
        // Now, get the option values
        $sqlOptionValues = 'SELECT ov.value
        FROM option_values ov
        WHERE ov.id_options = :valuesID';

        $this->db->query($sqlOptionValues);
        $this->db->bind(':valuesID', $valuesID);

        $optionValuesRows = $this->db->resultSet();
        $optionValues=[];
        foreach($optionValuesRows as $ovr){
            array_push($optionValues, $ovr->value);
        }

        return ['criteria' => $criteria, 'values' => $optionValues];
   }

    public static function getItemOptions($itemType,$itemID){
        $db=new Database;
        $item = Item::findItemByID($itemType, $itemID);

        $sql = 'SELECT o.id,o.Criteria 
        FROM options o
        INNER JOIN categories c ON o.Category_id = c.id
        WHERE c.Name = :categoryName';

        $db->query($sql);
        $db->bind(':categoryName', $item->Category);

        $rows = $db->resultSet();
        $result=[];
        foreach ($rows as $row) {
            $valuesID = $row->id;
            $criteria = $row->Criteria;
    
            $itemOption = new ItemOption();
            $result[] = $itemOption->getOptionValues($valuesID, $criteria);
        }
    
        return $result;
    }

  

}


?>