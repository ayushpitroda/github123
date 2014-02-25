<?php
/* @var $this ReportTemplateController */
/* @var $model ReportTemplate */

$this->breadcrumbs=array(
	'Report Templates'=>array('index'),
	$model->REPORT_ID,
);

$this->menu=array(
	array('label'=>'List ReportTemplate', 'url'=>array('index')),
	array('label'=>'Create ReportTemplate', 'url'=>array('create')),
	array('label'=>'Update ReportTemplate', 'url'=>array('update', 'id'=>$model->REPORT_ID)),
	array('label'=>'Delete ReportTemplate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->REPORT_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ReportTemplate', 'url'=>array('admin')),
);
?>

<h1>View ReportTemplate #<?php echo $model->REPORT_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'BUSINESS_UNIT',
		'REPORT_ID',
		'REPORT_NAME',
		'REPORT_BODY',
		'CREATE_DTTM',
		'LASTUPDDTTM',
		'LASTUPDUSER',
		'STATUS',
	),
)); ?>
