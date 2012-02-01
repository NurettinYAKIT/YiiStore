<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_id')); ?>:</b>
	<?php echo CHtml::encode($data->room_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reservation_id')); ?>:</b>
	<?php echo CHtml::encode($data->reservation_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entrance_date')); ?>:</b>
	<?php echo CHtml::encode($data->entrance_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exit_date')); ?>:</b>
	<?php echo CHtml::encode($data->exit_date); ?>
	<br />


</div>