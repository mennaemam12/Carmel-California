<?php

class BabyRocca extends BaseComponent
{
    public function __construct()
    {
        $this->description = 'Baby Rocca';
    }
    public function getPrice()
    {
        $price = Ingredient::findIngredientByName('BabyRocca')['Price'];
        $this->price = $price;
        return $this->price;
    }
    
}
?>