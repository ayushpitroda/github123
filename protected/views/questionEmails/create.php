<?php
/* @var $this QuestionEmailsController */
/* @var $model QuestionEmails */

$this->breadcrumbs=array(
	'Question Emails'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List QuestionEmails', 'url'=>array('index')),
	array('label'=>'Manage QuestionEmails', 'url'=>array('admin')),
);
?>

<h1>Create QuestionEmails</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>