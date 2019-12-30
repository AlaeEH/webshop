<?php

?>

<h1 class="hoofd1">Shoppingcart</h1>

<table class="table">
	<head>
		<tr>
			<th>Title</th>
			<th>Quantity</th>
			<th>Price</th>
		</tr>
	</head>
	<tbody>
		<!-- hier laden we de cart in  -->
		<?php foreach($_SESSION['cart']['products'] as $cartProduct) { ?>
		<tr>
			<td><?php echo $cartProduct['title']; ?></td>
			<td><?php echo $cartProduct['quantity']; ?></td>
			<td><?php echo $cartProduct['price']; ?></td>
		</tr>
	    <?php } ?>
	</tbody>	
</table>

<h2 class="hoofd2">Subtotal: €<?php echo $_SESSION['cart']['total']; ?>,-</h2>
<form action="<?php echo asset("shoppingcartFORM.php"); ?>">
<button class="knoporder">Order!</button>
</form>