<?php
class UsersController extends Controller
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
				'actions'=>array('create','update','admin','delete','persupdate','profileview','changepassword','rolesupdate','clearfilters','status','exportcsv','exportall','Import','exportselected'),
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
 public function actionProfileview($id)
	{
		$this->render('profileview',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
 public function actionCreate()
	{
		
		$model=new Users;
		$nowdate=date("Y-m-d"); 
		if(isset($_POST['register']))
		{
		
	  	$password=$_POST['password'];
		$cpassword=$_POST['cpassword'];
	  if($password==$cpassword) 
	  {	
 		 $username=$_POST['username'];
		 $email=$_POST['email'];
		 $countcheck= Users::Model()->count("username='$username'");
	     if($countcheck<=0)
    		{
		$emailcountcheck= Users::Model()->count("email='$email'");
		  if($emailcountcheck<=0)
		   {
				
				$model->username=$_POST['username'];
				$model->fname=$_POST['fname'];
				$model->lname=$_POST['lname'];
				$model->password=$_POST['password'];
				$model->mobile=$_POST['mobile'];
				$model->email=$_POST['email'];
				$model->status=1;
				$model->account_created=$nowdate;
				$model->save();
				$recent_id=Yii::app()->db->getLastInsertId();
				
				if($recent_id > 0)
				{
				 $allroles=$_POST['role'];
				
						if($allroles!='')
							{
							$newallroles=",";
							 foreach($allroles as $key=>$val)
							  { if($val!='')
								 {
								   $newallroles.=$val.",";
								 }  
							  } 
							} else {
							   $newallroles.=",2,";
							}
						
				
			 $updateroles=Users::model()->updateByPk($recent_id,array("role"=>$newallroles)); 	
				}
				
		  } else { ?>
 		<div style="color:#993300; text-align:center;">  Sorry Email Id already taken, Please try another Email Id</div>
		<meta http-equiv="refresh" content="3;url='create'" /> 
		 <? } ?>  	
		<div style="color:#993300; text-align:center;"> Successfully Inserted.</div>
		<meta http-equiv="refresh" content="3;url='create'" />
		<? 
		}else
		{
		?>
		<div style="color:#993300; text-align:center;">Sorry User name already taken, Please try another User name</div>
		<meta http-equiv="refresh" content="3;url='create'" />
	<?  
		}
	  }else 
	  { ?>
	  <div style="color:#993300; text-align:center;">Passwords Are Does Not Match.Please Try Again</div>
	   <meta http-equiv="refresh" content="3;url='create'" />
	 <?        }  	 
		}
		$this->render('create',array('model'=>$model));
		
		
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

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
 public function actionPersupdate($id)
	{
		$model=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['update']))
		{
	    $id=$_POST['user_id'];
		$email = $_POST['email'];
		$username =$_POST['username'];
		$fname =$_POST['fname'];
		$lname =$_POST['lname'];
		$mobile =$_POST['mobile'];
		$newsleter =$_POST['newsleter'];
		
		
	
    	$countcheck= Users::Model()->count("username='$username'");
		if($countcheck<=0)
		{
		
		$updateallwithoutusername=Users::model()->updateByPk($id,array("fname"=>$fname,"lname"=>$lname,"mobile"=>$mobile,"newsletter"=>$newsleter,"username"=>$username)); 
		 $emailcountcheck= Users::Model()->count("email='$email'");
		  if($emailcountcheck<=0)
		   {
		    	$model->attributes=$_POST['Users'];
		    	//if($model->save())
				$updateallwithoutusername=Users::model()->updateByPk($id,array("fname"=>$fname,"lname"=>$lname,"username"=>$username,"email"=>$email,"mobile"=>$mobile,"newsletter"=>$newsleter)); 
				$this->redirect(array('view','id'=>$model->id));
		  } else {
		 
	   $updateallwithoutusername=Users::model()->updateByPk($id,array("fname"=>$fname,"lname"=>$lname,"mobile"=>$mobile,"newsletter"=>$newsleter)); 
		 
		   ?>
		   
		  
 		<div style="color:#993300; text-align:center;">  Sorry Email Id already taken, Please try another Email Id</div>
		
		 <? 	$this->redirect(array('profileview','id'=>$model->id)); } ?>  	
		
		<div style="color:#993300; text-align:center;">Successfully Inserted...Please Login</div>
		<? 
			$this->redirect(array('profileview','id'=>$model->id));
		}else
		{
		 $updateallwithoutusername=Users::model()->updateByPk($id,array("fname"=>$fname,"lname"=>$lname,"mobile"=>$mobile,"newsletter"=>$newsleter)); 
		?>
		<div style="color:#993300; text-align:center;">Sorry User name already taken, Please try another User name</div>
		
	<?   	$this->redirect(array('profileview','id'=>$model->id));
		}
	  
  }
$this->render('persupdate',array(
			'model'=>$model,
		));
	}
	
	public function actionChangepassword($id)
	{
		$model=$this->loadModel($id);
		if(isset($_POST['changepassword']))
		{
		 $oldpassword=md5($_POST['oldpassword']);	
		 $userid =  Yii::app()->user->id;     
		 $count = Users::Model()->count("password ='$oldpassword' and id='$userid'");
		 		
		  if($count <= 0)
			{  // echo '1'; Password is not correct ?>
			<div style="color:#993300; text-align:center;"> Passwords are Matched</div>
			<meta http-equiv="refresh" content="3;url=''" /> 
			
		 <?  }
			else
			{
			  //echo '0';   Password is correct
			 if(isset($_POST['password']))
			 {
			 if($_POST['password']!='')
			  {
		       $password=md5($_POST['password']);
		
			   $updateallwithoutusername=Users::model()->updateByPk($id,array("password"=>$password)); 
			   ?>
			   <div style="color:#993300; text-align:center;">Password Successfully Updated</div>
			 <?  $this->redirect(array('profileview','id'=>$model->id));  }
			 } 
			  
		 	}
		}

 $this->render('changepassword',array('model'=>$model));
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
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
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Users('search');
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
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionRolesupdate($id)
	{
		$model=new Users;
     if(isset($_POST['rolestousers']))
		{
	    $newallroles=",";
		$role_name=$_POST['role_name'];
		$user_id=$_POST['user_id'];
		
		if($role_name!='')
		  {
		     foreach($role_name as $key=>$val)
			  {
			    $newallroles.=$val.",";
			  } 
		
		   $userupdate=Users::model()->updateByPk($user_id,array("role"=>$newallroles)); 
   		 ?> 
		 <div style="color:#993300; text-align:center;"> Successfully Updated...</div>
		 <?     
		 $this->redirect(array('admin'));
		  }
	 	}
	
	$this->render('rolesupdate',array(
			'model'=>$model,
		));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	 
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	 protected function RoleNames($data,$row)
    {
	   $val=trim($data->role,",");
	   if($val!='')
	   {
	   $sval=$val;
	   }else
	   {
	   $sval=",2,";
	   }
       $cnt = Roles::Model()->count("role_id in ($sval) ");
	   if($cnt>0)
	   {
		  $fetch_rolename= Roles::model()->findAll(array('condition'=>"role_id in($sval)"));
		  $role_name="";
		  $surl="";
		  foreach($fetch_rolename as $key=>$val)
		  {
			  $roleid=$val['role_id'];
			  $rolename=rolenamefetchfunc($roleid);
			  $role_name.='<a href="../roles/assignpermissions?role_id='.$roleid.'"'. ">".$rolename."</a>".",";
		  }
	 $role_name=trim($role_name,",");
	   } else {
	   $role_name="";
	   }
	   return $role_name;                   
    }
	
	
  protected function OptionNames($data,$row)
    {
	   $val=trim($data->reg_options,",");
	   if($val!='')
	   {
	   $sval=$val;
	   $cnt = QRegOptions::Model()->count("auto_id in ($sval) ");
	    if($cnt>0)
	   {
		  $fetch_rolename= QRegOptions::model()->findAll(array('condition'=>"auto_id in($sval)"));
		  $role_name="";
		  $surl="";
		  foreach($fetch_rolename as $key=>$val)
		  {
			  $roleid=$val['auto_id'];
			  $rolename=optionnamefetchfunc($roleid);
			  $role_name.=$rolename.",";
		  }
	 $role_name=trim($role_name,",");
	   } else {
	   $role_name="";
	   }
	   } else {
	   $role_name="";
	   }
       
	  
	   return $role_name;                   
    }
	
	
	public function actionExportcsv() {
	            header('Content-type: text/csv');
                header('Content-Disposition: attachment; filename="users.csv"');

                $model=new Users('search');
             //   $model->unsetAttributes();  // clear any default values
                
                if(Yii::app()->user->getState('exportModel'))
                      $model=Yii::app()->user->getState('exportModel');

               $dataProvider = $model->search(false);
                // csv header  Address::model()->getAttributeLabel("Id").",". 
                echo    
				Users::model()->getAttributeLabel("fname").",". 
				Users::model()->getAttributeLabel("lname").",". 
				Users::model()->getAttributeLabel("company").",".
				Users::model()->getAttributeLabel("username").",". 
				Users::model()->getAttributeLabel("email").",". 
				
                                " \r\n";
                // csv data
                foreach ($dataProvider->getData() as $data) {
                       print "$data->fname,$data->lname,$data->company,$data->username,$data->email \r\n";
                }
                
			  exit();
		
	}
	
	public function actionExportall()
	{
	$dataProvider1 = Users::model()->findAll();
    header('Content-type: text/csv');
    header('Content-Disposition: attachment; filename="Users.csv"');

                echo 
				Users::model()->getAttributeLabel("fname").",". 
				Users::model()->getAttributeLabel("lname").",". 
				Users::model()->getAttributeLabel("company").",".
				Users::model()->getAttributeLabel("username").",". 
				Users::model()->getAttributeLabel("email").",".
				                " \r\n";
			   foreach ($dataProvider1 as $data) {
                      print "$data->fname,$data->lname,$data->company,$data->username,$data->email \r\n";
                }
                
			  exit();		

	}
	
	public function actionExportselected() {
	
	    if(isset($_POST['autoId']))
		{

		$autoIdAll = $_POST['autoId'];
        $dataProvider2= Users::model()->findAllByAttributes(array('id'=>$autoIdAll));
		
	//	print_r($dataProvider2);
		
        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename="Users.csv"');

                echo  
				Users::model()->getAttributeLabel("fname").",". 
				Users::model()->getAttributeLabel("lname").",". 
				Users::model()->getAttributeLabel("company").",".
				Users::model()->getAttributeLabel("username").",". 
				Users::model()->getAttributeLabel("email").",".
				                " \r\n";
			   foreach ($dataProvider2 as $data) {
                       print "$data->fname,$data->lname,$data->company,$data->username,$data->email \r\n";
                }
                
			  exit();		
		 }  else 

		{ ?>
		<div style="color:#993300; text-align:center;"><strong>Please Select Atleast One Item</strong></div>
		<meta http-equiv="refresh" content="3;url='admin'" />
		<?    
	    } } 

	  public function actionClearfilters()
	 {  
	  $model=new Pagewords('search');
	  $this->redirect(array('admin'));
	 }
	 
  	public function actionStatus()
	{
	  if(isset($_POST['Users']))
		{
			$model = Users::model()->findByPk($_POST['Users']['id']);
					if($model===null)
					{
						throw new CHttpException(404,'The requested page does not exist.');
					}
		 
			if(isset($_POST['Users']['fname'])) 
				{
					$value = $_POST['Users']['fname'];
					$model->fname = $_POST['Users']['fname'];
					$model->id = $_POST['Users']['id'];
					$id = $_POST['Users']['id'];
					$updateallwithoutusername=Users::model()->updateByPk($id,array("fname"=>$value)); 
				}
			if(isset($_POST['Users']['lname'])) 
				{
					$value = $_POST['Users']['lname'];
					$model->lname = $_POST['Users']['lname'];
					$model->id = $_POST['Users']['id'];
					$id = $_POST['Users']['id'];					
					$updateallwithoutusername=Users::model()->updateByPk($id,array("lname"=>$value)); 
				}
		   if(isset($_POST['Users']['company'])) 
				{
				   
					$value = $_POST['Users']['company'];
					$model->company = $_POST['Users']['company'];
					$model->id = $_POST['Users']['id'];
					$id = $_POST['Users']['id'];
					$updateallwithoutusername=Users::model()->updateByPk($id,array("company"=>$value)); 
				}			
				echo $value;	  
		}
	}	
}
