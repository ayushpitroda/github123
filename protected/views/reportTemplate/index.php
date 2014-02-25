<?php
/* @var $this ReportTemplateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Report Templates',
);

$this->menu=array(
	array('label'=>'Create ReportTemplate', 'url'=>array('create')),
	array('label'=>'Manage ReportTemplate', 'url'=>array('admin')),
);
?>

<h1>Report Templates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
