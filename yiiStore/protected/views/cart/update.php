<?php
$this->breadcrumbs=array(
	'Carts'=>array('index'),
	$model->RecordId=>array('view','id'=>$model->RecordId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cart', 'url'=>array('index')),
	array('label'=>'Create Cart', 'url'=>array('create')),
	array('label'=>'View Cart', 'url'=>array('view', 'id'=>$model->RecordId)),
	array('label'=>'Manage Cart', 'url'=>array('admin')),
);
?>

<h1>Update Cart <?php echo $model->RecordId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>