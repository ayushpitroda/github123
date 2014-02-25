<?php
/* @var $this COMMENTLOCController */
/* @var $model COMMENTLOC */

$this->breadcrumbs=array(
	'Commentlocs'=>array('index'),
	$model->LOCATION_ID=>array('view','id'=>$model->LOCATION_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List COMMENTLOC', 'url'=>array('index')),
	array('label'=>'Create COMMENTLOC', 'url'=>array('create')),
	array('label'=>'View COMMENTLOC', 'url'=>array('view', 'id'=>$model->LOCATION_ID)),
	array('label'=>'Manage COMMENTLOC', 'url'=>array('admin')),
);
?>

<h1>Update COMMENTLOC <?php echo $model->LOCATION_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>