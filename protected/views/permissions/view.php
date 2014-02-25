<?php
/* @var $this PermissionsController */
/* @var $model Permissions */
if(checkrightsfunc(4))
{
}
else
{ ?>
<div align="center"> <span style="color:#DD0000; font-size:18px;">You Are Not authorised To access This Page</span></div>
<meta http-equiv="refresh" content="1;url='../../index.php'" />

<? exit();

}
$this->breadcrumbs=array(
	'Permissions'=>array('index'),
	$model->right_id,
);

?>

<div align="right">
   
	<?php echo CHtml::htmlButton('<i class="icon-edit"></i> Update Permissions', array('submit' => array('permissions/update', 'id'=>$model->right_id),'class' => 'btn btn-medium pull-right')); ?>
	<?php echo CHtml::htmlButton('<i class="icon-list"></i> Manage Permissions', array('submit' => array('permissions/admin'),'class' => 'btn btn-medium pull-right')); ?>
</div>

<h3>View Permissions #<?php echo $model->right_id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'right_id',
		'right_name',
		'right_description',
	),
)); ?>
