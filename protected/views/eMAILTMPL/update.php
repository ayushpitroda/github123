<?php
/* @var $this EMAILTMPLController */
/* @var $model EMAILTMPL */

$this->breadcrumbs=array(
	'Emailtmpls'=>array('index'),
	$model->EMAIL_ID=>array('view','id'=>$model->EMAIL_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List EMAILTMPL', 'url'=>array('index')),
	array('label'=>'Create EMAILTMPL', 'url'=>array('create')),
	array('label'=>'View EMAILTMPL', 'url'=>array('view', 'id'=>$model->EMAIL_ID)),
	array('label'=>'Manage EMAILTMPL', 'url'=>array('admin')),
);
?>

<h1>Update EMAILTMPL <?php echo $model->EMAIL_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>