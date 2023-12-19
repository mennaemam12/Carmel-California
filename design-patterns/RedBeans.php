<?php
include_once 'design-patterns/SaladDecorator.php';
class RedBeans extends SaladDecorator
{
    protected $base;
    public function __construct(BaseComponent $base)
    {
        parent::__construct($base);
        $this->base = $base;
    }

    public function getPrice()
    {
        $this->price =  Ingredient::findIngredientByName('Red Beans')->Price;
        return $this->price;
    }
}
?>