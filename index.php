<?php

require_once __DIR__.'/models/Product.php';
require_once __DIR__.'/models/Cart.php';

$cart = new Cart();


$product1 = new Product(
    'Trasportino per gatti',
    'https://m.media-amazon.com/images/I/81oo7MhcjIL._AC_SY355_.jpg',
    'Questa borsa portatile per animali domestici è realizzata in poliestere resistente',
    35.60
);
$product1->addAnimal('gatti');
$product1->addCategory('trasportino');
$product1->addCategory('cucce');


$cart->addItem($product1);
$cart->addItem($product1);

var_dump($product1);
var_dump($cart);