<?php
/* @var $this QuestionEmailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Question Emails',
);

$this->menu=array(
	array('label'=>'Create QuestionEmails', 'url'=>array('create')),
	array('label'=>'Manage QuestionEmails', 'url'=>array('admin')),
);
?>

<h1>Question Emails</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
