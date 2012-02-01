<?php
$this->breadcrumbs=array(
	'Room Reservations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RoomReservation', 'url'=>array('index')),
	array('label'=>'Manage RoomReservation', 'url'=>array('admin')),
);
?>

<h1>Create RoomReservation</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>