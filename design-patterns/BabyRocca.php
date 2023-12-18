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
        $this->price = Ingredient::findIngredientByName('BabyRocca')->Price;
        return $this->price;
    }
    
}
?>