<?php
/* @var $this PagesController */
/* @var $model Pages */

$this->breadcrumbs=array(
	'Pages'=>array('index'),
	$model->auto_id,
);

?>

<div align="right">
<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
    'buttons'=>array(
        array('label'=>'Manage Pages Info','icon'=>'icon-list', 'url'=>Yii::app()->createUrl('pages/admin')),
		 array('label'=>'Update Page Info','icon'=>'icon-edit', 'url'=>Yii::app()->createUrl('pages/update', array('id'=>$model->auto_id))),
         ),
)); ?>
</div>


<h1>View Pages #<?php echo $model->auto_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'auto_id',
		'content',
		
	),
)); ?>
