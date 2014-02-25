<?
    $getuserid=$_GET['id'];
	$userdbsarray=userdetailsfetchfunc($getuserid);
	$fname=$userdbsarray['fname'];
	$lname=$userdbsarray['lname'];
	//$rolesfuserdb[]=trim($userdbsarray['role'],",");
	$roles=$userdbsarray['role'];
	$rolsearray=array();
	if($roles!='')
	{ 
	$rolsearray=explode(',',$roles);
	}else {
	$rolsearray="";
	}

	$rolename = Roles::model()->findAll();

	
?>

<div>
 <legend>
     <h4>Modify Roles  of  <font color="#FF0000"><a href="../../users/<? echo  $getuserid;?>"><? echo $fname;?><? echo $lname;?></a></font><span style="margin-left:700px;"><?php echo CHtml::link('Back',Yii::app()->request->urlReferrer);?></span></h4>
 </legend>
</div>    

<form name="allroles" method="post">
<fieldset>
 <br />
	 <? 	
	foreach($rolename as $rkey => $rvalue)
	{ 
	$roleid=$rvalue['role_id'];
	$rname = $rvalue['role_name'];
    $role_name='<a href="../../roles/assignpermissions?role_id='.$roleid.'"'. ">".$rname."</a>";					 
		
	?>
	<div id="">
	     <input type="checkbox" name="role_name[]" id="rolename<?php echo $rvalue['role_id'];?>" style="margin-right:10px;"  value="<?php echo $rvalue['role_id'];?>" <? if(in_array($roleid,$rolsearray)) {  ?> checked="checked" <? } ?> /><?php echo $role_name;?>
	</div>
<?  }  ?>
<br />

	<input type="hidden" name="user_id" value="<? echo $getuserid;?>" />
    <input type="submit" name="rolestousers" value="Submit" class="btn btn-primary" />
    <input type="reset" value="Reset"  class="btn"/>
</fieldset>
</form>
  
  