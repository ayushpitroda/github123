<?php

class RolesController extends Controller
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
				'actions'=>array('create','update','admin','delete','assignpermissions','clearfilters','status','exportcsv','exportall','Import','exportselected'),
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
		$model=new Roles;
		$nowdate=date("Y-m-d H:i:s");
		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Roles']))
		{
			$model->attributes=$_POST['Roles'];
			$model->user_id =Yii::app()->user->id;
			$model->date_added =$nowdate;
			
			if($model->save())
				$this->redirect(array('admin'));
			//	$this->redirect(array('view','id'=>$model->role_id));
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

		if(isset($_POST['Roles']))
		{
			$model->attributes=$_POST['Roles'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->role_id));
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
		$dataProvider=new CActiveDataProvider('Roles');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Roles('search');
		$model->unsetAttributes();
		
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
		  // clear any default values
		if(isset($_GET['Roles']))
			$model->attributes=$_GET['Roles'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionAssignpermissions($role_id)
	{
	  $model= new QRolesRights('search');
		$nowdate=date("Y-m-d H:i:s");
		if(isset($_POST['permissions']))
		{
		
		  $role_id= $_POST['role_id'];
    	  $count = countofrolesinrightstablefunc($role_id);
		 
		   if($count>0)
		   {
			  QRolesRights::model()->deleteAll("role_id='$role_id'");	   
		   }
		   
		
	 foreach($_POST['right_name'] as  $key => $val)
	  {
  	        $rolesandrights =new QRolesRights;
			$rolesandrights->right_id=$val;
			$rolesandrights->role_id=$role_id;
			$rolesandrights->user_id =Yii::app()->user->id;
			$rolesandrights->date_added =$nowdate;
		    $rolesandrights->save();	
	  }	
	
	?>
	<div style="color:#993300; text-align:center;"> Successfully Updated....</div>
	<?  
		$this->redirect(array('admin')); 		
	}
		
		$this->render('allpermissions',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Roles the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Roles::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	/**
	 * Performs the AJAX validation.
	 * @param Roles $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='roles-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionExportcsv() {
	            header('Content-type: text/csv');
                header('Content-Disposition: attachment; filename="roles.csv"');

                $model=new Roles('search');
             //   $model->unsetAttributes();  // clear any default values
                
                if(Yii::app()->user->getState('exportModel'))
                      $model=Yii::app()->user->getState('exportModel');

               $dataProvider = $model->search(false);
                // csv header  Address::model()->getAttributeLabel("Id").",". 
                echo    
				Roles::model()->getAttributeLabel("role_name").",". 
				Roles::model()->getAttributeLabel("description").",". 
				
				
                                " \r\n";
                // csv data
                foreach ($dataProvider->getData() as $data) {
                       print "$data->role_name,$data->description \r\n";
                }
                
			  exit();
		
	}
	
	public function actionExportall()
	{
	$dataProvider1 = Roles::model()->findAll();
   header('Content-type: text/csv');
    header('Content-Disposition: attachment; filename="roles.csv"');

                echo 
				Roles::model()->getAttributeLabel("role_name").",". 
				Roles::model()->getAttributeLabel("description").",". 
				                " \r\n";
			   foreach ($dataProvider1 as $data) {
                        print "$data->role_name,$data->description \r\n";
                }
                
			  exit();		

	}
	
	public function actionExportselected() {
   
      if(isset($_POST['autoId']))
		{
		$autoIdAll = $_POST['autoId'];
        $dataProvider2= Roles::model()->findAllByAttributes(array('role_id'=>$autoIdAll));
		
	//	print_r($dataProvider2);
		
        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename="roles.csv"');

                echo  
				Roles::model()->getAttributeLabel("role_name").",". 
				Roles::model()->getAttributeLabel("description").",". 
				
				                " \r\n";
			   foreach ($dataProvider2 as $data) {
                      print "$data->role_name,$data->description \r\n";
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
	
		if(isset($_POST['Roles']))
		{
		
			$model = Roles::model()->findByPk($_POST['Roles']['role_id']);
					if($model===null)
					{
						throw new CHttpException(404,'The requested page does not exist.');
					}
		 
			if(isset($_POST['Roles']['role_name'])) 
				{
					$value = $_POST['Roles']['role_name'];
					$model->role_name = $_POST['Roles']['role_name'];
				}
		  
		  if(isset($_POST['Roles']['description'])) 
					{
				$value = $_POST['Roles']['description'];
				$model->description = $_POST['Roles']['description'];
				  }
		  	  		  
				
				 if($model->save()){
					echo $value;
			}
		}
	}	
	
	
  
	
}
