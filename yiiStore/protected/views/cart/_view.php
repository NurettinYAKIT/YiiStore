<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('RecordId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->RecordId), array('view', 'id'=>$data->RecordId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CartId')); ?>:</b>
	<?php echo CHtml::encode($data->CartId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AlbumId')); ?>:</b>
	<?php echo CHtml::encode($data->AlbumId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Count')); ?>:</b>
	<?php echo CHtml::encode($data->Count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DateCreated')); ?>:</b>
	<?php echo CHtml::encode($data->DateCreated); ?>
	<br />


</div>