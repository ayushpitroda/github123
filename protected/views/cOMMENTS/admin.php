<strong>Comments Configuration</strong>
<div align="right">
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Add New Comment',
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'small', 
	'url' =>' create' 
	//'url' =>' index.php?r=TESTS/create' 
	// null, 'large', 'small' or 'mini'
)); ?>
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
)); ?>
No.of Rows : 
<?
 $pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']); 
echo CHtml::dropDownList('pageSize',$pageSize,array(10=>10,20=>20,50=>50,100=>100,'all'=>'Show All'),array('onchange'=>"$.fn.yiiGridView.update('address-grid',{ data:{pageSize: $(this).val() }})",'50'=>'-- Select Page Range --','style'=>'width:100px;'));
?> 

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'address-grid',
	 'type'=>'striped bordered condensed',
	 
	'dataProvider'=>$model->search(),	
	'filter'=>$model,
	'emptyText'=>'No Records Found..',
	'afterAjaxUpdate'=>'function(){ tipFunction(); }',
	'columns'=>array(
		'COMMENT_ID' => array('htmlOptions'=>array('width'=>'100px'),'type' =>'raw', 'name'=> "COMMENT_ID"),
		'COMMENT_DESCR' => array('htmlOptions'=>array('width'=>'300px'),'type' =>'raw', 'name'=> "COMMENT_DESCR"),
		'LOCATION_IDS' => array('htmlOptions'=>array('width'=>'300px'),'type' =>'raw', 'name'=> "LOCATION_IDS",'value' => 'CheckLocations($data->LOCATION_IDS)' , 'filter'=>'' ),
		'STATUS' => array('htmlOptions'=>array('width'=>'300px'),'type' =>'raw', 'name'=> "STATUS", 
		'value' => 'CheckStatus($data->STATUS)' , 'filter'=>''),
		
	 array(
            'class'=>'CButtonColumn',
			 'header' =>'Action',
             'template'=>'{update} | {delete}',
         
            'htmlOptions'=>array(
                'style'=>'width: 250px',
            ),
        ),

	),
)); 
?>
<?php $this->endWidget(); ?>

<script>
function reloadGrid(data) {
    $.fn.yiiGridView.update('address-grid');
}
</script>
No.of Rows  :  
<?
 $pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']); 
echo CHtml::dropDownList('pageSize',$pageSize,array(10=>10,20=>20,50=>50,100=>100,'all'=>'Show All'),array('onchange'=>"$.fn.yiiGridView.update('address-grid',{ data:{pageSize: $(this).val() }})",'20'=>'-- Select Page Range --','style'=>'width:100px;'));
?>


