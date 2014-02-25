<?php
/* @var $this EMAILTMPLController */
/* @var $model EMAILTMPL */

$this->breadcrumbs=array(
	'Emailtmpls'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EMAILTMPL', 'url'=>array('index')),
	array('label'=>'Manage EMAILTMPL', 'url'=>array('admin')),
);
?>

<h1>Create EMAILTMPL</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>