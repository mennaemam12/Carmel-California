<?php

class MixGreens extends BaseComponent
{
    public function __construct()
    {
        $this->description = 'Mix Greens';
    }
    public function getPrice()
    {
        $price = Ingredient::findIngredientByName('Mix Greens')['Price'];
        $this->price = $price;
        return $this->price;
    }
    
}
?>