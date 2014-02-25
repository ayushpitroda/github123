<?php
/* @var $this ReportTemplateController */
/* @var $model ReportTemplate */

$this->breadcrumbs=array(
	'Report Templates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ReportTemplate', 'url'=>array('index')),
	array('label'=>'Manage ReportTemplate', 'url'=>array('admin')),
);
?>

<h1>Create ReportTemplate</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>