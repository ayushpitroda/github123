<?php
/* @var $this UsersController */
/* @var $model Users */
if(!userprofileaccess($model->id))
{
?>
<div><font color="#FF0000" size="+5">You Don't have a Permissons to Access this Page</font></div>
<meta http-equiv="refresh" content="2;url='../../../index.php'" />
<?
exit();
}
?>
<? 
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
?>

<div align="right">
		<?php echo CHtml::htmlButton('<i class="icon-edit"></i> Update', array('submit' => array('users/persupdate', 'id'=>$model->id),'class' => 'btn btn-medium pull-right')); ?>
		<?php echo CHtml::htmlButton('<i class="icon-eye-open"></i>My Profile', array('submit' => array('users/profileview', 'id'=>$model->id),'class' => 'btn btn-medium pull-right')); ?>
</div>
</div>
<?php echo $this->renderPartial('_changepassword', array('model'=>$model)); ?>