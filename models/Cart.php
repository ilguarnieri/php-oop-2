<?php

class Cart {

    public $items_list = [];
    public $items_notAvailable = [];
    public $total_items = 0;
    public $total_price = 0;

    //aggiunta prodotto
    public function addItem($product, $quantity = 1){

        $item_not_present = false;
        $product_available = false;

        //controllo se il prodotto è disponibile
        $monthStart = $product->getAvailableStart();
        $monthEnd = $product->getAvailableEnd();

        //recupero mese attuale
        $timestamp = strtotime("now");
        $monthNow = date('m', $timestamp);

        if($monthNow >= $monthStart && $monthNow <= $monthEnd){
            $product_available = true;
        }

        //controllo se il carrello è vuoto
        if(count($this->items_list) == 0 && $product_available){

            $item_not_present = true;

        }else{

            //recupero chiave se il prodotto è presente nel carrello
            $key = (array_search($product, array_column($this->items_list, 'item')));

            if(is_numeric($key) && $product_available){

                //prodotto presente aumento la quantità
                $this->items_list[$key]['quantity'] += $quantity;

            }else{

                //prodotto non presente
                $item_not_present = true;
            }    
        }

        //push prodotto se non presente nel carrello
        if($item_not_present && $product_available){

            //push prodotto nel carrello   
            $this->items_list[] = [
                'item' => $product,
                'quantity' => $quantity
            ];
        }

        //variazione totale in base alla disponibilità del prodotto
        if($product_available){
            
            $this->total_items = $this->total_items + $quantity;
            $this->total_price += ($product->price * $quantity);    
        }else{

            array_push($this->items_notAvailable, $product);
        }
    }

    //rimuovi tutte le quantità di un prodotto
    public function removeItem($product, $quantity = 1){

        foreach($this->items_list as $key => $value){

            $item = $value['item'];

            //corrispodenza id prodotto da rimuovere
            if($product->id === $item->id){

                //se il numero di prodotti da rimuovere supera quello presente nel carrello
                if($quantity > $this->items_list[$key]['quantity']){
    
                    $quantity = $this->items_list[$key]['quantity'];
                }

                //riduco quantità del singolo prodotto
                $this->items_list[$key]['quantity'] -= $quantity;
                
                //se presente un solo prodotto verrà eliminato altrimenti sarà decrementata solo la quantità
                if($this->items_list[$key]['quantity'] < 1){
                    
                    unset($this->items_list[$key]);
                }

                //ricalcolo dei totali
                $this->total_items = $this->total_items - $quantity;
                $this->total_price -= ($product->price * $quantity);                
            }
        }
    }
}