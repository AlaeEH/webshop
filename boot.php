<?php

// hier starten we een nieuwe sessie
session_start();

// hier laden we http.php en cart.php in
require 'classes/Http.php';
require 'classes/Cart.php';

// hier laden we de functie http in via http.php
Http::boot();

// als er geen sessie gestart is voor je cart wordt de cart gereset
if (! isset($_SESSION['cart'])) {
    Cart::reset();
}

// met deze functie maken wij een connectie met de database
function db()
{
    $host = 'localhost';
    $database = 'webshop';
    $username = 'root';
    $password = '';

    // probeert connectie te maken en geeft de connectie terug
    try {
        $connection = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    }
    // als het niet gelukt is om connectie te maken returnt het een error message
    catch(PDOException $e) {
        dd($e->getMessage());
    }
}

// load all the base functions
function dd($text)
{
    if(is_array($text) || is_object($text)) {
        var_dump($text);
        die();
    }
    else {
        die($text);
    }
}

// deze functie retourneert de webroot met de opgegeven path
function asset($path)
{
    return Http::webroot().$path;
}