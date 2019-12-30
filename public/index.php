<?php

	// hier includen we de boot.php
	include "../boot.php";

	// hier geven we de database een variabele $database
	$database = db();
	
	// hier laden we de producten in onze website
	$products = $database->prepare('SELECT * FROM products ORDER BY id DESC LIMIT 6');
	try{
		$products->execute([]);
		$products->setFetchmode(PDO::FETCH_ASSOC);
		$products = $products->fetchAll();	
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
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Song+Myung" rel="stylesheet">
</head>
<body>
	<section>
		<img class="banner" src="images/banner.jpg">
		<ul>
	 		<li><a href="index.php">Home</a></li>	
			<li><a href="ShoppingcartFORM.php">Order</a></li>
		</ul>
		<div class="achtergrond">
			<section id="products">
				<h1 class="hoofd">Alae's Exotic Animal Planet</h1><br><br>
			        <div class="container">
			            <div class="row">
			                <?php  foreach($products as $product){ ?>
				                <div class="col-lg-4 product">
			                        <p class="title"><?php echo $product['title']; ?></p>
			                        <a href="product/<?php echo $product['slug'] ?>">
			                        	<img class="afb" src="images/<?php echo $product['image']; ?>">
			                    	</a>
			                        <p> €<?php echo $product['price']; ?></p>
			                        <button class="btn btn-success add-to-cart" data-url="cart/add.php?id=<?php echo $product['id']; ?>">Add product</button>
			                        <button class="btn btn-danger remove-from-cart" data-url="cart/remove.php?id=<?php echo $product['id']; ?>">Remove product</button>
		                    	</div>
		                    <?php } ?>
		                </div>
		            </div>
			</section>
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
</body>
</html>