<?php
/* @var $this QuestionProjectController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Question Projects',
);

$this->menu=array(
	array('label'=>'Create QuestionProject', 'url'=>array('create')),
	array('label'=>'Manage QuestionProject', 'url'=>array('admin')),
);
?>

<h1>Question Projects</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
