<?php

class Cart {

    public $items_list = [];
    public $total_items = 0;
    public $total_price = 0;

    //aggiunta prodotto
    public function addItem($product, $quantity = 1){

        $item_not_present = false;

        //controllo se il carrello è vuoto
        if(count($this->items_list) == 0){

            $item_not_present = true;

        }else{

            //recupero chiave se il prodotto è presente nel carrello
            $key = (array_search($product, array_column($this->items_list, 'item')));

            if(is_numeric($key)){

                //prodotto presente aumento la quantità
                $this->items_list[$key]['quantity'] += $quantity;
            }else{

                //prodotto non presente
                $item_not_present = true;
            }    
        }

        if($item_not_present){

            //push prodotto nel carrello   
            $this->items_list[] = [
                'item' => $product,
                'quantity' => $quantity
            ];
        }

        $this->total_items = $this->total_items + $quantity;
        $this->total_price += ($product->price * $quantity);    
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