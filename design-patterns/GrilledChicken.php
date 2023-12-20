<?php
include_once 'design-patterns/SaladDecorator.php';
class GrilledChicken extends SaladDecorator
{
    protected $base;
    public function __construct(BaseComponent $base)
    {
        parent::__construct($base);
        $this->base = $base;
    }
    public function getPrice()
    {
        $this->price = Ingredient::findIngredientByName('Grilled Chicken')->Price;
        return $this->price;
    }

}
?>