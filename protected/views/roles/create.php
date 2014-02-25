<?php
/* @var $this RolesController */
/* @var $model Roles */
if(checkrightsfunc(4))
{
}
else
{ ?>
<div align="center" <span style="color:#DD0000; font-size:18px;">You Are Not authorised To access This Page</span></div>
<meta http-equiv="refresh" content="1;url='../../index.php'" />

<? exit();

}

$this->breadcrumbs=array(
	'Roles'=>array('index'),
	'Create',
);

?>
<div align="right">
<?php echo CHtml::htmlButton('<i class="icon-list"></i> Manage Roles', array('submit' => array('roles/admin'),'class' => 'btn btn-medium pull-right')); ?>
</div>
<h1>Create Roles</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>