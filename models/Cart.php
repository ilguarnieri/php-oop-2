<?php

class Cart {

    public $items = [];

    public function addItem($product, $quantity = 1){

        if(empty($this->items)){

            $this->items[] = [
                'item' => $product,
                'quantity' => $quantity
            ];

        }else{
            
            foreach($this->items as $key => $value){
    
                if(in_array($product, $value)){
    
                    $this->items[$key]['quantity']++;
                }else{
    
                    $this->items[] = [
                        'item' => $product,
                        'quantity' => $quantity
                    ];
                }
            }
        }
    }



    //remove item
}