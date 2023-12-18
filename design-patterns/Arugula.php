<?php
include_once 'design-patterns/BaseComponent.php';
class Arugula extends BaseComponent
{
    public function __construct()
    {
        $this->description = 'Arugula';
    }
    public function getPrice()
    {
        $this->price = Ingredient::findIngredientByName('Arugula')->Price;
        return $this->price;
    }
    
}
?>