<?php
$this->breadcrumbs=array(
	'Room Reservations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomReservation', 'url'=>array('index')),
	array('label'=>'Create RoomReservation', 'url'=>array('create')),
	array('label'=>'View RoomReservation', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RoomReservation', 'url'=>array('admin')),
);
?>

<h1>Update RoomReservation <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>