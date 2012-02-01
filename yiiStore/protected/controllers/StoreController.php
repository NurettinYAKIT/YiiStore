<?php

class StoreController extends Controller
{
	public $message;
	public function actionIndex()
	{
		$this->message = "Hello from Store.Index()";

		if(isset($_POST['first_date'])){
			$date = $_POST['first_date'];
			echo $date;
		}
		if(isset($_POST['second_date'])){
			$date = $_POST['second_date'];
			echo $date;
		}
		$this->render('index', array('content' => $this->message));
	}

	public function actionBrowse()
	{
		if($_GET["gid"])
		{
			$genreCriteria = new CDbCriteria();
			$genreCriteria->select = "`GenreId`, `Name`, `Description`";
			$genreCriteria->condition = "genreId = " . $_GET["gid"];

			$artistCriteria = new CDbCriteria();
			$artistCriteria->alias = "t1";
			$artistCriteria->select = "DISTINCT `t1`.`Name`, `t1`.`ArtistId`";
			$artistCriteria->join = "LEFT JOIN `tbl_album` ON `tbl_album`.`ArtistId` = `t1`.`ArtistId`";
			$artistCriteria->condition = "`tbl_album`.`GenreId` = " . $_GET["gid"];
			$artistCriteria->order = "`t1`.`ArtistId` ASC";
				
			$albumCriteria = new CDbCriteria();
			$albumCriteria->alias = "t2";
			$albumCriteria->select = "`AlbumId`, `GenreId`, `ArtistId`, `Title`, `Price`, `AlbumArtUrl`";
			$albumCriteria->condition = "`GenreId` = " . $_GET["gid"];
			$albumCriteria->order = "`ArtistId` ASC";
				
				
				
			$date = '2011-02-02';
			$date2 = '2012-02-02';

			if(isset($_POST['first_date'], $_POST['second_date'] )){
				$date = $_POST['first_date'];
				$date2 = $_POST['second_date'];
			}

			echo "First : ";
			echo $date;
			echo "<br/>";
			echo "Second : ";
			echo $date2;
			
			$Criteria = new CDbCriteria();
			$Criteria->select = "*";
			$Criteria->join = "LEFT JOIN `tbl_room_reservation` ON `tbl_room_reservation`.`room_id` = `t`.`id`";
			$Criteria->condition = "`entrance_date` BETWEEN '".$date."'AND'".$date2."'";
			$Criteria->order = "Name ASC";
				

			$this->render('index', array('Albums' => Album::model()->findAll($albumCriteria),
										 'Artists' => Artist::model()->findAll($artistCriteria),
										 'rooms' => Room::model()->findAll($Criteria),
										 'Genres' => Genre::model()->findAll($genreCriteria)));			
		}
		else
		{
			$this->message = "Hello from Store.Browse()";
			$this->render('index', array('content' => $this->message));
		}
	}

	public function actionDetails()
	{
		if ($_GET["albid"])
		{
			$albumCriteria = new CDbCriteria();
			$albumCriteria->select = "*";
			$albumCriteria->condition = "AlbumId = " . $_GET["albid"];
				
			$artistCriteria = new CDbCriteria();
			$artistCriteria->select = "*";
			$artistCriteria->condition = "`ArtistId` = " . $_GET["aid"];
				
			$this->render('index', array('Albums' => Album::model()->findAll($albumCriteria),'Artists' => Artist::model()->findAll($artistCriteria) ) );
		}
		else
		{
			$this->message = "Hello from Store.Details()";
			$this->render('index', array('content' => $this->message));
		}

	}

	public  function actionArtistDetails() {

		if($_GET["artistid"])
		{
			$artistCriteria = new CDbCriteria();
			$artistCriteria->select = "*";
			$artistCriteria->condition = "`ArtistId` = " . $_GET["artistid"];

			$this->render('index', array('Artists' => Artist::model()->findAll($artistCriteria)
			));
		}
		else{
			$this->message = "Please select an Artist to view their details";
			$this->render('index', array('content'=>$this->message,));
		}

	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
	// return the filter configuration for this controller, e.g.:
	return array(
	'inlineFilterName',
	array(
	'class'=>'path.to.FilterClass',
	'propertyName'=>'propertyValue',
	),
	);
	}

	public function actions()
	{
	// return external action classes, e.g.:
	return array(
	'action1'=>'path.to.ActionClass',
	'action2'=>array(
	'class'=>'path.to.AnotherActionClass',
	'propertyName'=>'propertyValue',
	),
	);
	}
	*/
}