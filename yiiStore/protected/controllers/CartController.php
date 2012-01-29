<?php

class CartController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Cart;
		$cartid = Yii::app()->session['cartid'];
		$myCarts = array();
		$count;
		
		if(isset($_POST['Cart']))
		{
			$model->attributes = $_POST['Cart'];
			
			$valid = $model->validate();
			
			if ($valid) {
				$model->save(false);
			}
			
			if($model->save())
			{
				$this->redirect(array('index')); 
			}
			else 
			{
				echo 'did not save';
			}
		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(!isset($_POST['Cart']))  
		{
			$albumCriteria = new CDbCriteria();
			$albumCriteria->select = "Title, Price, ArtistId";
			$albumCriteria->condition = "AlbumId=" . $_GET['albid'];
			$Albums = Album::model()->findAll($albumCriteria);
			
			
			
			foreach ($Albums as $Album)
			{
				$title = $Album->Title;
				$price = $Album->Price;
				$albid = $Album->AlbumId;
				$aid   = $Album->ArtistId;
				
				$artistCriteria = new CDbCriteria();
				$artistCriteria->select = "Name";
				$artistCriteria->condition = "ArtistId=" . $_GET['aid'];
				$Artists = Artist::model()->findAll($artistCriteria);
				
				foreach ($Artists as $Artist)
				{
					$name = $Artist->Name;
				}
			}
			$count = 1;
			$myCart = (array('albid' => $albid,
							 'recid' => 2,
							 'title' => $title,
							 'price' => $price,
							 'name'  => $name,
							 'count' => $count,));
			array_push($myCarts, $myCart);
			$this->render('index', array('myCarts' => $myCarts));
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cart']))
		{
			$model->attributes=$_POST['Cart'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->RecordId));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model = new Cart();
		$myCarts = array();
		
		$cartCriteria = new CDbCriteria();
		$cartCriteria->select = "*";
		$cartCriteria->condition = "`CartId` = `" . Yii::app()->session['cartid']+ "`";
		$Carts = Cart::model()->findAll($cartCriteria);
		
		$crtlimit = Cart::model()->count($cartCriteria);
		
		foreach ($Carts as $Cart)
		{
			$count = $Cart->Count;
			$albid = $Cart->AlbumId;
			$recid = $Cart->RecordId;
			
			$albumCriteria = new CDbCriteria();
			$albumCriteria->select = "Title, Price, ArtistId";
			$albumCriteria->condition = "AlbumId=" . $albid;
			$Albums = Album::model()->findAll($albumCriteria);
			
			foreach ($Albums as $Album) 
			{
				$title = $Album->Title;
				$price = $Album->Price;
				$aid   = $Album->ArtistId;
				
				$artistCriteria = new CDbCriteria();
				$artistCriteria->select = "Name";
				$artistCriteria->condition = "ArtistId=" . $aid;
				
				$Artists = Artist::model()->findAll($artistCriteria);
				
				foreach ($Artists as $Artist)
				{
					$name = $Artist->Name;
				};
			}
			
			$myCart = (array('albid'=>$albid,
							 'recid'=>$recid,
							 'title'=>$title,
							 'price'=>$price,
		 		 			 'name'=>$name,
							 'count'=>$count,));
			array_push($myCarts, $myCart);
		}
		
		
		$this->render('index',array('myCarts'=>$myCarts,));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Cart('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cart']))
			$model->attributes=$_GET['Cart'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Cart::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cart-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
