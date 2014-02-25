<?php
/* @var $this COMMENTSController */
/* @var $model COMMENTS */

$this->breadcrumbs=array(
	'Comments'=>array('index'),
	$model->COMMENT_ID=>array('view','id'=>$model->COMMENT_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List COMMENTS', 'url'=>array('index')),
	array('label'=>'Create COMMENTS', 'url'=>array('create')),
	array('label'=>'View COMMENTS', 'url'=>array('view', 'id'=>$model->COMMENT_ID)),
	array('label'=>'Manage COMMENTS', 'url'=>array('admin')),
);
?>
<?php echo $this->renderPartial('_update', array('model'=>$model)); ?>