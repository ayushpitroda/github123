<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

/*$this->menu=array(
	array('label'=>'List Products', 'url'=>array('index')),
	array('label'=>'Create Products', 'url'=>array('create')),
	array('label'=>'View Products', 'url'=>array('view', 'id'=>$model->id)),
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
            <li class="segment-1"><a href="<?php echo Yii::app()->createUrl('products/admin'); ?>" ><span>Manage Products</span></a></li>
          </ul>
          <div class="clear"></div>
        </li>
      </ul>
</div>
<h1>Update Products <?php echo $model->id; ?></h1>
   <div class="login-form">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
   </div>
</div>