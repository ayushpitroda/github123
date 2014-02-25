<?php

class QQueryController extends Controller
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
				'actions'=>array('create','update','admin','delete','viewallquestions','questionupdate','staticquestionupdate','squestionupdate'),
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
		$model=new QQuery;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['QQuery']))
		{
	
	//	     $model->attributes=$_POST['QQuery'];
			 $nowdate=date("Y-m-d H:i:s"); 
		     $question=$_POST['main_question'];
		//	 $content=$_POST['question_content'];
		//	 $de_question=$_POST['de_question'];
			 $de_content=$_POST['de_content'];
			 $en_question=$_POST['en_question'];
			 $en_content=$_POST['en_content'];
		     $category_id= substr($_POST['category'],4);
			 $q_type=$_POST['subtype'];
			 $a_type=$_POST['answer'];
			 if(isset($_POST['optionstype'])){
			 $optionstype= $_POST['optionstype'];
			 }
			  if(isset($_POST['en_optionstype'])){
			 $en_optionstype= $_POST['en_optionstype'];
			 }
			 $disciplinesdisplay=$_POST['disciplinesdisplay'];
			 $disciplines_answer=$_POST['disciplines_answer'];
			  if(isset($_POST['discp_optionstype'])){
			 $discp_optionstype= $_POST['discp_optionstype'];
			 }
			   if(isset($_POST['en_discp_optionstype'])){
			 $en_discp_optionstype= $_POST['en_discp_optionstype'];
			 }
	         
			 $count = QQuery::Model()->count("parent_q_id=1 and category_id='$category_id' and q_type='$q_type'");
             $position=$count+1;
						 
			 if($q_type=='1')
			 {
	           $model->question=$question;
			   $model->content=$content;
			   $model->de_question=$question;
			   $model->de_content=$de_content;
			   $model->en_question=$en_question;
			   $model->en_content=$en_content;
			   $model->category_id=$category_id;
			   $model->q_type=$q_type;
			   $model->a_type=$a_type;
			   $model->position=$position;
			   $model->user_id =Yii::app()->user->id;
	     	   $model->created_on=$nowdate;
			   $model->status=1;
			   $model->parent_q_id=1;  
			   $model->save();
		 	   $recent_id=Yii::app()->db->getLastInsertId();
			  if($optionstype!='')
			 {
			 
				 foreach($optionstype as $key => $value)
				  {
				  if($value!='') {
				  $optionsdatabase= new QuestionOptions;
				  $optionsdatabase->question_id=$recent_id;
				  $optionsdatabase->category_id=$category_id;
				  $optionsdatabase->question_type_id=$q_type;
				  $optionsdatabase->question_answer_type_id=$a_type;
				  $optionsdatabase->content=$value;
				  $optionsdatabase->de_content=$value;
				   foreach($en_optionstype as $en_key => $en_value)
					  {
						   if($en_key==$key) 
							 { 
					           $optionsdatabase->en_content=$en_value;
					         }
					  }  
				  $optionsdatabase->user_id=Yii::app()->user->id;
				  $optionsdatabase->date_added=$nowdate;
			     $optionsdatabase->save();
								  }  
				  }
            }
			 
			 
			 }else if($q_type=='2')
			 {
			   $model->question=$question;
			   $model->content=$content;
			   $model->de_question=$question;
			   $model->de_content=$de_content;
			   $model->en_question=$en_question;
			   $model->en_content=$en_content;
			   $model->category_id=$category_id;
			   $model->q_type=$q_type;
			   $model->a_type=$disciplines_answer;
			   $model->discipline_id=$disciplinesdisplay;
			   $model->position=$position;
			   $model->user_id =Yii::app()->user->id;
	     	   $model->created_on=$nowdate;
			   $model->status=1;
			   $model->parent_q_id=1;  
			   $model->save();
		 	   $recent_id=Yii::app()->db->getLastInsertId();
			 
				   if($discp_optionstype!='')
				 {
					 foreach($discp_optionstype as $key => $value)
					  {
					  if($value!='') {
					  $optionsdatabase= new QuestionOptions;
					  $optionsdatabase->question_id=$recent_id;
					  $optionsdatabase->category_id=$category_id;
					  $optionsdatabase->question_type_id=$q_type;
					  $optionsdatabase->question_answer_type_id=$a_type;
					  $optionsdatabase->content=$value;
					    foreach($en_discp_optionstype as $en_d_key => $en_d_value)
					  {
						   if($en_d_key==$key) 
							 { 
					           $optionsdatabase->en_content=$en_d_value;
					         }
					  }  
					  $optionsdatabase->de_content=$value;
					  $optionsdatabase->user_id=Yii::app()->user->id;
					  $optionsdatabase->date_added=$nowdate;
				  $optionsdatabase->save();
									  }  
					  }
				} 
				
		  } 
				
//	$this->redirect(array('view','id'=>$model->id));
	 $this->redirect(array('viewallquestions'));
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

		if(isset($_POST['QQuery']))
		{
			$model->attributes=$_POST['QQuery'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	/* action question update */
	
	public function actionQuestionupdate($id)
	{
		$model=$this->loadModel($id);
      	// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['QQuery']))
		{
		  
			$model->attributes=$_POST['QQuery'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->renderPartial('questionupdate',array(
			'model'=>$model,
		));
		
//	$this->renderPartial('questionupdate', array('model'=>$model), true, true);
	}
	
	public function actionStaticquestionupdate($id)
	{
		$model=$this->loadModel($id);
      	// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['QQuery']))
		{
		   
			$model->attributes=$_POST['QQuery'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->renderPartial('staticquestionupdate.php',array(
			'model'=>$model,
		));
		
//	$this->renderPartial('questionupdate', array('model'=>$model), true, true);
	}
	
	public function actionSquestionupdate($id)
	{
		
		$model=$this->loadModel($id);
      	// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['QQuery']))
		{
			$model->attributes=$_POST['QQuery'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->renderPartial('staticquestionupdate',array(
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
		$dataProvider=new CActiveDataProvider('QQuery');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new QQuery('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['QQuery']))
			$model->attributes=$_GET['QQuery'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionViewallquestions()
	{
	$model=new QQuery;
	
	if(isset($_POST['QQuery']))
		{
		
		$nowdate=date("Y-m-d H:i:s"); 
	    $questionid=$_POST['questionid'];
		$question=$_POST['main_question'];
	   // $content=$_POST['question_content'];
		$de_question=$_POST['main_question'];
		$de_content=$_POST['de_content'];
		$en_question=$_POST['en_question'];
		$en_content=$_POST['en_content'];
		
		if(($questionid=='1') || ($questionid=='5') || ($questionid=='9'))
		{
		$a_type="1";
		} else 
		{
		$a_type=$_POST['answer'];
		$disciplinesdisplay=$_POST['disciplinesdisplay'];
		$optionstype= $_POST['optionstype'];
		$discp_optionstype=$_POST['discp_optionstype'];
		 if(isset($_POST['optionstype'])){
			 $optionstype= $_POST['optionstype'];
			 }
			  if(isset($_POST['en_optionstype'])){
			 $en_optionstype= $_POST['en_optionstype'];
			 }
			 $disciplinesdisplay=$_POST['disciplinesdisplay'];
			 $disciplines_answer=$_POST['disciplines_answer'];
			  if(isset($_POST['discp_optionstype'])){
			 $discp_optionstype= $_POST['discp_optionstype'];
			 }
			   if(isset($_POST['en_discp_optionstype'])){
			 $en_discp_optionstype= $_POST['en_discp_optionstype'];
			 }
			 
		}
		
		
		
		// $tempdocmodel=QQuery::model()->updateByPk($questionid,array("question"=>$question,"content"=>$content,"de_question"=>$de_question,"de_content"=>$de_content,"en_question"=>$en_question,"en_content"=>$en_content,"a_type"=>$a_type)); 
	
	    $tempdocmodel=QQuery::model()->updateByPk($questionid,array("question"=>$question,"de_question"=>$de_question,"de_content"=>$de_content,"en_question"=>$en_question,"en_content"=>$en_content,"a_type"=>$a_type)); 
        
		if(($a_type=='2') || ($a_type=='3') || ($a_type=='4') )
		{
		
		$query = "delete from  question_options where question_id='$questionid'";
        $command = Yii::app()->db->createCommand($query);
        $command->execute();
		  
	       if($discp_optionstype!='')
				 {
					 foreach($discp_optionstype as $key => $value)
					  {
					  if($value!='') {
					  $optionsdatabase= new QuestionOptions;
					  $optionsdatabase->question_id=$questionid;
					  $optionsdatabase->content=$value;
					     foreach($en_discp_optionstype as $en_d_key => $en_d_value)
					  {
						   if($en_d_key==$key) 
							 { 
					           $optionsdatabase->en_content=$en_d_value;
					         }
					  }  
					  $optionsdatabase->de_content=$value;
					  $optionsdatabase->user_id=Yii::app()->user->id;
					  $optionsdatabase->date_added=$nowdate;
				      $optionsdatabase->save();
									  }  
					  }
				}
				
				
			if($optionstype!='')
			 {
			
				 foreach($optionstype as $key => $value)
				  {
				  if($value!='') {
				  $optionsdatabase= new QuestionOptions;
				  $optionsdatabase->question_id=$questionid;
				  $optionsdatabase->content=$value;
				  $optionsdatabase->de_content=$value;
				   foreach($en_optionstype as $en_key => $en_value)
					  {
						   if($en_key==$key) 
							 { 
					           $optionsdatabase->en_content=$en_value;
					         }
					  } 
				  
				  $optionsdatabase->user_id=Yii::app()->user->id;
				  $optionsdatabase->date_added=$nowdate;
			      $optionsdatabase->save();
								  }  
				  }
            }	
	  
	  
		}
		
	 $this->redirect(array('viewallquestions'));
	   }
		

		$this->render('viewallquestions',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return QQuery the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=QQuery::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param QQuery $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='qquery-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
