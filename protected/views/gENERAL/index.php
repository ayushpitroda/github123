<?php
/* @var $this GENERALController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Generals',
);

$this->menu=array(
	array('label'=>'Create GENERAL', 'url'=>array('create')),
	array('label'=>'Manage GENERAL', 'url'=>array('admin')),
);
?>

<h1>Generals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
