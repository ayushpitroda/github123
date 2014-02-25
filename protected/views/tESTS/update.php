<?php
/* @var $this TESTSController */
/* @var $model TESTS */

$this->breadcrumbs=array(
	'Tests'=>array('index'),
	$model->TEST_ID=>array('view','id'=>$model->TEST_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List TESTS', 'url'=>array('index')),
	array('label'=>'Create TESTS', 'url'=>array('create')),
	array('label'=>'View TESTS', 'url'=>array('view', 'id'=>$model->TEST_ID)),
	array('label'=>'Manage TESTS', 'url'=>array('admin')),
);
?>

<h1>Update TESTS <?php echo $model->TEST_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>