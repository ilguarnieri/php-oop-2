<?php

require_once __DIR__.'/models/Product.php';
require_once __DIR__.'/models/Cart.php';
require_once __DIR__.'/models/User.php';
require_once __DIR__.'/models/PayCard.php';
require_once __DIR__.'/models/RegisteredUser.php';

$cart = new Cart();


// GUEST
$guest = new User(
    'Marco',
    'Rossi',
    26,
    'marcorossi@gmail.com',
    'Via Dante30,
    Milano'
);
$guest_card = new PayCard(
    4023601294560374,
    'Marco Rossi',
    10,
    2025,
    547
);

try{
    $guest->addPayment($guest_card);
}catch(Exception $errorCard){
    echo "Errore: ".$errorCard->getMessage();
}


// USER
$user = new RegisteredUser(
    'Angelo',
    'Guarnieri',
    30,
    'guarnieri@gmail.com',
    'Via Aligheri 43, Locorotondo',
    'ilguarnieri',
    'Boolean91'
);
$user_card = new PayCard(
    5333007690032290,
    'Angelo Guarnieri',
    01,
    2022,
    879
);

try{
    $user->addPayment($user_card);
}catch(Exception $errorCard){
    echo "ATTENZIONE: ".$errorCard->getMessage();
}


// PRODOTTO 1
$product1 = new Product(
    'Trasportino per gatti',
    'https://m.media-amazon.com/images/I/81oo7MhcjIL._AC_SY355_.jpg',
    64537,
    'Questa borsa portatile per animali domestici è realizzata in poliestere resistente.',
    35.60,
    '01',
    '12'
);
$product1->addAnimal('gatti');
$product1->addCategory('trasportino');
$product1->addCategory('cucce');


// PRODOTTO 2
$product2 = new Product(
    'Crocchette per cani 4kg',
    'https://arcaplanet.vtexassets.com/arquivos/ids/243809-1200-auto?v=637455010535500000&width=1200&height=auto&aspect=true',
    98736,
    'Alimento secco completo per cani adulti di grande taglia.',
    25.99,
    '01',
    '12'
);
$product2->addAnimal('cani');
$product2->addCategory('alimentazione');


// PRODOTTO 3
$product3 = new Product(
    'Spezzatino con pollo e verdure 82 gr',
    'https://www.isoladeitesori.it/dw/image/v2/BGRZ_PRD/on/demandware.static/-/Sites-it-master-catalog/default/dw039ccf4c/idt/143033.png?sw=800&sh=800',
    28374,
    'Alimento umido per gatti altamente digeribile.',
    1.60,
    '01',
    '12'
);
$product3->addAnimal('gatti');
$product3->addCategory('alimentazione');


// PRODOTTO 4
$product4 = new Product(
    'Frontline Spray 250 ml, Antiparassitario',
    'https://m.media-amazon.com/images/I/41J94o3rryS._AC_.jpg',
    40059,
    'Trattamento antiparassitario contro pulci, zecche e pidocchi.',
    23.99,
    '01',
    '08'
);
$product4->addAnimal('cani');
$product4->addAnimal('gatti');
$product4->addCategory('salute');

try{
    $product4->setAvailableStart('05');
} catch (Exception $error){
    echo "ATTENZIONE".$error->getMessage();
}



$cart->addItem($product2, 5);
$cart->addItem($product4);
$cart->addItem($product3, 5);
$cart->addItem($product3, 8);
$cart->addItem($product1);

$cart->removeItem($product3, 3);


var_dump($guest);
var_dump($user);



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

    <ul>
        <h3>Articoli non disponibili:</h3>
        <?php
        foreach($cart->items_notAvailable as $product){
        ?>
        <li>
            <b><?php
            echo $product->name;
            ?></b><br>
            <b>NON DISPONIBILE</b><br>
            <s>Prezzo: 
            <?php
            echo $product->price;
            ?>€</s>
        </li>
        <?php
        }
        ?>
    </ul>
    
</body>
</html>