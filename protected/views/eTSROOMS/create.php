<?php
/* @var $this ETSROOMSController */
/* @var $model ETSROOMS */

$this->breadcrumbs=array(
	'Etsrooms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ETSROOMS', 'url'=>array('index')),
	array('label'=>'Manage ETSROOMS', 'url'=>array('admin')),
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>