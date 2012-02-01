<?php
$this->breadcrumbs=array(
	'Room Reservations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RoomReservation', 'url'=>array('index')),
	array('label'=>'Create RoomReservation', 'url'=>array('create')),
	array('label'=>'Update RoomReservation', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RoomReservation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RoomReservation', 'url'=>array('admin')),
);
?>

<h1>View RoomReservation #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'room_id',
		'reservation_id',
		'entrance_date',
		'exit_date',
	),
)); ?>
