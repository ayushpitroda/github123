<strong>Manage Home Page Content</strong>
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
Yii::app()->clientScript->registerScript('content','

	$("div[class^=content-]").live("click", function () {
		$(this).editable("'.$this->createUrl('pages/status').'", {
			submitdata : function (value,settings){
			return {"Pages[auto_id]":$(this).attr("class").substr("8"),};						},
			indicator : "Saving...",
			tooltip   : "Click to edit...",
			submit   : "OK",
			width:400,
			height: 400,
			type : "textarea",
			name : "Pages[content]"
		 });
	});	 

',CClientScript::POS_READY);




?>
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
)); ?>
 <?php	echo CHtml::button('Export', array('submit' => array('pages/exportcsv'))); ?>
 
<strong>Use Pipe [ | ] Symbol for Multiple Search in Single Text box...example [Key1|key2|key3|key4| .....]</strong><br />
<br />
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
		'auto_id' => array('htmlOptions'=>array('width'=>'50px'),'type' =>'raw', 'name'=> "auto_id"),
		'content' => array('htmlOptions'=>array('width'=>'300px'),'type' =>'raw', 'name'=> "content", 'value' => '"<div  class=\'content-".$data->auto_id."\' ". emptyChecksetings($data->content).">".emptyCheck($data->content)."</div>"'),
	 array(
            'class'=>'PagesEButtonColumnWithClearFilters',
			 'header' =>'Action',
            'template'=>'{view} | {update}',
            'buttons'=>array
            (
				 'add' => array
                (
                    'label'=>'Create New Pageword',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/add.jpeg',
                    'url'=>'Yii::app()->createUrl("Pagewords/create")',
                   
                ),
            ),
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

<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'mydialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Add New Address',
        'autoOpen'=>false,
		'width'=> '800px',
        'height' => '500',
		'close'=>'js:function(e,o){location.reload();}',	
		'model'=>'true',
    ),
));
?>
 <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>   
<?php	
$this->endWidget('zii.widgets.jui.CJuiDialog');
// the link that may open the dialog
?>
<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'exportdialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Export Columns',
        'autoOpen'=>false,
		'width'=> '690px',
        'height' => '150',
		'close'=>'js:function(e,o){location.reload();}',	
		'model'=>'true',
    ),
));
?>
 <?php // echo $this->renderPartial('_exportcolumns', array('model'=>$model)); ?>   
<?php	
$this->endWidget('zii.widgets.jui.CJuiDialog');
// the link that may open the dialog
?>
