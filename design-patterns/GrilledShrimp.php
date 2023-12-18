<?php

class GrilledShrimp extends SaladDecorator
{
    protected $base;
    public function __construct(BaseComponent $base)
    {
        parent::__construct($base);
        $this->base = $base;
    }
    public function getPrice()
    {
        $this->price = Ingredient::findIngredientByName('Grilled Shrimp')->Price;
        return $this->price;
    }

}
?>