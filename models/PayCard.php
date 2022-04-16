<?php

class PayCard {

    public $number;
    public $owner;
    public $validMonth;
    public $validYear;
    public $cvv;

    public function __construct($_number, string $_owner, int $_validMonth, int $_validYear, int $_cvv)
    {
        $this->number = $_number;
        $this->owner = $_owner;
        $this->validMonth = $_validMonth;
        $this->validYear = $_validYear;
        $this->cvv = $_cvv;
    }
}