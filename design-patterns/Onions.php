<?php

class Onions extends SaladDecorator
{
    protected $base;
    public function __construct(BaseComponent $base)
    {
        parent::__construct($base);
        $this->base = $base;
    }

    public function getPrice()
    {
        $price = Ingredient::findIngredientByName('Onions')['Price'];
        return $price + $this->base->getPrice();
    }
}
?>