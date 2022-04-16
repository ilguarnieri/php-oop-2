<?php

class User {

    public $name;
    public $surname;
    public $age;
    public $email;
    public $adress;
    protected $sale;
    public $paymentMethods = [];


    public function __construct(string $_name, string $_surname, int $_age, string $_email, $_adress, $_sale = 0)
    {

        $this->name = $_name;
        $this->surname = $_surname;
        $this->age = $_age;
        $this->email = $_email;
        $this->adress = $_adress;
        $this->sale = $_sale;
        
    }

    public function addPayment($card){

        //controllo se la card è già presente

        //scadenza

        $this->paymentMethods[] = $card;
    }

    public function getSale(){
        return $this->sale;
    }

    public function setSale($sale){
        if(is_numeric($sale) && $sale > 0){
            $this->sale = $sale;
        }
    }
}