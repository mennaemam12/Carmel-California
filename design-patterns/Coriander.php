<?php

class Coriander extends BaseComponent
{
    public function __construct()
    {
        $this->description = 'Coriander';
    }
    public function getPrice()
    {
        $price = Ingredient::findIngredientByName('Coriander')['Price'];
        $this->price = $price;
        return $this->price;
    }
    
}
?>