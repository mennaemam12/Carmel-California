<?php

class Lettuce extends BaseComponent{
    
    public function __construct(){
        $this->description = 'Lettuce';
    }
    public function getPrice(){
        $price = Ingredient::findIngredientByName('Lettuce')['Price'];
        $this->price = $price;
        return $this->price;
    }
    
}
?>