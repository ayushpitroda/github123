<?php
/* @var $this COMMENTSController */
/* @var $model COMMENTS */

$this->breadcrumbs=array(
	'Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List COMMENTS', 'url'=>array('index')),
	array('label'=>'Manage COMMENTS', 'url'=>array('admin')),
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>