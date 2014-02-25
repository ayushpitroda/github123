<?php
/* @var $this ETSROOMSController */
/* @var $model ETSROOMS */

$this->breadcrumbs=array(
	'Floor Plan'=>array('admin'),
	$model->ROOM_ID=>array('view','id'=>$model->ROOM_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List ETSROOMS', 'url'=>array('index')),
	array('label'=>'Create ETSROOMS', 'url'=>array('create')),
	array('label'=>'View ETSROOMS', 'url'=>array('view', 'id'=>$model->ROOM_ID)),
	array('label'=>'Manage ETSROOMS', 'url'=>array('admin')),
);
?>
<?php echo $this->renderPartial('_update', array('model'=>$model)); ?>