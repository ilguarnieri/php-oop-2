<?php

require_once __DIR__.'/models/Product.php';
require_once __DIR__.'/models/Cart.php';
require_once __DIR__.'/models/User.php';

$cart = new Cart();

$guest = new User('Marco', 'Rossi', 26, 'marcorossi@gmail.com', 'Via Dante30, Milano');


$product1 = new Product(
    'Trasportino per gatti',
    'https://m.media-amazon.com/images/I/81oo7MhcjIL._AC_SY355_.jpg',
    64537,
    'Questa borsa portatile per animali domestici è realizzata in poliestere resistente.',
    35.60
);
$product1->addAnimal('gatti');
$product1->addCategory('trasportino');
$product1->addCategory('cucce');


$product2 = new Product(
    'Crocchette per cani 4kg',
    'https://arcaplanet.vtexassets.com/arquivos/ids/243809-1200-auto?v=637455010535500000&width=1200&height=auto&aspect=true',
    98736,
    'Alimento secco completo per cani adulti di grande taglia.',
    25.99
);
$product2->addAnimal('cani');
$product2->addCategory('alimentazione');










$cart->addItem($product2);

$cart->addItem($product1, 4);




$cart->removeItem($product1, 3);


var_dump($cart);


var_dump($guest);










?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-commerce</title>
</head>
<body>

    <ul>
        <h3>Articoli nel carrello:</h3>
        <?php
        foreach($cart->items_list as $product){
        ?>
        <li>
            <b><?php
            echo $product['item']->name;
            ?></b><br>
            Quantità: 
            <?php
            echo $product['quantity'];
            ?><br>
            Prezzo: 
            <?php
            echo $product['item']->price;
            ?>€

        </li>
        <?php
        }
        ?>
    </ul>

    <p>Numero articoli: <?= $cart->total_items ?></p>

    <p>Totale carrello: <?= $cart->total_price ?>€</p>
    
</body>
</html>