<?php
$this->breadcrumbs=array(
	'Store',
);?>



<img src = "<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" >

<h1><em><?php echo CHtml::encode(Yii::app()->name); ?></em></h1>

<form method="post">	
<?php 

	//First Date Picker
	$this->widget('zii.widgets.jui.CJuiDatePicker',
	array(
		// you must specify name or model/attribute
		//'model'=>$model,
		//'attribute'=>'projectDateStart',
		'name'=>'first_date',
		// optional: what's the initial value/date?
		//'value' => $model->projectDateStart
		'value' => '2011-02-02',
		'cssFile'=>array('jquery-ui.css' /*,anotherfile.css, etc.css*/),
		'options' => array(
			// how to change the input format? see http://docs.jquery.com/UI/Datepicker/formatDate
			'dateFormat'=>'yy-mm-dd',
			// user will be able to change month and year
			'changeMonth' => 'true',
			'changeYear' => 'true',
			// shows the button panel under the calendar (buttons like "today" and "done")
			'showButtonPanel' => 'true',
			// this is useful to allow only valid chars in the input field, according to dateFormat
			'constrainInput' => 'false',
			// speed at which the datepicker appears, time in ms or "slow", "normal" or "fast"
			'duration'=>'fast',
		),
	)
);

	// Second Date Picker
	$this->widget('zii.widgets.jui.CJuiDatePicker',
	array(
		// you must specify name or model/attribute
		//'model'=>$model,
		//'attribute'=>'projectDateStart',
		'name'=>'second_date',
		// optional: what's the initial value/date?
		//'value' => $model->projectDateStart
		'value' => '2011-02-02',
		'cssFile'=>array('jquery-ui.css' /*,anotherfile.css, etc.css*/),
		'options' => array(
			// how to change the input format? see http://docs.jquery.com/UI/Datepicker/formatDate
			'dateFormat'=>'yy-mm-dd',
			// user will be able to change month and year
			'changeMonth' => 'true',
			'changeYear' => 'true',
			// shows the button panel under the calendar (buttons like "today" and "done")
			'showButtonPanel' => 'true',
			// this is useful to allow only valid chars in the input field, according to dateFormat
			'constrainInput' => 'false',
			// speed at which the datepicker appears, time in ms or "slow", "normal" or "fast"
			'duration'=>'fast',
		),
	)
);

?>
<input type="submit" name="submit" value="Search" /></form>


<?php if(isset($_GET["gid"]))
{
	
	
	foreach ($Genres as $Genre)
	{
		echo '<h1>' . $Genre->Name . "</h1><br />";
		$desc = $Genre->Description;
	}

?>

<div id="gmenu"><?php echo $desc; ?></div>




<table>
<tr>

<?php 
	foreach ($rooms as $room){
		
		//wrap the artist name in a link
		echo "<td><center><strong>" . CHtml::link($room->name, array('/Store/ArtistDetails/', 'artistid'=>$room->id)) . "</strong><br/>";
		//Rooom pictures....
		echo "".CHtml::link('<img width="80" heigth="80" src="' . Yii::app()->request->baseUrl . $room->picture . '" /><br />');
		//Show The Price
		echo $room->name . "<br />$" . $room->price . "</center></td>";
	}
?>

</tr>
</table>



<table>
	<tr>
	<?php
	$cntRow = 0;
	foreach ($Albums as $Album)
	{
		$aid = $Album->ArtistId;
		$cntRow++;
		if($cntRow % 2) echo "</tr><tr>";
		foreach ($Artists as $Artist){
			if($Artist->ArtistId === $aid){
				$aname = $Artist->Name . "<br />";
			}
		}
		
		
			
		//wrap the artist name in a link
		echo "<td><center><strong>" . CHtml::link($aname, array('/Store/ArtistDetails/', 'artistid'=>$aid)) . "</strong>";
		//wrap the image in a link
		//echo CHtml::link('<img src="/phpmusicstore'. $Album->AlbumArtUrl . '" /><br />', array('store/details/', 'albid' => $Album->AlbumId, 'aid'=>$aid));
		echo CHtml::link('<img width="80" heigth="80" src="' . Yii::app()->request->baseUrl . $Album->AlbumArtUrl . '" /><br />', array('store/details/', 'albid' => $Album->AlbumId, 'aid'=>$aid));
		//Show The Price
		echo $Album->Title . "<br />" . $Album->Price . "</center></td>";
		
	}
	
	?>
	</tr>
</table>

<?php }

elseif (isset($_GET["albid"]) && isset($_GET["aid"]))
{
	foreach($Artists as $Artist){
			$aname = $Artist->Name;
			$abio = $Artist->bio;
	}
	foreach ($Albums as $Album)
	{
		$title = $Album->Title;
		$tracks = $Album->tracks;
		$price = $Album->Price;
		$albid = $Album->AlbumId;
		$aid = $Album->ArtistId;
		$lnotes = $Album->LinerNotes;
		$AlbumArtUrl = $Album->AlbumArtUrl;
		$AlbumThumbUrl = $Album->AlbumThumbUrl;
	}?>
	
	<h1>
		<?php 
			echo CHtml::link($aname, array('/Store/ArtistDetails/', 'artistid'=>$aid));
		?>
		<table>
			<tr>
				<td valign = "top">
				<?php echo  '<img src = "'. Yii::app()->request->baseUrl . $Album->AlbumArtUrl . '" width="250" height="300"/>'?><br />
				</td>
				<td></td>
				<td valign = "top"> <?php echo "<h4> TRACKS </h4>" . $tracks; ?></td>
			</tr>	
			<tr>
				<td valign = "top">
					<?php echo $title. "</br>"; 
    	  				  echo $price. "</br>";
    	  				  echo CHtml::link('Add to Cart', array('/Cart/create/', 'albid'=>$albid, 'aid'=>$aid ) ). "</br>";
     				?>
     			</td>
     		</tr>				
		</table>
		
	<?php echo '<h3>Liner Notes</h3>' . $lnotes; ?>
		<?php
	} 	
	elseif($_GET['artistid']){
		foreach($Artists as $Artist){
			$aname = $Artist->Name;
			$abio = $Artist->bio;
			$artistArtUrl = $Artist->ArtistArtUrl;
		} ?>
<h1><?php echo $aname; ?></h1>
<?php echo '<img style="float:left; margin: 0 5px 5px 0;" src="' . Yii::app()->request->baseUrl . $artistArtUrl . '"  /><br /></td>'; ?>
<?php echo "<h4>Bio</h4>" . $abio; ?>	

<?php } else {
     echo "<h1>" . $this->id . '/' . $this->action->id . "</h1>";
     echo "<h3>" . $content . "</h3>";
}
?>
<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>
