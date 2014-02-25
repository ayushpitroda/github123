<?php
/* @var $this COMMENTSController */
/* @var $model COMMENTS */

$this->breadcrumbs=array(
	'Comments'=>array('index'),
	$model->COMMENT_ID,
);

$this->menu=array(
	array('label'=>'List COMMENTS', 'url'=>array('index')),
	array('label'=>'Create COMMENTS', 'url'=>array('create')),
	array('label'=>'Update COMMENTS', 'url'=>array('update', 'id'=>$model->COMMENT_ID)),
	array('label'=>'Delete COMMENTS', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->COMMENT_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage COMMENTS', 'url'=>array('admin')),
);
?>

<h1>View COMMENTS #<?php echo $model->COMMENT_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'COMMENT_ID',
		'COMMENT_DESCR',
		'LOCATION_IDS',
		'CREATE_DTTM',
		'LASTUPDDTTM',
		'LASTUPDUSER',
		'STATUS',
	),
)); ?>
