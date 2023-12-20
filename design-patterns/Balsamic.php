<?php
include_once 'design-patterns/SaladDecorator.php';
class Balsamic extends SaladDecorator
{
    protected $base;
    public function __construct(BaseComponent $base)
    {
        parent::__construct($base);
        $this->base = $base;
    }
    public function getPrice()
    {
        $this->price = Ingredient::findIngredientByName('Balsamic')->Price;
        return $this->price;
    }

}
?>