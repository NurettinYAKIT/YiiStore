<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'room-reservation-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'room_id'); ?>
		<?php echo $form->textField($model,'room_id',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'room_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reservation_id'); ?>
		<?php echo $form->textField($model,'reservation_id',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'reservation_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entrance_date'); ?>
		<?php echo $form->textField($model,'entrance_date'); ?>
		<?php echo $form->error($model,'entrance_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'exit_date'); ?>
		<?php echo $form->textField($model,'exit_date'); ?>
		<?php echo $form->error($model,'exit_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->