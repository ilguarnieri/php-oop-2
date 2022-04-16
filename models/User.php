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

        //controllo se la carta è già presente
        if(in_array($card, $this->paymentMethods)){

            throw new Exception ("$this->name il tuo metodo di pagamento è presente nel sistema!");
        }else{

            //recupero data attuale
            $timestamp = strtotime("now");
            $nowDate = date('Y-m-d', $timestamp);            

            //concatenazione data scadenza carta
            $month = $card->validMonth;
            $year = $card->validYear;
            $dateCard = sprintf("%s-%s-30", $year, $month);

            //confronto date
            $date1 = date_create($nowDate);
            $date2 = date_create($dateCard);
            
            $diff = date_diff($date1, $date2);

            if($diff->format("%R%a") > 0){

                // carta valida
                $this->paymentMethods[] = $card;
            }else{

                //carta scaduta
                throw new Exception ("$this->name la carta inserita è scaduta!");
            }           
        }
    }

    public function getSale(){
        return $this->sale;
    }

    public function setSale($sale){
        if(is_numeric($sale) && $sale > 0 && $sale < 0.2){
            $this->sale = $sale;
        }
    }
}