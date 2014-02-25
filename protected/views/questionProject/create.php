<?php
/* @var $this QuestionProjectController */
/* @var $model QuestionProject */

$this->breadcrumbs=array(
	'Question Projects'=>array('index'),
	'Create',
);


?>
<div align="right">

	<?php echo CHtml::htmlButton('<i class="icon-list"></i>Manage Projects', array('submit' => array('admin'),'class' => 'btn btn-medium pull-right')); ?>
</div>


<h1>Create Project</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>