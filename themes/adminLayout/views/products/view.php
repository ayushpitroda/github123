<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->name,
);

/*$this->menu=array(
	array('label'=>'List Products', 'url'=>array('index')),
	array('label'=>'Create Products', 'url'=>array('create')),
	array('label'=>'Update Products', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Products', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Products', 'url'=>array('admin')),
);*/
?>
<div class="center">
      <div class="center_titls">
        <h2><span><img src="images/menuicon/work_icon_of_titls.jpg" alt="work_icon_of_titls" /></span>Products</h2>

</div>
<div class="admin-menu">
<ul class="splitter1">
        <li>
          <ul>
            <li class="segment-0 selected-0"><a href="<?php echo Yii::app()->createUrl('products/create'); ?>" ><span>Add Products</span></a></li>
            <li class="segment-1"><a href="<?php echo Yii::app()->createUrl('products/index'); ?>" ><span>List Products</span></a></li>
            <li class="segment-1"><a href="<?php echo Yii::app()->createUrl('products/update',array('id'=>$model->id)); ?>" ><span>Update Products</span></a></li>
            <li class="segment-1"><a href="<?php echo Yii::app()->createUrl('products/delete'); ?>" ><span>Delete Products</span></a></li>
            <li class="segment-1"><a href="<?php echo Yii::app()->createUrl('products/admin'); ?>" ><span>Manage Products</span></a></li>

          </ul>
          <div class="clear"></div>
        </li>
      </ul>
</div>
<h1>View Products #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'type',
		'detail',
		'image_path',
	),
)); ?>
<?php echo CHtml::image(Yii::app()->baseUrl . '/products/'.$model->image_path,'alt',array('width'=>450,'height'=>300)) ?>
</div>
