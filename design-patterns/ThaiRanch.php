<?php

class ThaiRanch extends SaladDecorator
{
    protected $base;
    public function __construct(BaseComponent $base)
    {
        parent::__construct($base);
        $this->base = $base;
    }
    public function getPrice()
    {
        $this->price = Ingredient::findIngredientByName('Thai Ranch')->Price;
        return $this->price;
    }

}
?>