<?php
/* @var $this BusinessunitController */
/* @var $model BusinessUnit */

$this->breadcrumbs=array(
	'Business Units'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BusinessUnit', 'url'=>array('index')),
	array('label'=>'Manage BusinessUnit', 'url'=>array('admin')),
);
?>

<h1>Create BusinessUnit</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>