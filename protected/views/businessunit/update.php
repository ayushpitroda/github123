<?php
/* @var $this BusinessunitController */
/* @var $model BusinessUnit */

$this->breadcrumbs=array(
	'Business Units'=>array('index'),
	$model->BUSINESS_UNIT=>array('view','id'=>$model->BUSINESS_UNIT),
	'Update',
);

$this->menu=array(
	array('label'=>'List BusinessUnit', 'url'=>array('index')),
	array('label'=>'Create BusinessUnit', 'url'=>array('create')),
	array('label'=>'View BusinessUnit', 'url'=>array('view', 'id'=>$model->BUSINESS_UNIT)),
	array('label'=>'Manage BusinessUnit', 'url'=>array('admin')),
);
?>

<h1>Update Business Unit <?php //echo $model->BUSINESS_UNIT; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>