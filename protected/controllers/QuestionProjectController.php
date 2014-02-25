<?php

class QuestionProjectController extends Controller
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
				'actions'=>array('create','update','admin','projectprint','createpdf','sendmail','clearfilters','status','exportcsv','exportall','Import','exportselected','changeusers','email','levelsandrooms','roomdelete'),
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
		$model=new QuestionProject;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		 $nowdate=date("Y-m-d H:i:s"); 
         if(isset($_POST['submitProject'])) {
       
	     $usrdbid=Yii::app()->user->id;
	     $projectname=$_POST['ProjectName'];
		 $level = $_POST['levels'];
		 $rooms=$_POST['rooms'];
		 $subject=$_POST['subject'];
		 $description=$_POST['description'];

		 $questionproject= new QuestionProject;
		 $questionproject->project_name=$projectname;
		 $questionproject->subject=$subject;
		 $questionproject->description=$description;
		 $questionproject->user_id=Yii::app()->user->id;
		 $questionproject->date_added=$nowdate;
		 $questionproject->level_count=$level;
		 $questionproject->room_count=$rooms;
         $questionproject->save();
		 $project_id=Yii::app()->db->getLastInsertId();
       
	    //mail body
		$body= ProjectView($project_id);
		
		 $user_email=Yii::app()->user->email;
	//to email	 
	     $email = Yii::app()->email;
		 $email->from = 'admin@ets.com'; 
		 $email->to = $user_email;
		 $email->subject = 'ETS New Appointment';
		 $email->message = $body;
		 $email->send();
	
		?>
		<div style="color:#993300; text-align:center"> Successfully Inserted...Please Check Your Mail</div>
		<meta http-equiv="refresh" content="3;url='../questionProject/admin'" />
	<?  }  

		if(isset($_POST['QuestionProject']))
		{
			$model->attributes=$_POST['QuestionProject'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->project_id));
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
		$nowdate=date("Y-m-d"); 
		
		if(isset($_POST['submitProject'])) {
		 $usrdbid=Yii::app()->user->id;
	     $project_id=$_POST['project_id'];
		 $projectname=$_POST['ProjectName'];
		 $levels = $_POST['levels'];
		 $rooms=$_POST['rooms'];
		 $subject=$_POST['subject'];
		 $description=$_POST['description'];

	
$update_prodetails=QuestionProject::model()->updateByPk($project_id,array("project_name"=>$projectname,"level_count"=>$levels,"room_count"=>$rooms,"subject"=>$subject,"description"=>$description));
		 
		 
	 ?>
		<div style="color:#993300; text-align:center"> Successfully Upadated...</div>
		<meta http-equiv="refresh" content="2;url='<? echo $project_id;?>'" />
	<?  }  
    
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		/*if(isset($_POST['QuestionProject']))
		{
			$model->attributes=$_POST['QuestionProject'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->project_id));
		}*/
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
		$dataProvider=new CActiveDataProvider('QuestionProject');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new QuestionProject('search');
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
		
		if(isset($_GET['QuestionProject']))
			$model->attributes=$_GET['QuestionProject'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return QuestionProject the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=QuestionProject::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param QuestionProject $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='question-project-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	 public function actionProjectprint()
	 {
	 
	$proid=$_GET['project_id'];
	
	$this->renderPartial('print',array(
				'project_id'=>$proid,
			));	
	 }	
	 
   public function actionCreatepdf(){
 
        $proid=$_GET['project_id'];
	
	$this->renderPartial('createpdfback',array(
				'project_id'=>$proid,
			));	
 
    }
	
	 public function actionSendmail($project_id){
 
        $project_id=$_GET['project_id'];
		$model=$this->loadModel($project_id);
		
   	  $this->renderPartial('questionupdate',array(
			'model'=>$model,
		));
	
 
    }

   public function actionExportcsv() {
	            header('Content-type: text/csv');
                header('Content-Disposition: attachment; filename="Projects.csv"');

                $model=new QuestionProject('search');
             //   $model->unsetAttributes();  // clear any default values
                
                if(Yii::app()->user->getState('exportModel'))
                      $model=Yii::app()->user->getState('exportModel');

               $dataProvider = $model->search(false);
                // csv header  Address::model()->getAttributeLabel("Id").",". 
                echo    
				QuestionProject::model()->getAttributeLabel("project_name").",". 
				QuestionProject::model()->getAttributeLabel("user_id").",". 
				QuestionProject::model()->getAttributeLabel("date_added").",".
				
                                " \r\n";
                // csv data
                foreach ($dataProvider->getData() as $data) {
                       print "$data->project_name,$data->user_id,$data->date_added \r\n";
                }
                
			  exit();
		
	}
	
	public function actionExportall()
	{
	$dataProvider1 = QuestionProject::model()->findAll();
   header('Content-type: text/csv');
    header('Content-Disposition: attachment; filename="Projects.csv"');

                echo 
			    QuestionProject::model()->getAttributeLabel("project_name").",". 
				QuestionProject::model()->getAttributeLabel("user_id").",". 
				QuestionProject::model()->getAttributeLabel("date_added").",".
				                " \r\n";
			   foreach ($dataProvider1 as $data) {
                        print "$data->project_name,$data->user_id,$data->date_added \r\n";
                }
                
			  exit();		

	}
	
	public function actionExportselected() {
	
	    if(isset($_POST['autoId']))
		{

		$autoIdAll = $_POST['autoId'];
        $dataProvider2= QuestionProject::model()->findAllByAttributes(array('project_id'=>$autoIdAll));
		
	//	print_r($dataProvider2);
		
        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename="Projects.csv"');

                echo  
			    QuestionProject::model()->getAttributeLabel("project_name").",". 
				QuestionProject::model()->getAttributeLabel("user_id").",". 
				QuestionProject::model()->getAttributeLabel("date_added").",".
				                " \r\n";
			   foreach ($dataProvider2 as $data) {
                        print "$data->project_name,$data->user_id,$data->date_added \r\n";
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
	
	  if(isset($_POST['QuestionProject']))
		{
		
		// $value = $_POST['QuestionProject']['project_name'];
		
			$model = QuestionProject::model()->findByPk($_POST['QuestionProject']['project_id']);
					if($model===null)
					{
						throw new CHttpException(404,'The requested page does not exist.');
					}
		
			if(isset($_POST['QuestionProject'])) 
				{
				    $id = $_POST['QuestionProject']['project_id'];
					$value = $_POST['QuestionProject']['project_name'];
					$updateprojectname=QuestionProject::model()->updateByPk($id,array("project_name"=>$value)); 
				}
			 	  	
				
				echo $value;	  
				
				
		}
	
	
	}	
	
	
	
	

	
	
	
	
	public function actionEmail($id)
	{
	 $model= new QuestionProject('search');
	 
	if(isset($_POST['email']))
	 {
	  $project_id=$_POST['project_id'];
	  $to =$_POST['to'];
	//  $sender_name =$_POST['sender_name'];
	  $sender_email =$_POST['sender_email'];
	  $subject =$_POST['subject'];
	  $checkproject=$_POST['checkproject'];
	 if($checkproject=='on')
	 {
	  $description=ProjectView($project_id);
	 } else {
	  $description="";
	 } 
	 
	  if($_POST['cc']!='')
	  {   
	      $allemails="";
		  foreach($_POST['cc'] as $val)
		  {
		   // send email to cc user
		   
		        if(($recent_inv_id!='') && ($recent_inv_id!='0'))
				{ 
					 $ccemail = Yii::app()->email;
					 $ccemail->to = $val;
					 $ccemail->from = $sender_email; 
					 $ccemail->subject = $subject;
					 $ccemail->message = $description;
					 $ccemail->send();	
			 	} 	 	   
		   
		  }
     } ?>
	  <div style="color:#993300; text-align:center;"> Successfully Send.</div>
	  <meta http-equiv="refresh" content="1;url='../admin'" />
	 <?  exit;
	  }
	 
	 
	$this->render('email',array(
			'model'=>$model,
		));
	}
	 
}
