<?php
/* @var $this GENERALController */
/* @var $model GENERAL */

$this->breadcrumbs=array(
	'Generals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GENERAL', 'url'=>array('index')),
	array('label'=>'Manage GENERAL', 'url'=>array('admin')),
);
?>

<h1>Create GENERAL</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>