<?php
include_once 'design-patterns/BaseComponent.php';
class MixGreens extends BaseComponent
{
    public function __construct()
    {
        $this->description = 'Mix Greens';
    }
    public function getPrice()
    {
        $this->price = Ingredient::findIngredientByName('Mix Greens')->Price;
        return $this->price;
    }
    
}
?>