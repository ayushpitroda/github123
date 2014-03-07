<?php
/* @var $this ProductsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Products',
);

//$this->menu=array(
	//array('label'=>'Create Products', 'url'=>array('create')),
	//array('label'=>'Manage Products', 'url'=>array('admin')),
//);
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
            <li class="segment-1"><a href="<?php echo Yii::app()->createUrl('products/admin'); ?>" ><span>Manage Products</span></a></li>
            <li class="segment-1"><a href="<?php echo Yii::app()->createUrl('site/works'); ?>" target="_blank"><span>View Site</span></a></li>
          </ul>
          <div class="clear"></div>
        </li>
      </ul>
</div>
<?php ?>
     <?php
    //print_r($products);
    foreach($products as $product)
    {
        
        echo CHtml::image(Yii::app()->baseUrl . '/products/'.$product->image_path,'alt',array('width'=>150,'height'=>100));

        
    }
    
    
?>
      
      
        </div>
    