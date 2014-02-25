<?
// Delete Query
   QRolesRights::model()->deleteAll("role_id='$role_id'");	    
// Count Query 
   $count = QRolesRights::Model()->count("role_id='$role_id'");
 
// model save : 

    $rolesandrights =new QRolesRights;
	$rolesandrights->right_id=$val;
	$rolesandrights->role_id=$role_id;
	$rolesandrights->user_id =Yii::app()->user->id;
	$rolesandrights->date_added =$nowdate;
	$rolesandrights->save();	
 
     
?>