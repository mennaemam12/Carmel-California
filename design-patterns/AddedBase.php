<?php
include_once 'design-patterns/BaseComponent.php';
class AddedBase extends BaseComponent
{
    protected $ingredientName;
    public function __construct($ingredientName)
    {
        $this->ingredientName = $ingredientName;
        $this->description = 'Arugula';
    }
    public function getPrice()
    {
        $this->price = Ingredient::findIngredientByName($this->ingredientName)->Price;
        return $this->price;
    }

}
?>