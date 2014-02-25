<strong>Test Configuration</strong>
<div align="right">
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Add New Test',
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
		'TEST_ID' => array('htmlOptions'=>array('width'=>'100px'),'type' =>'raw', 'name'=> "TEST_ID"),
		'TEST_DESCR' => array('htmlOptions'=>array('width'=>'300px'),'type' =>'raw', 'name'=> "TEST_DESCR"),
		'STATUS' => array('htmlOptions'=>array('width'=>'100px'),'type' =>'raw', 'name'=> "STATUS", 
		'value' => 'CheckStatus($data->STATUS)' , 'filter'=>''),
		'checkvalues' => array('htmlOptions'=>array('width'=>'300px'),'type' =>'raw', 'name'=> "checkvalues" , 'filter'=>'','value'=>'Testcheckvalues($data->MOLD_IND,$data->BACTERIA_IND,$data->ALLERGEN_IND,$data->CHEMICAL_IND,$data->ASBESTOS_IND,$data->PARTICULATE_ANALYSIS_IND,$data->BUILDING_MATERIAL_IND,$data->RELATIVE_HUMIDITY_IND,$data->TEMPERATURE_IND,$data->SAMPLE_STRT_DTTM_IND,$data->SAMPLE_END_DTTM_IND,$data->LAB_CODE_IND)', 'header'=>'Check Values'),
		
	 array(
            'class'=>'CButtonColumn',
			 'header' =>'Action',
             'template'=>'{view} | {update} | {delete}',
         
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


