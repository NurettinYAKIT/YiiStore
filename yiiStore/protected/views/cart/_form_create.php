<?php
$date = date('Y-m-d H:i:s');
if (isset($_GET['aid']) && isset($_GET['albid']))
{
	foreach ($myCarts as $rowCart)
	{
		$albid = $rowCart['albid'];
		$recid = $rowCart['recid'];
		$title = $rowCart['title'];
		$price = $rowCart['price'];
		$name  = $rowCart['name'];
		$count = $rowCart['count'];
	}
	?>
<div class="wide form span-24">
<form name="frm_create" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<input type="hidden" name="Cart[CartId]"
	   value="<?php echo $_SESSION['cartid']; ?>" /> 
<input type="hidden" name="Cart[DateCreated]"
	   value="<?php echo $date; ?>" />
<input type="hidden" name="Cart[AlbumId]"
	   value="<?php echo $_GET['albid']; ?>" />
<input type="hidden" name="Cart[ArtistId]"
	   value="<?php echo $_GET['aid']; ?>" />
<table width="100%">
	<tr>
		<th></th>
		<th>Artist</th>
		<th>Album</th>
		<th>Quantity</th>
		<th>Unit Price</th>
	</tr>
	<tr>
		<td><?php echo $name; ?></td>
		<td><?php echo $title; ?></td>
		<td><input name="Cart[Count]" id="Cart_Count" type="text"
			value="<?php echo $count; ?>" /></td>
		<td><?php echo $price; ?></td>
	</tr>
	<tr>
		<td><input type="submit" name="yt0" value="Add this to my cart" /></td>
	</tr>
	</table>
	</form>
	</div>
	
	<?php } ?>