<?php
/* @var $this ETSROOMSController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Etsrooms',
);

$this->menu=array(
	array('label'=>'Create ETSROOMS', 'url'=>array('create')),
	array('label'=>'Manage ETSROOMS', 'url'=>array('admin')),
);
?>

<h1>Etsrooms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
