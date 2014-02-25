<?php
/* @var $this EMAILTMPLController */
/* @var $model EMAILTMPL */

$this->breadcrumbs=array(
	'Emailtmpls'=>array('index'),
	$model->EMAIL_ID,
);

$this->menu=array(
	array('label'=>'List EMAILTMPL', 'url'=>array('index')),
	array('label'=>'Create EMAILTMPL', 'url'=>array('create')),
	array('label'=>'Update EMAILTMPL', 'url'=>array('update', 'id'=>$model->EMAIL_ID)),
	array('label'=>'Delete EMAILTMPL', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->EMAIL_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EMAILTMPL', 'url'=>array('admin')),
);
?>

<h1>View EMAILTMPL #<?php echo $model->EMAIL_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'BUSINESS_UNIT',
		'EMAIL_ID',
		'EMAIL_NAME',
		'FROM_EMAIL_DEF',
		'SUBJECT_DEF',
		'EMAIL_BODY',
		'CREATE_DTTM',
		'LASTUPDDTTM',
		'LASTUPDUSER',
		'STATUS',
	),
)); ?>
