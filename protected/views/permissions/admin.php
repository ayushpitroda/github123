<?
if(checkrightsfunc(4))
{
}
else
{ ?>
<div align="center" <span style="color:#DD0000; font-size:18px;">You Are Not authorised To access This Page</span></div>
<meta http-equiv="refresh" content="1;url='../../index.php'" />

<? exit();

}
?>
<style type="text/css">
body {
    width:auto;
	
  
	margin: 0; padding: 0;
	}
/*--Tooltip Styles--*/
.tip {
	color: #fff;
	background:#CCCCCC;
	display:none; /*--Hides by default--*/
	padding:10px;
	border:#999999;
	position:absolute;	z-index:1000;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
}

</style>

<?php
/* @var $this AddressController */
/* @var $model Address */

$this->breadcrumbs=array(
	'Addresses'=>array('index'),
	'Manage',
);



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#address-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

Yii::app()->clientScript->registerScript('right_name','

	$("div[class^=right_name-]").live("click", function () {
		$(this).editable("'.$this->createUrl('permissions/status').'", {
			submitdata : function (value,settings){
			return {"Permissions[right_id]":$(this).attr("class").substr("11"),};						},
			indicator : "Saving...",
			tooltip   : "Click to edit...",
			submit   : "OK",
			width:200,
			height: 20,
			type : "textarea",
			name : "Permissions[right_name]"
		 });
	});	 

',CClientScript::POS_READY);


Yii::app()->clientScript->registerScript('right_description','

	$("div[class^=right_description-]").live("click", function () {
		$(this).editable("'.$this->createUrl('permissions/status').'", {
			submitdata : function (value,settings){
			return {"Permissions[right_id]":$(this).attr("class").substr("18"),};						},
			indicator : "Saving...",
			tooltip   : "Click to edit...",
			submit   : "OK",
			width:200,
			height: 20,
			type : "textarea",
			name : "Permissions[right_description]"
		 });
	});	 

',CClientScript::POS_READY);


?>
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
)); ?>

 <?php	echo CHtml::button('Export', array('submit' => array('permissions/exportcsv'))); ?>
 <?php	echo CHtml::button('Export All', array('submit' => array('permissions/exportall'))); ?>
  <?php	echo CHtml::button('Export Selected Items', array('submit' => array('permissions/exportselected'))); ?>&nbsp;

<br />

<strong>Use Pipe [ | ] Symbol for Multiple Search in Single Text box...example [Key1|key2|key3|key4| .....]</strong><br />
<br />
No.of Rows  : 
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
	   array(
            'id'=>'autoId',
            'class'=>'CCheckBoxColumn',
            'selectableRows' => '50', 
        ),
	 array(
	        'header'=>'S.No',
            'class'=>'IndexColumn',
			'htmlOptions'=>array('width'=>'30px'),
        ),	
		'right_id' => array('htmlOptions'=>array('width'=>'50px'),'type' =>'raw', 'name'=> "right_id"),
		'right_name' => array('htmlOptions'=>array('width'=>'200px'),'type' =>'raw', 'name'=> "right_name", 'value' => '"<div  class=\'right_name-".$data->right_id."\' ". emptyChecksetings($data->right_name).">".emptyCheck($data->right_name)."</div>"'),
		'right_description' => array('htmlOptions'=>array('width'=>'200px'),'type' =>'raw', 'name'=> "right_description", 'value' => '"<div  class=\'right_description-".$data->right_id."\' ". emptyChecksetings($data->right_description).">".emptyCheck($data->right_description)."</div>"'),
	
	 array(
            'class'=>'RightsEButtonColumnWithClearFilters',
			 'header' =>'Action',
            'template'=>'{view}  {update}',
            
            'htmlOptions'=>array(
                'style'=>'width: 150px',
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
No.of Rows : 

<?
 $pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']); 
echo CHtml::dropDownList('pageSize',$pageSize,array(10=>10,20=>20,50=>50,100=>100,'all'=>'Show All'),array('onchange'=>"$.fn.yiiGridView.update('address-grid',{ data:{pageSize: $(this).val() }})",'20'=>'-- Select Page Range --','style'=>'width:100px;'));
?>

 