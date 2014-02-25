<?php
/* @var $this ETSROOMSController */
/* @var $model ETSROOMS */

$this->breadcrumbs=array(
	'Floor Plan'=>array('admin'),
	$model->ROOM_ID,
);

$this->menu=array(
	array('label'=>'List ETSROOMS', 'url'=>array('index')),
	array('label'=>'Create ETSROOMS', 'url'=>array('create')),
	array('label'=>'Update ETSROOMS', 'url'=>array('update', 'id'=>$model->ROOM_ID)),
	array('label'=>'Delete ETSROOMS', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ROOM_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ETSROOMS', 'url'=>array('admin')),
);
?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ROOM_ID',
		'ROOM_DESCR'
	),
)); ?>
