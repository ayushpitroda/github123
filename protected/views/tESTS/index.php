<?php
/* @var $this TESTSController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tests',
);

$this->menu=array(
	array('label'=>'Create TESTS', 'url'=>array('create')),
	array('label'=>'Manage TESTS', 'url'=>array('admin')),
);
?>

<h1>Tests</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
