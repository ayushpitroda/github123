<?php
/* @var $this GENERALController */
/* @var $model GENERAL */

$this->breadcrumbs=array(
	'Generals'=>array('index'),
	$model->GENERAL_ID,
);

$this->menu=array(
	array('label'=>'List GENERAL', 'url'=>array('index')),
	array('label'=>'Create GENERAL', 'url'=>array('create')),
	array('label'=>'Update GENERAL', 'url'=>array('update', 'id'=>$model->GENERAL_ID)),
	array('label'=>'Delete GENERAL', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->GENERAL_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GENERAL', 'url'=>array('admin')),
);
?>

<h1>View GENERAL #<?php echo $model->GENERAL_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'GENERAL_ID',
		'COMPANY',
		'LOGO',
		'DESCRIPTION',
		'ADDRESS1',
		'ADDRESS2',
		'CITY',
		'STATE',
		'ZIP',
		'EMAIL',
		'PHONE',
		'TIMINGS',
	),
)); ?>
