<?php

// hiermee laden we boot.php in
require '../../boot.php';

// hiermee kunnen we een product weghalen uit onze cart
Cart::removeFromCart($_GET['id']);

// hiermee laden we bucket.php in
require '../partials/bucket.php';