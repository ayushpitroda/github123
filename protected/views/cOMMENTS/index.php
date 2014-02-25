<?php
/* @var $this COMMENTSController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Comments',
);

$this->menu=array(
	array('label'=>'Create COMMENTS', 'url'=>array('create')),
	array('label'=>'Manage COMMENTS', 'url'=>array('admin')),
);
?>

<h1>Comments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
