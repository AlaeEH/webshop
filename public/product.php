<?php

	// hier laden we boot.php in
	include "../boot.php";

	// hier geven we onze database de variabele $database
	$database = db();
	
	// hier zorgen we ervoor dat we een slug kunnen gebruiken in onze url
	$product = $database->prepare('SELECT * FROM products WHERE slug = :slug');
	
	// hier kunnen we naar een bepaald product zoeken via de zogenaamde 'slug'
	try{
		$product->execute([
			'slug' => $_GET['slug']
		]);
		$product->setFetchmode(PDO::FETCH_ASSOC);
		$product = $product->fetch();
		
		// ALS het product niet bestaat word je doorgestuurd naar 404.php
		if (! $product) {
			header('Location: ../404.php');
		}	

	}

	catch(Exception $e){
		http_response_code(500);
		dd($e->getMessage());
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Webshop</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Song+Myung" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../product.css">
</head>
<body>
	<section>
		<img class="banner" src="../images/banner.jpg">
		<ul>
		 	<li><a href="../index.php">Home</a></li>
			<li><a href="../ShoppingcartFORM.php">Order</a></li>
		</ul>
		<div class="achtergrond">
			<!-- hier laden we de product gegevens in -->
			<br><br>	
			<div class="hoofd"><?php echo $product['title']; ?></div><br>
			<img class="afb" src="../images/<?php echo $product['image']; ?>">
			
			<div class="description"><?php echo $product['description']; ?></div><br>
			<div class="price">€<?php echo $product['price']; ?></div>
			<button class="btn btn-success add-to-cart" data-url="../cart/add.php?id=<?php echo $product['id']; ?>">Add product</button>
		</div>
	</section>

	<aside class="bucket" id="bucket">
		<?php include "partials/bucket.php"; ?>
	</aside>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			bucket();
		})

		function bucket()
		{
		    $('.add-to-cart, .remove-from-cart').unbind('click').click(function(event) {
		        event.preventDefault();

		        // alert($(this).data('url'));

		        jQuery.ajax($(this).data('url'), {
		            method: 'post',
		            cache: false,
		            // dataType: 'json',
		        })
		        .done(function(data) {
		            if(data) {
		                $('#bucket').html(data);
		                bucket();
		            }
		        })
		        .fail(function() {
		            alert( "error" );
		            bucket();
		        });
		    });
		}
	</script>