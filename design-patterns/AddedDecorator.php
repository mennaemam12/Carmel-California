<?php

class AddedDecorator extends SaladDecorator
{
    protected $base;
    protected $ingredientName;
    public function __construct(BaseComponent $base, $ingredientName)
    {
        parent::__construct($base);
        $this->description = $base->getDescription() . '+ '.$ingredientName;
        $this->ingredientName = $ingredientName;
    }

    public function getPrice()
    {
        $this->price = Ingredient::findIngredientByName($this->ingredientName)->Price;
        return $this->price;
    }
}
?>