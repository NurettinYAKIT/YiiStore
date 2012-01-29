<div class="wide form span-24">
<form>
<table width="100%">
	<tr>
		<th></th>
		<th>Artist</th>
		<th>Album</th>
		<th>Quantity</th>
		<th>Unit Price</th>
		<th>Extented Price</th>
	</tr>
	<?php
	foreach ($myCarts as $rowCart)
	{
		$albid = $rowCart['albid'];
		$recid = $rowCart['recid'];
		$title = $rowCart['title'];
		$price = $rowCart['price'];
		$name  = $rowCart['name'];
		$count = $rowCart['count'];
		
		?>
	<tr>
		<td><input type="button" name="btn_update" value="Update" /> <input
			type="button" name="btn_delete" value="Delete" /></td>
		<td><?php echo $name; ?></td>
		<td><?php echo $title; ?></td>
		<td><input type="text" name="count" size="2"
			value="<?php echo $count; ?>" /></td>
		<td><?php echo $price; ?></td>
		<?php
		$carttotal=0;
		$linetotal = $price * $count;
		$carttotal = $carttotal+ $linetotal; ?>
		<td><?php echo '$' . $linetotal; ?></td>
	</tr>
	<?php } ?>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td colspan="2">Total :</td>
		<td>$<?php echo $carttotal; ?></td>
	</tr>
	<tr>
		<td colspan="2"><input type="button" name="btn_checkout"
			value="Checkout" /></td>
		<td colspan="2"></td>
		<td colspan="2"></td>
	</tr>
</table>
</form>
</div>
