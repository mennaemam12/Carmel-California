<?php
abstract class BaseComponent{
    protected $price;
    protected $description;

    public function __construct(){
        $this->description= "Unknown Base";
    }
    abstract public function getPrice();
    public function getDescription(){
        return $this->description;
    }
    
}

?>