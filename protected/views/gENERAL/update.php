<?php
/* @var $this GENERALController */
/* @var $model GENERAL */

$this->breadcrumbs=array(
	'General'=>array('update','id'=>$model->GENERAL_ID),
	//$model->GENERAL_ID=>,
	'Update',
);

$this->menu=array(
	array('label'=>'List GENERAL', 'url'=>array('index')),
	array('label'=>'Create GENERAL', 'url'=>array('create')),
	array('label'=>'View GENERAL', 'url'=>array('view', 'id'=>$model->GENERAL_ID)),
	array('label'=>'Manage GENERAL', 'url'=>array('admin')),
);
?>

<h1>GENERAL <?php //echo $model->GENERAL_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>