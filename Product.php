<?php

class Product {

    public $name;
    public $image;
    public $description;
    public $price;
    public $animal;
    public $categories;

    public function __construct($_name, $_image, $_description, $_price)
    {
        $this->name = $_name;
        $this->image = $_image;
        $this->description = $_description;
        $this->price = $_price;
    }

}