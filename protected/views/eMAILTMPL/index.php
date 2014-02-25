<?php
/* @var $this EMAILTMPLController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Emailtmpls',
);

$this->menu=array(
	array('label'=>'Create EMAILTMPL', 'url'=>array('create')),
	array('label'=>'Manage EMAILTMPL', 'url'=>array('admin')),
);
?>

<h1>Emailtmpls</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
