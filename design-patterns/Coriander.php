<?php
include_once 'design-patterns/BaseComponent.php';
class Coriander extends BaseComponent
{
    public function __construct()
    {
        $this->description = 'Coriander';
    }
    public function getPrice()
    {
        $this->price = Ingredient::findIngredientByName('Coriander')->Price;
        return $this->price;
    }
    
}
?>