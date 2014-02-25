<?php

class ETSROOMSController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('create','update','admin','delete'),
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
		$model=new ETSROOMS;
		$nowdate=date("Y-m-d H:i:s"); 

		//Room Adding
	 if(isset($_POST['submitRoom']))
		{
			 $room_name = $_POST['room_name'];
			 $status = $_POST['status'];
			 $user_id = Yii::app()->user->id;
		    // $rooms->save();
			 	 $sql="insert into ETS_ROOMS (ROOM_DESCR,CREATE_DTTM,LASTUPDUSER,STATUS) values('$room_name',now(),'$user_id','$status')";
				 $connection=Yii::app()->db;
				 $connection->createCommand($sql)->execute();
			     $this->redirect(array('admin'));
			 
 	 }
		
		$this->render('create',array(
			'model'=>$model,
		));
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
		
		 if(isset($_POST['submitRoom']))
		{
				 $room_name = $_POST['room_name'];
				 $status = $_POST['status'];
				 $user_id = Yii::app()->user->id;
				 $ROOM_ID = $_POST['ROOM_ID'];
				 $nowdate=date("Y-m-d H:i:s"); 
       	         $updateallwithoutusername=ETSROOMS::model()->updateByPk($ROOM_ID,array("ROOM_DESCR"=>$room_name,"STATUS"=>$status,"LASTUPDDTTM"=>$nowdate)); 
			
				$this->redirect(array('admin'));
			 
 	 }

		if(isset($_POST['ETSROOMS']))
		{
			$model->attributes=$_POST['ETSROOMS'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ROOM_ID));
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ETSROOMS');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ETSROOMS('search');
			if (isset($_GET['pageSize'])) {
			 if($_GET['pageSize']=='all')
			  {
			   $roomscnt=ETSROOMS::model()->count();
			   Yii::app()->user->setState('pageSize',(int)$roomscnt);
			  }
			  else
			  {
			 Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
			  }
			 unset($_GET['pageSize']);} else
			 {
			 Yii::app()->user->setState('pageSize',(int)10);
			 }
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ETSROOMS']))
			$model->attributes=$_GET['ETSROOMS'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ETSROOMS the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ETSROOMS::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ETSROOMS $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='etsrooms-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
