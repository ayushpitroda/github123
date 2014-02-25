<?php
/* @var $this QuestionEmailsController */
/* @var $model QuestionEmails */

$this->breadcrumbs=array(
	'Question Emails'=>array('index'),
	$model->auto_id=>array('view','id'=>$model->auto_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List QuestionEmails', 'url'=>array('index')),
	array('label'=>'Create QuestionEmails', 'url'=>array('create')),
	array('label'=>'View QuestionEmails', 'url'=>array('view', 'id'=>$model->auto_id)),
	array('label'=>'Manage QuestionEmails', 'url'=>array('admin')),
);
?>

<h1>Update QuestionEmails <?php echo $model->auto_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>