<?php
/* @var $this COMMENTLOCController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Commentlocs',
);

$this->menu=array(
	array('label'=>'Create COMMENTLOC', 'url'=>array('create')),
	array('label'=>'Manage COMMENTLOC', 'url'=>array('admin')),
);
?>

<h1>Commentlocs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
