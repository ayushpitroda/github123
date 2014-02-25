<?php
/* @var $this PagesController */
/* @var $model Pages */

$this->breadcrumbs=array(
	'Pages'=>array('index'),
	$model->auto_id=>array('view','id'=>$model->auto_id),
	'Update',
);


?>
<div align="right">
<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
    'buttons'=>array(
        array('label'=>'Manage Pages Info','icon'=>'icon-list', 'url'=>Yii::app()->createUrl('pages/admin')),
		 array('label'=>'View Page Info','icon'=>'icon-eye-open', 'url'=>Yii::app()->createUrl('pages/view', array('id'=>$model->auto_id))),
         ),
)); ?>
</div>

<h1>Update Pages <?php echo $model->auto_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>