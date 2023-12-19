<?php
include_once 'design-patterns/BaseComponent.php';
class BabyRocca extends BaseComponent
{
    public function __construct()
    {
        $this->description = 'Baby Rocca';
    }
    public function getPrice()
    {
        $this->price = Ingredient::findIngredientByName('Baby Rocca')->Price;
        return $this->price;
    }
    
}
?>