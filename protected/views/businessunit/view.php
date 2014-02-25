<?php
/* @var $this BusinessunitController */
/* @var $model BusinessUnit */

$this->breadcrumbs=array(
	'Business Units'=>array('index'),
	$model->BUSINESS_UNIT,
);

$this->menu=array(
	array('label'=>'List BusinessUnit', 'url'=>array('index')),
	array('label'=>'Create BusinessUnit', 'url'=>array('create')),
	array('label'=>'Update BusinessUnit', 'url'=>array('update', 'id'=>$model->BUSINESS_UNIT)),
	array('label'=>'Delete BusinessUnit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->BUSINESS_UNIT),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BusinessUnit', 'url'=>array('admin')),
);
?>

<h1>View BusinessUnit #<?php echo $model->BUSINESS_UNIT; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'BUSINESS_UNIT_ID',
		'BU_DESCR',
		'LOGO',
		'EMAIL',
		'PHONE',
		'TIMINGS',
		'ADDRESS1',
		'ADDRESS2',
		'CITY',
		'STATE',
		'ZIP',
	),
)); ?>
