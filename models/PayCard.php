<?php

class PayCard {

    public $number;
    public $owner;
    public $validDate;
    public $cvv;

    public function __construct($_number, string $_owner, $_validDate, int $_cvv)
    {
        $this->number = $_number;
        $this->owner = $_owner;
        $this->validDate = $_validDate;
        $this->cvv = $_cvv;
    }

    public function isExpired(){
        //controllo scadenza true o false
    }
}