<?php
include_once 'design-patterns/BaseComponent.php';
class Cabbage extends BaseComponent
{
    public function __construct()
    {
        $this->description = 'Cabbage';
    }
    public function getPrice()
    {
        $this->price = Ingredient::findIngredientByName('Cabbage')->Price;
        return $this->price;
    }
    
}
?>