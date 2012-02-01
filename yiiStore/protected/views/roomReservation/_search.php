<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_id'); ?>
		<?php echo $form->textField($model,'room_id',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reservation_id'); ?>
		<?php echo $form->textField($model,'reservation_id',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entrance_date'); ?>
		<?php echo $form->textField($model,'entrance_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'exit_date'); ?>
		<?php echo $form->textField($model,'exit_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->