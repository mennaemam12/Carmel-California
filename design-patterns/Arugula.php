<?php

class Arugula extends BaseComponent
{
    public function __construct()
    {
        $this->description = 'Arugula';
    }
    public function getPrice()
    {
        $price = Ingredient::findIngredientByName('Arugula')['Price'];
        $this->price = $price;
        return $this->price;
    }
    
}
?>