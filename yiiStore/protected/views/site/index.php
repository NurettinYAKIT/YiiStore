<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Shop <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<div>
<table>

	<td width="100">
	
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
//		'value' => '08/20/2010',
		'cssFile'=>array('jquery-ui.css' /*,anotherfile.css, etc.css*/),
		'options' => array(
			// how to change the input format? see http://docs.jquery.com/UI/Datepicker/formatDate
			'dateFormat'=>'yy/mm/dd',
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
//		'value' => '08/20/2012',
		'cssFile'=>array('jquery-ui.css' /*,anotherfile.css, etc.css*/),
		'options' => array(
			// how to change the input format? see http://docs.jquery.com/UI/Datepicker/formatDate
			'dateFormat'=>'yy/mm/dd',
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
<input type="submit" name="submit" /></form>

</td>

</table>
</div>


<div id = "gmenu">
<?php
	foreach ($Genres as $Genre):?>
	<h6>
		<?php 
			echo CHtml::link($Genre->Name, array('store/browse/', 'gid' => $Genre->GenreId));
		?>
	</h6><br />
<?php endforeach;?>
</div>

<center><img src = "<?php echo Yii::app()->request->baseUrl; ?>/Images/home-showcase.png" /></center>

<!--<p>Congratulations! You have successfully created your Yii application.</p>-->

<!--<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <tt><?php echo __FILE__; ?></tt></li>
	<li>Layout file: <tt><?php echo $this->getLayoutFile('main'); ?></tt></li>
</ul>

-->
<!--<p>For more details on how to further develop this application, please read-->
<!--the <a href="http://www.yiiframework.com/doc/">documentation</a>.-->
<!--Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,-->
<!--should you have any questions.</p>-->