<?php
/* @var $this RolesController */
/* @var $model Roles */
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
	'Roles'=>array('index'),
	$model->role_id,
);

?>
<div align="right">

</div>
<div align="right">
    <?php echo CHtml::htmlButton('<i class="icon-plus"></i>Create Role', array('submit' => array('roles/create'),'class' => 'btn btn-medium pull-right')); ?>
	<?php echo CHtml::htmlButton('<i class="icon-edit"></i>Update Roles', array('submit' => array('roles/update', 'id'=>$model->role_id),'class' => 'btn btn-medium pull-right')); ?>
	<?php echo CHtml::htmlButton('<i class="icon-list"></i>Manage Roles', array('submit' => array('roles/admin'),'class' => 'btn btn-medium pull-right')); ?>
</div>

<h1>View Roles #<?php echo $model->role_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'role_id',
		'role_name',
		'role_description',
		'user_id',
		'date_added',
	),
)); ?>
