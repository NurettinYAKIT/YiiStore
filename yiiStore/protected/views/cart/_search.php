<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'RecordId'); ?>
		<?php echo $form->textField($model,'RecordId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CartId'); ?>
		<?php echo $form->textField($model,'CartId',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AlbumId'); ?>
		<?php echo $form->textField($model,'AlbumId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Count'); ?>
		<?php echo $form->textField($model,'Count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DateCreated'); ?>
		<?php echo $form->textField($model,'DateCreated'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->