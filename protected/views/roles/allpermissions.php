<?php
/* @var $this UsersController */
/* @var $model Users */
if(checkrightsfunc(4))
{
}
else
{ ?>
<div align="center"> <span style="color:#DD0000; font-size:18px;">You Are Not authorised To access This Page</span></div>
<meta http-equiv="refresh" content="1;url='../../index.php'" />

<? exit();

}

$role_id = $_GET['role_id'];
$rightname = Permissions::model()->findAll();
$rolecount = countofrolesinrightstablefunc($role_id);

if($rolecount>0)
{
    $rightsarray=rightidsarrayfunc($role_id);
    $rightstotalarray="";
	foreach($rightsarray as $key=>$val)
	{
      	$rightss=$val['right_id'];
		$rightstotalarray[]=$rightss;
	}
}
else {
		$rightstotalarray[]="";
}
?>

<div class="container">
<div>
 <legend>
  <div class="row">
		 <div class="spna12">
			 <div class="span6">
				   <h3>Manage Permissions To  <font color="#666666"><? echo rolenamefetchfunc($role_id);?></font></h3>
			 </div>
			 <div class="span6">  
				 <h3> <?php echo CHtml::link('Back',Yii::app()->request->urlReferrer);?></h3>
			 </div>
         </div>
 </div>		  		 
 </legend>
</div>
    <form name="permissions" method="post">
    <fieldset>

 <? 	
foreach($rightname as $rkey => $rvalue)
{ 
$rdesciption = $rvalue['right_description'];	
$rname = $rvalue['right_name'];	

?>
<div id="">
<input type="checkbox" name="right_name[]" id="right_name<?php echo $rvalue['right_id'];?>" style="margin-right:10px;"  value="<?php echo $rvalue['right_id'];?>" <? if(in_array($rvalue['right_id'],$rightstotalarray)) {  ?> checked="checked" <? } ?> title="<?php echo $rdesciption;?>" /><span title="<?php echo $rdesciption;?>"><?php echo $rname;?></span>
</div>
<?  }  ?><br />

	<input type="hidden" name="role_id" value="<? echo $role_id;?>" />
    <input type="submit" name="permissions" value="Submit" class="btn btn-primary" />
    <input type="reset" value="Reset"  class="btn"/>
    </fieldset>
</form> 
</div>
