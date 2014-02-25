<?
  function userdetailsfetchfunc($userdbid)
	  {
	   $main_quest=Yii::app()->db->createCommand()->select('fname,lname,email,role,parent_user_id,username,user_disciplines')->from('users')->where('id=:id', array(':id'=>$userdbid))->queryRow();
	   return $main_quest;
	  }
  
 function userprojectaccess($pro_id)
	{
		 $uid=Yii::app()->user->id;
		 if($uid=='1')
		 {
		 $count=1;
		 }
		 else{
		 $count = QuestionProject::Model()->count("project_id='$pro_id' and (user_id='$uid' or  invite_user_id like '%$uid%') ");
			 }
		  
		if($count>0)
		{
			return $count;
		}
		else
		{
			return(0);
		}
		   
	}

function userprofileaccess($userid)
	{
		 $uid=Yii::app()->user->id;
		 
		 if($uid==$userid)
		 {
		      return (1);
		 }
		
		 else{
				return(0);
			 }
	}	
	
 
 

 
 function projectnamefunc($project_id) 
	 {
	   $pronamearray= QuestionProject::model()->find(array('condition'=>"project_id ='$project_id'"));
	   return $pronamearray['project_name'];
	 }

  function projectdatafunc($project_id) 
	 {
	   $pronamearray= QuestionProject::model()->find(array('condition'=>"project_id ='$project_id'"));
	   
	   return $pronamearray;
	   
	 }	   
  
	 
function homepagecontent($pageid)
	 {
	  $pagearray= Pages::model()->find(array('condition'=>"auto_id ='$pageid'"));
	  return  $pagearray['content'];	
	 } 	 


  
    function usernamefetchdetfunc($username)
	  {
	   $useremailfet=Yii::app()->db->createCommand()->select('email,password,id')->from('users')->where('username=:username', array(':username'=>$username))->queryRow();
	   return $useremailfet;
	  }
	  
	function usernamefetchdetemailfunc($email)
	  {
    $emailuseremailfet=Yii::app()->db->createCommand()->select('email,password,id,username')->from('users')->where('email=:email', array(':email'=>$email))->queryRow();
	   return $emailuseremailfet;
	  }  

   
function newpasswordgenfunc($passwordLength){
	$passwordLength='9';
	$characters='0123456789abcdefghijklmnoABCDEFGHIJKLMNOPQRSTUVWXYZ@#$%&!';
	$password_characters = str_split($characters);
	$password='';

	 for($i=0;$i<$passwordLength;$i++){
			$password.=$password_characters[rand(0,count($password_characters)-1)];
			}
return $password;
}


   function rolenamefetchfunc($role_id)
	  {
      $rolename=Yii::app()->db->createCommand()->select('role_name')->from('q_roles')->where('role_id=:role_id', array(':role_id'=>$role_id))->queryRow();
 	 return  $rolename['role_name'];	
	  }
	  
	function countofrolesinrightstablefunc($role_id) 
	{
	  return $count = QRolesRights::Model()->count("role_id='$role_id'");
    }  
	
   function rightidsarrayfunc($role_id) 
	{
	  $allrights= QRolesRights::model()->findAll(array('condition'=>"role_id ='$role_id'"));
	  return $allrights;
    }

   function checkrightsfunc($pid)
   {
    	    	$getuserid=Yii::app()->user->id;
	    	    $userdbsarray=userdetailsfetchfunc($getuserid);
		        $rolesfuserdb=$userdbsarray['role'];
				$roles_array = trim($rolesfuserdb,",");
				$rightcount=countrightsfunc($pid);
		  
			if($rightcount>0)
			{
	    	$rolesandrightscount = QRolesRights::Model()->count("role_id in($roles_array) and right_id ='$pid'");
			if($rolesandrightscount>0)
				{
					return 1;
				}
				else
				{
					return 0;
				}
			}
			else
			{
				return 0;
			}
   }
   
   function countrightsfunc($id)
    {
	return $count = Permissions::Model()->count("right_id='$id'");
	}
   
   
   
   function newusernamegenfunc($usernameLength){
			$usernameLength='5';
			$characters='0123456789abcdefghijklmnoABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$password_characters = str_split($characters);
			$password='';
		
			 for($i=0;$i<$usernameLength;$i++){
					$password.=$password_characters[rand(0,count($password_characters)-1)];
					}
		return "Raumbuch".$password;
		}
		
   function countofusernmaefunc($username) 
	{
	  return $count = Users::Model()->count("username='$username'");
    } 
 function countofemailfetfunc($email) 
	{
	  return $count = Users::Model()->count("email='$email'");
    }  
 
  function emptyCheck($value) {
	$snass=  "Click to edit";
    return (trim($value) == "") ? "$snass" : $value;
	}
 
  function emptyChecksetings($values) {
	$retnval="";
    return (trim($values) == "") ? 'style="font-size:9px; color:#b2b2b2;" ': $retnval;
	//return "subbu";
	}
   function emptyEnddateChecksetings($values) {
	$retnval="";
	
	if(($values== "0000-00-00 00:00:00") || ($values == "")){
	  return $retnval;
	}else {
	 return Yii::app()->dateFormatter->format("d-M-y", strtotime($values));
	}
	//return "subbu";
	}	
	
 function emptyEmailcheck($value,$id) {
	$snass=  "Click to edit";

    return (trim($value) == "") ? "<div  title='Click to edit...' class='email-".$id."' style='font-size:9px; color:#b2b2b2;'>".$snass."</div>": "<a href='mailto:$value'>$value</a>";
	}

  function existprojectfromdbfunc($project_id)
	 {
	 $project=Yii::app()->db->createCommand()->select('level_count,room_count,project_name,subject,description')->from('question_project')->where('project_id=:project_id', array(':project_id'=>$project_id))->queryRow();
	 return  $project;	
	 
	 }	
  
  
  function useridintheprojectexist($userid)
	 {
	  $prouserscount = QuestionProject::Model()->count(" invite_user_id like '%$userid%'");
	  return $prouserscount;
	 }
	
  function projectusersnamefunc($nexistusers)
    {
     $prousersarray = Users::model()->findAll(array('condition'=>"id in ($nexistusers)"));
     return $prousersarray;
    }	

 function emptyCheckinvuserssetings($values,$project_id) 
   {
	 $retnval="";
	 $s=CHtml::link('Remove Users', array("questionProject/changeusers", "project_id"=>$project_id));
     return (trim($values) == "") ? $retnval : $s;
	 //return "subbu";
   } 

 function encryptpasswordGen($id)
 {
 
	$fppasswordLength='8';
	$sppasswordLength='8';
	$characters='0123456789abcdefghijklmnoABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$fppassword_characters = str_split($characters);
	$fppassword='';
	 for($i=0;$i<$fppasswordLength;$i++){
			$fppassword.=$fppassword_characters[rand(0,count($fppassword_characters)-1)];
			}
	$sppassword_characters = str_split($characters);
	$sppassword='';
	 for($j=0;$j<$sppasswordLength;$j++){
			$sppassword.=$sppassword_characters[rand(0,count($sppassword_characters)-1)];
			}		
					
    $newlygentstring=$fppassword.$id.$sppassword;
  
  return $newlygentstring;

}


 function getuseridDecrpt($encpassword)
 {
  $user_id=Yii::app()->db->createCommand()->select('id')->from('users')->where('encpassword=:encpassword', array(':encpassword'=>$encpassword))->queryRow();
  return $user_id['id'];
 }
 
  function ProjectView($project_id)
  {
    $prodetails= existprojectfromdbfunc($project_id);
    $project_name=$prodetails['project_name'];
	$subject= $prodetails['subject'];
    $description=$prodetails['description'];
	$lcount= $prodetails['level_count'];
    $rcount= $prodetails['room_count'];
    
	
	$mailformat="<body><div style='width:960px;display:table;background-color:#f1f1f1;padding:10px;'><div style='display:table;margin-bottom:10px;padding:5px;font-size:20px;'><div style='width:460px;float:left;color:#257189;'><strong>Project Name</strong></div>
<div style='width:60px;float:left;color:#257189;'>:</div><div style='width:230px;float:left;color:#257189;'>$project_name </div></div><div style='color:#f00; background-color:#dedede; margin-bottom:5px;padding:5px;'><strong>Project Details</strong> </div><div style='display:table;margin-bottom:10px;padding:5px;font-size:14px;'><div style='width:460px;float:left;'><strong>Subject</strong></div>
<div style='width:60px;float:left;'>:</div><div style='width:230px;float:left;'>$subject </div></div><div style='display:table;margin-bottom:10px;padding:5px;font-size:14px;'><div style='width:460px;float:left;'><strong>Description</strong></div><div style='width:60px;float:left;'>:</div><div style='width:230px;float:left;'>$description </div></div><div style='display:table;margin-bottom:10px;padding:5px;font-size:14px;'><div style='width:460px;float:left;'><strong>Level Count</strong></div><div style='width:60px;float:left;'>:</div><div style='width:230px;float:left;'>$lcount </div></div><div style='display:table;margin-bottom:10px;padding:5px;font-size:14px;'><div style='width:460px;float:left;'><strong>Room Count</strong></div>
<div style='width:60px;float:left;'>:</div><div style='width:230px;float:left;'>$rcount </div></div></div></body>";
  
   return  $mailformat;
  
  }
   
  function CheckStatus($value) 
  {
    if($value=='1') 
	{
	$newsts=  "Active " ;
	}else {
	$newsts=  "InActive " ;
	}
	
     return $newsts;
  }
   
 function RoomDetailsFunc($id) 
	 {
	   $roomarray= ETSROOMS::model()->find(array('condition'=>"ROOM_ID ='$id'"));
	   return $roomarray;
	 }
	 
 function  Testcheckvalues($MOLD_IND,$BACTERIA_IND,$ALLERGEN_IND,$CHEMICAL_IND,$ASBESTOS_IND,$PARTICULATE_ANALYSIS_IND,$BUILDING_MATERIAL_IND,$RELATIVE_HUMIDITY_IND,$TEMPERATURE_IND,$SAMPLE_STRT_DTTM_IND,$SAMPLE_END_DTTM_IND,$LAB_CODE_IND)
 { 
    if($MOLD_IND=='1') {
	  $MOLD_IND = "Mold".",";
	} else {
	 $MOLD_IND = "";
	}
	print $MOLD_IND;
	if($BACTERIA_IND=='1')
	{
	   $BACTERIA_IND = "Bacteria".",";
	} else {
	 $BACTERIA_IND  = "";
	}
	print $BACTERIA_IND;
	
	if($ALLERGEN_IND=='1')
	{
	   $ALLERGEN_IND = "Allergen".",";
	} else {
	 $ALLERGEN_IND  = "";
	}
	print $ALLERGEN_IND;
	
	if($CHEMICAL_IND=='1')
	{
	   $CHEMICAL_IND = "Chemical".",";
	} else {
	 $CHEMICAL_IND  = "";
	}
	print $CHEMICAL_IND;
	
	if($ASBESTOS_IND=='1')
	{
	   $ASBESTOS_IND = "Asbestos".",";
	} else {
	 $ASBESTOS_IND  = "";
	}
	print $ASBESTOS_IND;
	
	if($PARTICULATE_ANALYSIS_IND=='1')
	{
	   $PARTICULATE_ANALYSIS_IND = "Particulate Analysis".",";
	} else {
	 $PARTICULATE_ANALYSIS_IND  = "";
	}
	print $PARTICULATE_ANALYSIS_IND;
	
	if($BUILDING_MATERIAL_IND=='1')
	{
	   $BUILDING_MATERIAL_IND = "Building Material".",";
	} else {
	 $BUILDING_MATERIAL_IND  = "";
	}
	print $BUILDING_MATERIAL_IND;
	
	if($RELATIVE_HUMIDITY_IND=='1')
	{
	   $RELATIVE_HUMIDITY_IND = "Relative Humidity".",";
	} else {
	 $RELATIVE_HUMIDITY_IND  = "";
	}
	print $RELATIVE_HUMIDITY_IND;
	
	if($TEMPERATURE_IND=='1')
	{
	   $TEMPERATURE_IND = "Temperature".",";
	} else {
	 $TEMPERATURE_IND  = "";
	}
	print $TEMPERATURE_IND;
	
	if($SAMPLE_STRT_DTTM_IND=='1')
	{
	   $SAMPLE_STRT_DTTM_IND = "Sample Start Date/ Time".",";
	} else {
	 $SAMPLE_STRT_DTTM_IND  = "";
	}
	print $SAMPLE_STRT_DTTM_IND;
	
	if($SAMPLE_END_DTTM_IND=='1')
	{
	   $SAMPLE_END_DTTM_IND = "Sample End Date/ Time".",";
	} else {
	 $SAMPLE_END_DTTM_IND  = "";
	}
	print $SAMPLE_END_DTTM_IND;
	
	if($LAB_CODE_IND=='1')
	{
	   $LAB_CODE_IND = "Lab Code";
	} else {
	 $LAB_CODE_IND  = "";
	}
	print $LAB_CODE_IND;
	
 }	 

 function CheckLocations($value){

  return $value;
 
 }


?>
