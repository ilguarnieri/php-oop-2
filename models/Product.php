<?php

class Product {

    public $name;
    public $image;
    public $id;
    public $description;
    public $price;
    public $animals = [];
    public $categories = [];

    public function __construct(string $_name, string $_image, int $_id, string $_description, float $_price)
    {
        $this->name = $_name;
        $this->image = $_image;
        $this->id = $_id;
        $this->description = $_description;
        $this->price = $_price;
    }

    public function addAnimal($_animal){
        if(!is_numeric($_animal) && !in_array(strtolower($_animal), $this->animals)){
            $this->animals[] = strtolower($_animal);
        }
    }

    public function addCategory($_category){
        if(!is_numeric($_category) && !in_array(strtolower($_category), $this->categories)){
            $this->categories[] = strtolower($_category);
        }
    }

}