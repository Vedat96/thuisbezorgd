<h2>Winkelmand </h2>

<table class="table">
	<thead>
		<tr>
			<th>Titel</th>
			<th>Aantal</th>
			<th>Prijs</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($_SESSION['cart']['products'] as $cartProduct) { ?>
		<tr>
			<td><?php echo $cartProduct['title']; ?>
			<button type="button" class="add-to-cart" data-url="cart/add.php?id=<?php echo $cartProduct['id']; ?>">+</button> 
            <button type="button" class="remove-from-cart" data-url="cart/remove.php?id=<?php echo $cartProduct['id']; ?>">-</button></td> 
			<td><?php echo $cartProduct['quantity']; ?></td>
			<td><?php echo $cartProduct['price']; ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<h3>Subtotaal: <?php echo $_SESSION['cart']['total']; ?></h3>
<div class="cart-button"><a href="<?php echo asset('pay.php'); ?>"><button type="button">Order</button></a><br></div>