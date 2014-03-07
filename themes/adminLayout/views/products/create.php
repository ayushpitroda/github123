<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Create',
);

/*$this->menu=array(
	array('label'=>'List Products', 'url'=>array('index')),
	array('label'=>'Manage Products', 'url'=>array('admin')),
);*/
?>
<div class="center">
      <div class="center_titls">
        <h2><span><img src="images/menuicon/ourprocess_icon_of_titls.jpg" alt="ourprocess_icon_of_titls" /></span>Add Products</h2>
      </div>
<div class="admin-menu">
<ul class="splitter1">
        <li>
          <ul>
            <li class="segment-0 selected-0"><a href="<?php echo Yii::app()->createUrl('products/index'); ?>" ><span>List Products</span></a></li>
            <li class="segment-1"><a href="<?php echo Yii::app()->createUrl('products/admin'); ?>" ><span>Manage Products</span></a></li>
          </ul>
          <div class="clear"></div>
        </li>
      </ul>
</div>
    <div class="login-form">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
        </div>
</div>
