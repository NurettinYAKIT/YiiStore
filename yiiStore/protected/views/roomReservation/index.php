<?php
$this->breadcrumbs=array(
	'Room Reservations',
);

$this->menu=array(
	array('label'=>'Create RoomReservation', 'url'=>array('create')),
	array('label'=>'Manage RoomReservation', 'url'=>array('admin')),
);
?>

<h1>Room Reservations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
