<?php
/* @var $this BusinessunitController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Business Units',
);

$this->menu=array(
	array('label'=>'Create BusinessUnit', 'url'=>array('create')),
	array('label'=>'Manage BusinessUnit', 'url'=>array('admin')),
);
?>

<h1>Business Units</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
