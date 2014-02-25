<?php
/* @var $this QuestionEmailsController */
/* @var $model QuestionEmails */

$this->breadcrumbs=array(
	'Question Emails'=>array('index'),
	$model->auto_id,
);

$this->menu=array(
	array('label'=>'List QuestionEmails', 'url'=>array('index')),
	array('label'=>'Create QuestionEmails', 'url'=>array('create')),
	array('label'=>'Update QuestionEmails', 'url'=>array('update', 'id'=>$model->auto_id)),
	array('label'=>'Delete QuestionEmails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->auto_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QuestionEmails', 'url'=>array('admin')),
);
?>

<h1>View QuestionEmails #<?php echo $model->auto_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'auto_id',
		'project_id',
		'user_id',
		'email',
		'date_added',
	),
)); ?>
