<?php
class Lettuce extends BaseComponent{
    
    public function __construct(){
        $this->description = 'Lettuce';
    }

    public function getPrice(){
        $this->price = Ingredient::findIngredientByName('Lettuce')->Price;
        return $this->price;
    }
    
}
?>