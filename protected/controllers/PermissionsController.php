<?php

class PermissionsController extends Controller
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
				'actions'=>array('create','update','admin','delete','clearfilters','status','exportcsv','exportall','Import','exportselected'),
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
		$model=new Permissions;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Permissions']))
		{
			$model->attributes=$_POST['Permissions'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->right_id));
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

		if(isset($_POST['Permissions']))
		{
			$model->attributes=$_POST['Permissions'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->right_id));
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
		$dataProvider=new CActiveDataProvider('Permissions');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Permissions('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['pageSize'])) {
			 if($_GET['pageSize']=='all')
			  {
			   $su=Pagewords::model()->count();
			   Yii::app()->user->setState('pageSize',(int)$su);
			  }
			  else
			  {
			 Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
			  }
			 unset($_GET['pageSize']);} else
			 {
			 Yii::app()->user->setState('pageSize',(int)20);
			 }
		
		if(isset($_GET['Permissions']))
			$model->attributes=$_GET['Permissions'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Permissions the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Permissions::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Permissions $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='permissions-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionExportcsv() {
	            header('Content-type: text/csv');
                header('Content-Disposition: attachment; filename="permissions.csv"');

                $model=new Permissions('search');
             //   $model->unsetAttributes();  // clear any default values
                
                if(Yii::app()->user->getState('exportModel'))
                      $model=Yii::app()->user->getState('exportModel');

               $dataProvider = $model->search(false);
                // csv header  Address::model()->getAttributeLabel("Id").",". 
                echo    
				Permissions::model()->getAttributeLabel("right_name").",". 
				Permissions::model()->getAttributeLabel("right_description").",". 
                                " \r\n";
                // csv data
                foreach ($dataProvider->getData() as $data) {
                       print "$data->right_name,$data->right_description \r\n";
                }
                
			  exit();
		
	}
	
	public function actionExportall()
	{
	$dataProvider1 = Permissions::model()->findAll();
   header('Content-type: text/csv');
    header('Content-Disposition: attachment; filename="Permissions.csv"');

                echo 
				Permissions::model()->getAttributeLabel("right_name").",". 
				Permissions::model()->getAttributeLabel("right_description").",". 
				
				                " \r\n";
			   foreach ($dataProvider1 as $data) {
                        print "$data->right_name,$data->right_description \r\n";
                }
                
			  exit();		

	}
	
	public function actionExportselected() {
   
       if(isset($_POST['autoId']))
		{
		$autoIdAll = $_POST['autoId'];
        $dataProvider2= Permissions::model()->findAllByAttributes(array('role_id'=>$autoIdAll));
		
	//	print_r($dataProvider2);
		
        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename="Permissions.csv"');

                echo  
				Permissions::model()->getAttributeLabel("right_name").",". 
				Permissions::model()->getAttributeLabel("right_description").",". 
				
				                " \r\n";
			   foreach ($dataProvider2 as $data) {
                      print "$data->right_name,$data->right_description \r\n";
                }
                
			  exit();
		}  else 

		{ ?>
		<div style="color:#993300; text-align:center;"><strong>Please Select Atleast One Item</strong></div>
		<meta http-equiv="refresh" content="3;url='admin'" />
		<? } 	 
	}
	
	
		
	 public function actionClearfilters()
	 {
	  $model=new Pagewords('search');
	  $this->redirect(array('admin'));
	 }
	 
  	public function actionStatus()
	{
	
		if(isset($_POST['Permissions']))
		{
		
			$model = Permissions::model()->findByPk($_POST['Permissions']['right_id']);
					if($model===null)
					{
						throw new CHttpException(404,'The requested page does not exist.');
					}
		 
			if(isset($_POST['Permissions']['right_name'])) 
				{
					$value = $_POST['Permissions']['right_name'];
					$model->right_name = $_POST['Permissions']['right_name'];
				}
		   if(isset($_POST['Permissions']['right_description'])) 
					{
				$value = $_POST['Permissions']['right_description'];
				$model->right_description = $_POST['Permissions']['right_description'];
				  }
		   		  
				
				 if($model->save()){
					echo $value;
			}
		}
	}	
	
}
