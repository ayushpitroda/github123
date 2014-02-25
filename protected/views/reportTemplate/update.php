<?php
/* @var $this ReportTemplateController */
/* @var $model ReportTemplate */

$this->breadcrumbs=array(
	'Report Templates'=>array('index'),
	$model->REPORT_ID=>array('view','id'=>$model->REPORT_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReportTemplate', 'url'=>array('index')),
	array('label'=>'Create ReportTemplate', 'url'=>array('create')),
	array('label'=>'View ReportTemplate', 'url'=>array('view', 'id'=>$model->REPORT_ID)),
	array('label'=>'Manage ReportTemplate', 'url'=>array('admin')),
);
?>

<h1>Report <?php //echo $model->REPORT_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>