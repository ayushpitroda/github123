<?php
/* @var $this COMMENTLOCController */
/* @var $model COMMENTLOC */

$this->breadcrumbs=array(
	'Commentlocs'=>array('index'),
	$model->LOCATION_ID,
);

$this->menu=array(
	array('label'=>'List COMMENTLOC', 'url'=>array('index')),
	array('label'=>'Create COMMENTLOC', 'url'=>array('create')),
	array('label'=>'Update COMMENTLOC', 'url'=>array('update', 'id'=>$model->LOCATION_ID)),
	array('label'=>'Delete COMMENTLOC', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->LOCATION_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage COMMENTLOC', 'url'=>array('admin')),
);
?>

<h1>View COMMENTLOC #<?php echo $model->LOCATION_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'LOCATION_ID',
		'LOCATION_DESCR',
		'CREATE_DTTM',
		'LASTUPDDTTM',
		'LASTUPDUSER',
		'STATUS',
	),
)); ?>
