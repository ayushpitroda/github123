<?php
/* @var $this PermissionsController */
/* @var $model Permissions */
if(checkrightsfunc(4))
{
}
else
{ ?>
<div align="center"> <span style="color:#DD0000; font-size:18px;">You Are Not authorised To access This Page</span></div>
<meta http-equiv="refresh" content="1;url='../../../index.php'" />

<? exit();

}

$this->breadcrumbs=array(
	'Permissions'=>array('index'),
	$model->right_id=>array('view','id'=>$model->right_id),
	'Update',
);

?>
<div align="right">
	<?php echo CHtml::htmlButton('<i class="icon-list"></i> Manage Permissions', array('submit' => array('permissions/admin'),'class' => 'btn btn-medium pull-right')); ?>
</div>


<h3>Update Permissions # <font color="#ed5800"><?php echo $model->right_id; ?></font> </h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>