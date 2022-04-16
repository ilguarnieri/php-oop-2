<?php

class Product {

    public $name;
    public $image;
    public $id;
    public $description;
    public $price;
    protected $availableStart;
    protected $availableEnd;
    public $animals = [];
    public $categories = [];

    public function __construct(string $_name, string $_image, int $_id, string $_description, float $_price, $_availableStart, $_availableEnd)
    {
        $this->name = $_name;
        $this->image = $_image;
        $this->id = $_id;
        $this->description = $_description;
        $this->price = $_price;
        $this->availableStart = $_availableStart;
        $this->availableEnd = $_availableEnd;
    }

    //AGGIUNGERE CATEGORIA ANIMALI
    public function addAnimal($_animal){
        if(!is_numeric($_animal) && !in_array(strtolower($_animal), $this->animals)){
            $this->animals[] = strtolower($_animal);
        }
    }

    //AGGIUNGERE CATEGORIA GENERE PRODOTTO
    public function addCategory($_category){
        if(!is_numeric($_category) && !in_array(strtolower($_category), $this->categories)){
            $this->categories[] = strtolower($_category);
        }
    }

    //X LEGGERE IL MESE DI INIZIO DISPONIBILIÀ
    public function setAvailableStart(){
        return $this->availableStart;
    }

    //X MODIFICARE IL MESE DI INIZIO DISPONIBILITÀ
    public function getAvailableStart($_availableMonth){
        if(is_numeric($_availableMonth) && $_availableMonth > 0 && $_availableMonth <= 12){
            $this->availableStart = $_availableMonth;
        } else {
            throw new Exception("Inserisci un mese valido");
        }
    }

    //X LEGGERE IL MESE DI FINE DISPONIBILIÀ
    public function setAvailableEnd(){
        return $this->availableStart;
    }

    //X MODIFICARE IL MESE DI FINE DISPONIBILITÀ
    public function getAvailableEnd($_availableMonth){
        if(is_numeric($_availableMonth) && $_availableMonth > 0 && $_availableMonth <= 12){
            $this->availableEnd = $_availableMonth;
        } else {
            throw new Exception("Inserisci un mese valido");
        }
    }
}