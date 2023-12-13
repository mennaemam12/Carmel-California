<?php

class Cabbage extends BaseComponent
{
    public function __construct()
    {
        $this->description = 'Cabbage';
    }
    public function getPrice()
    {
        $price = Ingredient::findIngredientByName('Cabbage')['Price'];
        $this->price = $price;
        return $this->price;
    }
    
}
?>