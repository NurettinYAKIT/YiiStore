<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cart-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'CartId'); ?>
		<?php echo $form->textField($model,'CartId',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'CartId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'AlbumId'); ?>
		<?php echo $form->textField($model,'AlbumId'); ?>
		<?php echo $form->error($model,'AlbumId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Count'); ?>
		<?php echo $form->textField($model,'Count'); ?>
		<?php echo $form->error($model,'Count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DateCreated'); ?>
		<?php echo $form->textField($model,'DateCreated'); ?>
		<?php echo $form->error($model,'DateCreated'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->