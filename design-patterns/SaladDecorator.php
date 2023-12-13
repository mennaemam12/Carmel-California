<?php

class SaladDecorator extends BaseComponent
{
    protected $base;
    public function __construct(BaseComponent $base){
        $this->base = $base;
    }

    public function getPrice(){
        return $this->base->getPrice();
    }
    public function getDescription(){
        return $this->base->getDescription();
    }
}
?>