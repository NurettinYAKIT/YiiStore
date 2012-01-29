<?php 
//	session_start();
	if (!isset(Yii::app()->session['cartid']))
	{
		$cartid = com_create_guid(); //cfuuid_create_guid();
		$cartid = trim($cartid, '{}');
		$_SESSION['cartid'] = $cartid;
	}
?>

<?php 
	if (!isset($_GET['albid']) && !isset($_GET['aid']) ) 
	{
		$this->breadcrumbs=array(
			'View Cart',
		);
		$carttotal = 0;
	
?>
<h1>Your Cart</h1>
<?php echo $this->renderPartial('_form_view', array('myCarts' => $myCarts));
}

if (isset($_GET['aid']) && isset($_GET['albid']))
{
	$this->breadcrumbs = array('Carts' => array('index'), 'Create Cart',);
}
?>

<h1>Adding to Your Cart</h1>

<?php echo $this->renderPartial('_form_create', array('myCarts' => $myCarts));

//<?php 
//$this->menu=array(
//	array('label'=>'Create Cart', 'url'=>array('create')),
//	array('label'=>'Manage Cart', 'url'=>array('admin')),
//);
//
?>

<h1>Carts</h1>


