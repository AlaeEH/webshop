<?php

// hiermee laden we boot.php in
require '../../boot.php';

// hiermee kunnen we een product toevoegen aan de cart
Cart::addToCart($_GET['id']);

// hier laden we bucket.php in
require '../partials/bucket.php';