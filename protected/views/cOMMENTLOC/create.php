<?php
/* @var $this COMMENTLOCController */
/* @var $model COMMENTLOC */

$this->breadcrumbs=array(
	'Commentlocs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List COMMENTLOC', 'url'=>array('index')),
	array('label'=>'Manage COMMENTLOC', 'url'=>array('admin')),
);
?>

<h1>Create COMMENTLOC</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>