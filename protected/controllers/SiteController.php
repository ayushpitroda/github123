<?php
 session_start();

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{	
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		if(isset($_POST['register']))
		{
	     $sc = $_POST['security_code'];
         $sc1 = $_SESSION['security_code'];
		
	  if($sc==$sc1)
		{
		 if($_POST['user_disciplines']!='')
		 {
		  $alldiscplines=",";
		   foreach($_POST['user_disciplines'] as $dval)
		    { 
			  if($dval!='')
			   {
			     $alldiscplines.=$dval.",";
			   } 
			}
		 } else {
		        $alldiscplines="";
		 }
		 
		 if($_POST['options']!='')
		 {
		  $allvalues=",";
		   foreach($_POST['options'] as $val)
		    { 
			  if($val!='')
			   {
			     $allvalues.=$val.",";
			   } 
			}
		 } else {
		        $allvalues="";
		 }
		
	
		
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
		    
		        $username=$_POST['username'];
				$email=$_POST['email'];
				$fname=$_POST['fname'];
				$lname=$_POST['lname'];
				$mobile=$_POST['mobile'];
				$password=md5($_POST['password']);
				$options=$allvalues;
				$user_disciplines=$alldiscplines;
				$rolesusrf=",2,";
				$newsleter=$_POST['newsleter'];
				$status=1;
				$account_created=$nowdate;
				
				 $sql="insert into users (username,password,status,role,account_created,fname,lname,email,mobile,reg_options,newsletter,user_disciplines) values('$username','$password','1','$rolesusrf','$account_created','$fname','$lname','$email','$mobile','$options','$newsleter','$user_disciplines')";
			 
				 $connection=Yii::app()->db;
				 $connection->createCommand($sql)->execute();
				 $recent_invuser_id=Yii::app()->db->getLastInsertId();
				
				
				/*$model->username=$_POST['username'];
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
			 $updateroles=Users::model()->updateByPk($recent_id,array("role"=>$rolesusrf)); 
			 $updateoptions=Users::model()->updateByPk($recent_id,array("reg_options"=>$allvalues)); 	
				}*/
				
		  ?> <div style="color:#993300; text-align:center;"> Successfully Inserted...Please Login</div>
		<meta http-equiv="refresh" content="3;url='login'" /> <?  } else { ?>
 		<div style="color:#993300; text-align:center;">  Sorry Email Id already taken, Please try another Email Id</div>
		<meta http-equiv="refresh" content="3;url='register'" /> 
		 <? } ?>  	
		
		<? 
		}else
		{
		?>
		<div style="color:#993300; text-align:center;"> Sorry User name already taken, Please try another User name</div>
		<meta http-equiv="refresh" content="3;url='register'" />
	<?  
		}
	  }else 
	  { ?>
	  <div style="color:#993300; text-align:center;"> Passwords Are Does Not Match.Please Try Again</div>
	  <meta http-equiv="refresh" content="3;url='register'" />
	 <?        }  	 
		 } 
	   else { ?>
	    <div style="color:#993300; text-align:center;"> Captcha code is Incorrect,Please Try again</div>
	  <meta http-equiv="refresh" content="3;url='register'" />
		 <? 
	  }	 
		}
		$this->render('index');
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
		//	print_r($_POST['LoginForm']);
			
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
		//	$this->redirect(Yii::app()->user->returnUrl);
		  // $this->redirect('questionAnswers/create');
		     $_SESSION['langid']=1; 
	         $this->redirect(array('/site/page', 'view'=>'homepage'));
		    	 
			
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionRegister()
	{
		$model=new Users;
		$nowdate=date("Y-m-d"); 
		if(isset($_POST['register']))
		{
//		print_r($_SESSION);
	     $sc = $_POST['security_code'];
         $sc1 = $_SESSION['security_code'];
		
	  if($sc==$sc1)
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
		    
		        $username=$_POST['username'];
				$email=$_POST['email'];
				$fname=$_POST['fname'];
				$lname=$_POST['lname'];
				$mobile=$_POST['mobile'];
				$password=md5($_POST['password']);
				
				$rolesusrf=",2,";
				$newsleter=$_POST['newsleter'];
				$status=1;
				$account_created=$nowdate;
				
				 $sql="insert into users (username,password,status,role,account_created,fname,lname,email,mobile,newsletter) values('$username','$password','1','$rolesusrf','$account_created','$fname','$lname','$email','$mobile','$newsleter')";
			 
				 $connection=Yii::app()->db;
				 $connection->createCommand($sql)->execute();
				 $recent_invuser_id=Yii::app()->db->getLastInsertId();
				
				
				
				
		  ?> <div style="color:#993300; text-align:center;"> Successfully Inserted...Please Login</div>
		<meta http-equiv="refresh" content="3;url='login'" /> <?  } else { ?>
 		<div style="color:#993300; text-align:center;"> Sorry Email Id already taken, Please try another Email Id</div>
		<meta http-equiv="refresh" content="3;url='register'" /> 
		 <? } ?>  	
		
		<? 
		}else
		{
		?>
		<div style="color:#993300; text-align:center;">Sorry User name already taken, Please try another User name</div>
		<meta http-equiv="refresh" content="3;url='register'" />
	<?  
		}
	  }else 
	  { ?>
	  <div style="color:#993300; text-align:center;">Passwords Are Does Not Match.Please Try Again</div>
	  <meta http-equiv="refresh" content="3;url='register'" />
	 <?        }  	 
		 } 
	   else { ?>
	    <div style="color:#993300; text-align:center;"> Captcha code is Incorrect,Please Try agains</div>
	  <meta http-equiv="refresh" content="3;url='register'" />
		 <? 
	  }	 
		}
		$this->render('register',array('model'=>$model));
	}
	
public function actionCheckCaptcha()
		{
		 	
	 	   if(isset($_POST['security_code']))//If a username has been submitted   
                {
				$sc = $_POST['security_code'];
                $sc1 = $_SESSION['security_code'];
		
				  if($sc==$sc1)
					{
					echo '0'; //Not correct
					}
					else
					{
					echo '1';  // Correct
					}
				 }	
	   }	
	
 public function actionCheckusername()
		{
		 	$model=new Users;
	 	   if(isset($_POST['username']))//If a username has been submitted   
                {
				  $username=$_POST['username'];
				  $count = Users::Model()->count("username='$username' ");
				  if($count > 0)
					{
					echo '1'; //Not Available
					}
					else
					{
					echo '0';  // Username is available
					}
				 }	
	   }
	   
	 public function actionCheckemail()
		{
	 	$model=new Users;
        if(isset($_POST['email']))//If a username has been submitted   
                {
	    		$email=$_POST['email'];
		    	$count = Users::Model()->count("email='$email'");
			 if($count > 0)
					{
					echo '1'; //Not Available
					}
					else
					{
					echo '0';  // Username is available
					}
				}	
	   } 
 public function actionCheckpassword()
		{
		   	$model=new Users;
					
	    	   if(isset($_POST['oldpassword']))//If a username has been submitted   
                {
			     $oldpassword=md5($_POST['oldpassword']);	
				 $userid =  Yii::app()->user->id;     
			     $count = Users::Model()->count("password ='$oldpassword' and id='$userid'");
				 if($count <= 0)
					{
					echo '1'; //Password is not correct
					}
					else
					{
					echo '0';  // Password is correct
					}
				 
				}	
	   } 	   
 public function actionPagewordchange($langid,$page)
	{
	//session_start();
	$_SESSION['langid']=$langid; 
	$this->redirect($page);
	} 
 public function actionForgotpassword()
	{
		$model=new Users;
	    $nowdate=date("Y-m-d"); 
		if(isset($_POST['forgot']))
		{
	  	 $email=$_POST['email'];
		 $countcheck= Users::Model()->count("email='$email'");
		 if($countcheck > 0)
		 {
	     $usernamearray=usernamefetchdetemailfunc($email);
	     $username=$usernamearray['username'];
	   	 $id=$usernamearray['id'];
		 $password=newpasswordgenfunc(9);
		 $encpassword=encryptpasswordGen($id);
		 $mdpassword=md5($password);
		 $updatepassword=Users::model()->updateByPk($id,array("password"=>$mdpassword,"encpassword"=>$encpassword));
		 //$useridwithstring=sendstring($id);
		 $body="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' /><title>Untitled Document</title></head><body><table width='100%' border='0' cellpadding='5' cellspacing='0' style='border:1px solid #ccc;' bgcolor='#f2f2f2'><tr><td colspan='3'><strong>Please Login With Your New Password </strong></td></tr><tr><td width='354'>User Name </td><td width='4'>:</td><td width='936'>$username</td></tr><tr><td width='354'>Email Id </td><td width='4'>:</td><td width='936'>$email</td></tr><tr><td width='354'>New Password </td><td width='4'>:</td><td width='936'>$password</td></tr><tr><td colspan='3'>Please <a href='https://www.raumbuch.eu/index.php/site/changepassword/string/$encpassword' target='_blank'>Click here </a>  for  Change the New Password</td></tr></table>";
		 $emailiddb=$usernamearray['email'];
		 $email = Yii::app()->email;
		 $email->to = $usernamearray['email'];
		 $email->from = 'admin@medianet-home.de'; 
         $email->subject = 'Medianet Raumbuch Questioner New Password';
		 $email->message = $body;
		 $email->send();
		
	
	     $alertcontent= "This procedure was successful and the password is send to respective mail address.";
	   
	   print "<script type='text/javascript'> alert('".$alertcontent."');</script>"; 
		?>
		<div style="color:#993300; text-align:center;"><?php echo  $alertcontent;?></div>
		<meta http-equiv="refresh" content="2;url='login'" />
		<? 
		}else
		{
		?>
		<div style="color:#993300; text-align:center;">Username Does Not Exist...Please Enter Another Username</div>
		<meta http-equiv="refresh" content="3;url='forgotpassword'" />
	<?  
		}
		}
		$this->render('forgotpassword',array('model'=>$model));
	}
	
	
	
	
	
	public function actionChangepassword($string)
	{
	  
		//$model=$this->loadModel($id);
		if(isset($_POST['changepassword']))
		{
		   $id= $_POST['userid'];
		  $countcheck= Users::Model()->count("id='$id'");
	      if($countcheck>0)
    		{  
		   
		    $newuserstring=sendstring($id);
		   if(isset($_POST['password']))
			 {
			 if($_POST['password']!='')
			  {
		       $password=md5($_POST['password']);
			   $encpassword="";
			   $updateallwithoutusername=Users::model()->updateByPk($id,array("password"=>$password,"encpassword"=>$encpassword));
				print "<script type='text/javascript'> alert(Password Successfully Updated);</script>"; 
			   ?>
			   <div style="color:#993300; text-align:center;"> Password Successfully Updated</div>
			   <meta http-equiv="refresh" content="1;url='.../../../../../site/login'" />
			   <?php /*?><?  $this->redirect(array('login'); ?><?php */?>
			 <?   
			  exit();}
			} else {  ?>
			 <div style="color:#993300; text-align:center;"> You Are Not authorised To access This Page</div>
	         <meta http-equiv="refresh" content="3;url='../../../../index.php'" />
		<? 	} 
			 } 
		 	
	}

 $this->render('changepassword');
		
	}
	
	
	public function actionSubmitticket()
	{
		if(isset($_POST['submitticket']))
		{
		   $id= Yii::app()->user->id;
		    $title=$_POST['title'];
		    $uname=$_POST['uname'];
		    $useremail = $_POST['useremail'];
			if($_POST['ccemail']!='')
			{
				foreach ($_POST['ccemail'] as $key => $val) {
				   if($val!='') {
				      $ccemail .= $val . ",";
					            }
				 }
			 $ccemail = trim($ccemail,",");
			} 
		   
		    $jobtype = $_POST['jobtype'];
			$managejob =$_POST['managejob'];
			$subject = $_POST['subject'];
			$wanteddate = $_POST['seek_before_date'];
			if($wanteddate == "")   {
                $wanteddate = "";
               }
			   
			 $message = $_POST['message'];
            $priority = $_POST['priority'];
            $FROM = "admin@medianet-shop.de";
			$today = date("F, j, Y");
			$to = "admin@medianet-shop.de,vgujjulareddy@medianet-home.de";
			if ($priority == 'Normal Priority') {
			  $priority_id = '10';
			} else {
			  $priority_id = '2';
			}
		
		
		    // file upload 
			
			
			$filename1 =$_FILES[fileupload]['name'];
			if($filename1!=''){
			$possible = '2345678901';
							$code = '';
							$i = 0;
							while ($i < 4) { 
								$code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
								$i++;
				              }
				
			 $filename_ext =$code."_".$_FILES[fileupload]['name'];
			 
			 $uplo=YiiBase::getPathOfAlias('webroot').'/images/'.$filename_ext;
			 $filename1 =$_FILES[fileupload]['name'];	
					
			if(is_uploaded_file($_FILES["fileupload"]["tmp_name"])){
			         move_uploaded_file($_FILES["fileupload"]["tmp_name"], YiiBase::getPathOfAlias('webroot').'/images/' . $filename_ext);
				
			    chmod($uplo,0777);   	 
					 }
     }
			
	        
			 $task_id=49;	
	         $projectinfo = Yii::app()->pmsdb->createCommand()->select('person,persons,location,postedby') ->from('tasks')->where('task_id=:task_id', array(':task_id'=>$task_id))->queryRow();
	         $person=$projectinfo['person'];
			 $persons=$projectinfo['persons'];
			 $location=$projectinfo['location'];
			 $postedby=$projectinfo['postedby'];
		     $ttype="STK";
			 $child_shop_id_submiticket=1;		 
		    $taskinsert_qry = 'insert into  tasks (task_type,parent_id,title,priority,start_date,enddate,location,description,persons,person,postedby,posteddate,file,modifieddate) values (\''.mysql_escape_string($ttype).'\',\''.mysql_escape_string($task_id).'\', \''.mysql_escape_string($subject).'\', \''.mysql_escape_string($priority_id).'\',now(), \''.mysql_escape_string($wanteddate).'\', \''.mysql_escape_string($location).'\',\''.mysql_escape_string($message).'\',\''.$persons.'\',\''.$person.'\', \''.mysql_escape_string($postedby).'\',now(), \''.mysql_escape_string($filename_ext).'\', now())';
		 
		   $connection=Yii::app()->pmsdb;
		   $connection->createCommand($taskinsert_qry)->execute();
		   $task_id=Yii::app()->pmsdb->getLastInsertId();
           
    
           $ticketinsert_qry = 'insert into  shops_tickets (task_id,shop_id,user_name,user_email,frnds_email,job_type,manage_jobtype ,subject,seek_before_date,message,priority,date_added,status,persons) values (\''.mysql_escape_string($task_id).'\',\''.mysql_escape_string($child_shop_id_submiticket).'\', \''.mysql_escape_string($uname).'\', \''.mysql_escape_string($useremail).'\', \''.mysql_escape_string($ccemail).'\', \''.mysql_escape_string($jobtype).'\', \''.mysql_escape_string($managejob).'\',\''.mysql_escape_string($subject).'\', \''.mysql_escape_string($wanteddate).'\', \''.mysql_escape_string($message).'\', \''.mysql_escape_string($priority_id).'\',now(),1,0)';	
      
	       $connection=Yii::app()->pmsdb;
		   $connection->createCommand($ticketinsert_qry)->execute();
		   $newticket_id=Yii::app()->pmsdb->getLastInsertId();
		   
	 	   $dte = date("dmY");
           $ticket_id = "$newticket_id"."$dte";
		   $update = Yii::app()->pmsdb->createCommand()->update('shops_tickets', array('ticket_id'=>$ticket_id),'task_id=:task_id',array(':task_id'=>$task_id));
		 
	// higho admin receiver mail
		 
	 $BODY.= "<table width='50%' border='1' align='center'><tr><td>Ticket ID</td><td>&nbsp; $ticket_id</td></tr><tr><td>User Name</td><td>$uname</td></tr> <tr><td>E-mail</td><td>&nbsp;$useremail</td></tr><tr><td>Subject </td><td>$subject</td></tr><tr><td>Job Type </td><td>$jobtype</td></tr>";
    if($managejobtype!='select') {
      $BODY.="<tr><td>Manage Job Type</td><td>&nbsp;$managejob</td></tr>";
    }
    $BODY.="<tr><td>Needed Date</td><td>$wanteddate</td></tr><tr><td>Message </td><td>$message</td></tr><tr><td>Priority</td><td>&nbsp;$priority</td></tr></table>";
    
    $to = "vgujjulareddy@medianet-home.de";
    $to1 = "subbu@medianet-home.de";
    $to2 = "tickets@medianet-shop.de";
	
    $subject_ticket = "Raumbuch Questioner Ticket";
	
	$mail = Yii::app()->email;
	$mail->from = 'tickets@medianet-shop.de'; 
	$mail->to = "vgujjulareddy@medianet-home.de";
	$mail->cc = 'subbu@medianet-home.de';
	$mail->subject = 'Medianet Raumbuch Questioner Ticket';
	$mail->message = $BODY;
	$mail->send();
	
	
	// share mai concept
	$allusermails=$_POST['useremail'];
	if($allusermails!=''){
	$ccmail = Yii::app()->email;
	$ccmail->from = 'tickets@medianet-shop.de'; 
	$ccmail->to = $allusermails;
	$ccmail->subject = 'Medianet Raumbuch Questioner Ticket';
	$ccmail->message = $BODY;
	$ccmail->send();
	}
	
	
	//  login user receiver mail
	
	 $imagename=  Yii::app()->getBaseUrl(true).'/images/raumlogo.png'; 

     $usersbody= "<table width='100%' border='0' cellpadding='5' cellspacing='0' style='border:1px solid #ccc;'><tr bgcolor='#f2f2f2'><td colspan='3'><img src='" . $imagename . "' border='0' /><br></td><tr><td colspan='3'></td></tr><tr><td colspan='3'>Dear $uname,<br>Your Ticket Id :$ticket_id</strong></td></tr><tr><td colspan='2'></td></tr><tr><td width='423'><strong>Subject</strong></td><td width='17'>:</td><td width='919'> $subject</td></tr><tr><td><b>Message</b></td><td width='17'>:</td><td>$message</td></tr><tr><td colspan=3>Thank You,<br> Medianet Team.</td></tr></tr></table>";
    
	
	$user_mail = Yii::app()->email;
	$user_mail->from = 'tickets@medianet-shop.de'; 
	$user_mail->to = $useremail;
	$user_mail->subject = "Your Ticket with ID $ticket_id  -($_POST[subject]) has been received by us";
	$user_mail->message = $usersbody;
	
    if($user_mail->Send()) {
      $str = "Ticket has been received. We will get back to you shortly.";
      print "<script type='text/javascript'>alert('$str');</script>";
    }
    else {
      $str = "Mail function fail";
      print "<script type='text/javascript'> alert('$str');</script>";
    }
 ?>  <meta http-equiv="refresh" content="0;url=''" />
 <?   		    
 exit(); }

 $this->render('submitticket');
		
	}

	public function actionTickets()
	{
		$model=new Tickets('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tickets']))
			print "ssin";
			$model->attributes=$_GET['Tickets'];
           
		$this->render('tickets',array(
			'model'=>$model,
		));
	}
	public function actionShopTickets()
	{
		$model=new ShopTickets('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ShopTickets']))
		   
			$model->attributes=$_GET['ShopTickets'];
          
		$this->render('shoptickets',array(
			'model'=>$model,
		));
	}
	public function actionClearfilters()
	 { 
	  $model=new Tickets('search');
	  $this->redirect(array('tickets'));
	 }
	 
	 
	public function actionTicketsview()
	{
	  $model=new Tickets('search');
	  if(isset($_POST['CommentPost']))
	  {
	     $ticket_id = $_POST['ticket_id'];
        $subject = $_POST['subject'];
        $comment = $_POST['comment'];
        $task_id = $_POST['task_id'];
        $comment_id = $_POST['comment_id'];
        $user_id = Yii::app()->user->id;
		$filename1 =$_FILES[fileupload]['name'];
			if($filename1!=''){
			$possible = '2345678901';
							$code = '';
							$i = 0;
							while ($i < 4) { 
								$code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
								$i++;
				              }
			 $filename_ext =$code."_".$_FILES[fileupload]['name'];
			 $uplo=YiiBase::getPathOfAlias('webroot').'/images/'.$filename_ext;
			 $filename1 =$_FILES[fileupload]['name'];	
					
			if(is_uploaded_file($_FILES["fileupload"]["tmp_name"])){
			         move_uploaded_file($_FILES["fileupload"]["tmp_name"], YiiBase::getPathOfAlias('webroot').'/images/' . $filename_ext);
				
			    chmod($uplo,0777);   	 
					 }
     }
	   
			 
	 $commentinsert = 'insert into  project_comments (task_id,comment_id,subject,comment,file, date_added) values (
  \''.mysql_escape_string($task_id).'\',
  \''.mysql_escape_string($comment_id).'\',
  \''.mysql_escape_string($subject).'\',
  \''.mysql_escape_string($comment).'\',
  \''.mysql_escape_string($filename_ext).'\',
  now()
  )';
	
		   $connection=Yii::app()->pmsdb;
		   $connection->createCommand($commentinsert)->execute();
		   $ins_id=Yii::app()->pmsdb->getLastInsertId();
		   if($ins_id)
		   {
		      
			  $body  = "<table><tbody><tr><td colspan='2'><strong>Raumbuch Ticket Comment</strong></td>
</tr><tr><td>Ticket Id</td><td>" . $ticket_id . "</td></tr><tr><td>Comment Subject</td><td>" . $subject . "</td></tr><tr><td>Comment</td><td>" . $comment . "</td></tr></tbody></table>";
			   
			    $mail = Yii::app()->email;
				$mail->from = 'admin@raumbuch.eu'; 
				$mail->to = "vgujjulareddy@medianet-home.de";
				$mail->cc = 'subbu@medianet-home.de';
				$mail->subject = 'Comment posted on ticket with ID -$ticket_id';
				$mail->message = $body;
				$mail->send();
		   }
		   
	      ?>   <div style="color:#993300; text-align:center;">Comment Successfully Send</div>
		        <meta http-equiv="refresh" content="1;url=''" />
	           
	  <? }  
	  
	  $this->render('ticketview',array(
			'model'=>$model,
		));
	} 
	
	public function actionComments()
	{
	  $model=new Tickets('search');
	  $this->renderPartial('comments',array(
			'model'=>$model,
		));
	} 
	public function actionReplycomments()
	{
	  $model=new Tickets('search');
	  $this->renderPartial('replycomments',array(
			'model'=>$model,
		));
	} 
	public function actionExportcsv() {
	            header('Content-type: text/csv');
                header('Content-Disposition: attachment; filename="tickets.csv"');
                $model=new Tickets('search');
                if(Yii::app()->user->getState('exportModel'))
                      $model=Yii::app()->user->getState('exportModel');

                $dataProvider = $model->search(false);
			//	print_r($dataProvider);
			 
				 echo    
			 	'Ticket Id'.",".'Subject'.",". 'Percent Complete'.",". 'StartDate'.",". 'TargetDate'.",". "\r\n";
				
				foreach ($dataProvider->getData() as $data) {
				        
					   print "$data->task_id,$data->title,$data->percent_complete,$data->start_date,$data->end_date \r\n";
                }
                
			  exit();
		
	}
	
	
	function actionAboutus(){
	
	 $this->render('aboutus');

	
	
	}
	
}