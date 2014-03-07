<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Manage',
);

/*
$this->menu=array(
	array('label'=>'List Products', 'url'=>array('index')),
	array('label'=>'Create Products', 'url'=>array('create')),
);
*/
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#products-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="center">
      <div class="center_titls">
        <h2><span><img src="images/menuicon/ourprocess_icon_of_titls.jpg" alt="ourprocess_icon_of_titls" /></span>Our Process</h2>
      </div>
<div class="admin-menu">
<ul class="splitter1">
        <li>
          <ul>
            <li class="segment-0 selected-0"><a href="<?php echo Yii::app()->createUrl('products/create'); ?>" ><span>Add Products</span></a></li>
            <li class="segment-1"><a href="<?php echo Yii::app()->createUrl('products/index'); ?>" ><span>List Products</span></a></li>
          </ul>
          <div class="clear"></div>
        </li>
      </ul>
</div>
<h1>Manage Products</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'products-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'type',
		'detail',
		'image_path',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>