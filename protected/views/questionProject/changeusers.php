<?php
/* @var $this UsersController */
/* @var $model Users */

$project_id=$_GET['project_id'];

if(!userprojectaccess($project_id))
{
	if(checkrightsfunc(1))
	{
	}
	else
	{ ?>
	<div align="center" <span style="color:#DD0000; font-size:18px;">You Are Not authorised To access This Page</span></div>
	<meta http-equiv="refresh" content="1;url='../../index.php'" />
	
	<? exit();

}

?>
<div><font color="#FF0000" size="+5">You Don't have a Permissons to Access this Page</font></div>
<meta http-equiv="refresh" content="2;url='../../index.php'" />
<?
exit();
}


$usersarray = projectdatafunc($project_id);
$existusers= $usersarray['invite_user_id'];

if($existusers=='')
{ ?>
    <div style="color:#993300; text-align:center;"> Sorry No Users in this Project</div>
  
<?   $this->redirect(array('admin'));
 } else 
{
    $nexistusers=trim($existusers,",");
    $usersarray= projectusersnamefunc($nexistusers);
?>
<div>
 <legend>Remove Users :: <font color="#ed5800"><?php  echo projectnamefunc($project_id);?></font><span style="margin-left:400px;"><?php echo CHtml::link('Back',Yii::app()->request->urlReferrer);?></span></legend>
</div>

<form name="changeusers" method="post">
    <fieldset>
<font color="#FF0000">Note</font>:  <strong>Please Uncheck for the Remove  Users</strong>
<br />
 <? 	
foreach($usersarray as $rkey => $rvalue)
{ 
if($rvalue['fname']=='')
{
$disname=$rvalue['username'];
}else {
$disname=$rvalue['fname'];
}

?>
<div id="">
<input type="checkbox" name="user_id[]" id="<?php echo $rvalue['id'];?>" style="margin-right:10px;"  value="<?php echo $rvalue['id'];?>" checked="checked"  /><?php echo $disname;?>
</div>
<?  }  ?><br />

	<input type="hidden" name="project_id" value="<? echo $project_id;?>" />
    <input type="submit" name="changeusers" value="Remove Users" class="btn btn-primary" />
    <input type="reset" value="Reset"  class="btn"/>
    </fieldset>
</form> 
<? } ?>