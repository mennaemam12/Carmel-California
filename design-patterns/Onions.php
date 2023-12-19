<?php
include_once 'design-patterns/SaladDecorator.php';
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
        $this->price = Ingredient::findIngredientByName('Onions')->Price;
        return $this->price;
    }
}
?>