<?php
include_once 'design-patterns/SaladDecorator.php';
class CherryTomato extends SaladDecorator
{
    protected $base;
    public function __construct(BaseComponent $base)
    {
        parent::__construct($base);
        $this->description = $base->getDescription() . ', Cherry Tomato';
    }

    public function getPrice()
    {
        $this->price = Ingredient::findIngredientByName('Cherry Tomato')->Price;
        return $this->price;
    }
}
?>