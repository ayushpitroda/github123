<?php

class COMMENTSController extends Controller
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
		$model=new COMMENTS;
		 $nowdate=date("Y-m-d H:i:s"); 

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		

		if(isset($_POST['COMMENTS']))
		{
		     
			 $loc_array=$_POST['COMMENTS']['LOCATION_IDS'];
			 if(!empty($loc_array)) {
			 $LOCATION_IDS = implode(",", $loc_array);
			 }else {
			 $LOCATION_IDS="";
			 }
			 $model->attributes=$_POST['COMMENTS'];
			 $model->LOCATION_IDS=$LOCATION_IDS;
			 $model->LASTUPDUSER= Yii::app()->user->id;
			 $model->CREATE_DTTM = $nowdate;
			if($model->save())
				$this->redirect(array('view','id'=>$model->COMMENT_ID));
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

		if(isset($_POST['COMMENTS']))
		{
		
			$model->attributes=$_POST['COMMENTS'];
			 if($model->LOCATION_IDS!=='') {
             $model->LOCATION_IDS=implode(',',$model->LOCATION_IDS);
			}
			if($model->save()) { ?>
			
				<div style="color:#993300; text-align:center"> Successfully Updated</div>
		        <meta http-equiv="refresh" content="3;url='../admin'" />  
		<? } 	  
				//$this->redirect(array('view','id'=>$model->COMMENT_ID));
		}
		
         $model->LOCATION_IDS = explode(',',$model->LOCATION_IDS);
		
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
		$dataProvider=new CActiveDataProvider('COMMENTS');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new COMMENTS('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['COMMENTS']))
			$model->attributes=$_GET['COMMENTS'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return COMMENTS the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=COMMENTS::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param COMMENTS $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='comments-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
