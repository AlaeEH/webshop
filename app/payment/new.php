<?php

try {

    // transaction starten
    $connection = db();
    $connection->beginTransaction();

    // user aanmaken
    $query = 'INSERT INTO `users`
    (first_name, suffix_name, last_name, country, city, street, street_number, street_suffix, zipcode, email, password, created_at, updated_at)
    VALUES
    (:first_name, :suffix_name, :last_name, :country, :city, :street, :street_number, :street_suffix, :zipcode, :email, :password, :created_at, :updated_at)';

    // we stoppen alle gebruiker gegevens in de variabele $data
    $data = [
        'first_name' => standardizeName($_POST['first_name']),
        'suffix_name' => trim($_POST['suffix_name']),
        'last_name' => standardizeName($_POST['last_name']),
        'country' => $_POST['country'],
        'city' => standardizeName($_POST['city']),
        'street' => standardizeName($_POST['street']),
        'street_number' => $_POST['street_number'],
        'street_suffix' => $_POST['street_suffix'],
        'zipcode' => standardizePostcode($_POST['zipcode']),
        'email' => strtolower($_POST['email']),
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ];


    // query voorbereiden
    $products = $connection->prepare($query);
    $products->execute($data);

    $userId = $connection->lastInsertId();


    // order aanmaken
    $query = 'INSERT INTO `orders`
    (amount, payment_status, user_id, created_at, updated_at)
    VALUES
    (:amount, :payment_status, :user_id, :created_at, :updated_at)';

    // query voorbereiden
    $products = $connection->prepare($query);

    // hier pleuren we de order gegevens in de database 
    $products->execute([
        'amount' => $_SESSION['cart']['total'],
        'payment_status' => 'open',
        'user_id' => $userId,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ]);

    $orderId = $connection->lastInsertId();

    // product_order koppellen
    $queryOrder = 'INSERT INTO `orders_products`
    (order_id, product_id, price, quantity, created_at, updated_at)
    VALUES
    (:order_id, :product_id, :price, :quantity, :created_at, :updated_at)';

    $productOrder = $connection->prepare($queryOrder);

    // hier pleuren we de order_product gegevens in de database
    foreach($_SESSION['cart']['products'] as $id => $product) {
        $productOrder->execute([
            'order_id' => $orderId,
            'product_id' => $product['id'],
            'price' => $product['price'],
            'quantity' => $product['quantity'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    } 

    // hiermee versturen alles naar de database
    $connection->commit();

    // doorsturen naar betaling gelukt/mislukt
    header('location: '.asset('ordersucces.html'));
}

catch(Exception $e) {
    // transaction rollback
    $connection->rollBack();

    dd($e->getMessage());
}

// hiermee geven we restricitons aan de postcode
function standardizePostcode($postcode)
{
    return strtoupper(chunk_split($postcode, 4, ' '));
}

//  hiermee geven we aan dat de naam een string MOET zijn
function standardizeName($string)
{
    return ucfirst(trim($string));
}
?>