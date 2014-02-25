<?
if(checkrightsfunc(4))
{
}
else
{ ?>
<div align="center"> <span style="color:#DD0000; font-size:18px;">You Are Not authorised To access This Page</span></div>
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
Yii::app()->clientScript->registerScript('role_name','

	$("div[class^=role_name-]").live("click", function () {
		$(this).editable("'.$this->createUrl('roles/status').'", {
			submitdata : function (value,settings){
			return {"Roles[role_id]":$(this).attr("class").substr("10"),};						},
			indicator : "Saving...",
			tooltip   : "Click to edit...",
			submit   : "OK",
			width:200,
			height: 20,
			type : "textarea",
			name : "Roles[role_name]"
		 });
	});	 

',CClientScript::POS_READY);

Yii::app()->clientScript->registerScript('de_description','

	$("div[class^=description-]").live("click", function () {
		$(this).editable("'.$this->createUrl('roles/status').'", {
			submitdata : function (value,settings){
			return {"Roles[role_id]":$(this).attr("class").substr("12"),};						},
			indicator : "Saving...",
			tooltip   : "Click to edit...",
			submit   : "OK",
			width:200,
			height: 20,
			type : "textarea",
			name : "Roles[description]"
		 });
	});	 

',CClientScript::POS_READY);

?>
<div align="right">
<?php  echo CHtml::link('Create Role',array('roles/create'));  ?><?php //echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/images/Add2.png'),array('address/create')); ?>
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
)); ?>

 <?php	echo CHtml::button('Export', array('submit' => array('roles/exportcsv'))); ?>
 <?php	echo CHtml::button('Export All', array('submit' => array('roles/exportall'))); ?>
  <?php	echo CHtml::button('Export Selected Items', array('submit' => array('roles/exportselected'))); ?>&nbsp;
 
   
<br />
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
		'role_id' => array('htmlOptions'=>array('width'=>'50px'),'type' =>'raw', 'name'=> "role_id"),
		'role_name' => array('htmlOptions'=>array('width'=>'200px'),'type' =>'raw', 'name'=> "role_name", 'value' => '"<div  class=\'role_name-".$data->role_id."\' ". emptyChecksetings($data->role_name).">".emptyCheck($data->role_name)."</div>"'),
		'description' => array('htmlOptions'=>array('width'=>'200px'),'type' =>'raw', 'name'=> "description", 'value' => '"<div  class=\'description-".$data->role_id."\' ". emptyChecksetings($data->description).">".emptyCheck($data->description)."</div>"'),
		
		
		
		array('name'=>'user_id','filter'=>CHtml::listData(Users::model()->findAll(), 'id','lname','fname',
   array('prompt'=>'Select Name...')),'value'=>'Users::Model()->FindByPk($data->user_id)->fname." ".Users::Model()->FindByPk($data->user_id)->lname',
 'header'=>'Created By','htmlOptions'=>array('style'=>'width: 160px')),
		array('htmlOptions'=>array('width'=>'90px'),
        'name' => 'date_added',
		'value' => 'Yii::app()->dateFormatter->format("d-M-y", strtotime($data->date_added))'
),
	 array(
            'class'=>'RolesEButtonColumnWithClearFilters',
			 'header' =>'Action',
            'template'=>'{view}  {update}  {delete}  {add}  {Assign Permissions}',
            'buttons'=>array
            (
				 'add' => array
                (
                    'label'=>'Create New Role',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/add.jpeg',
                    'url'=>'Yii::app()->createUrl("roles/create")',
                   
                ),
				 'delete' => array
				(
					'label'=>'Delete',
					 'icon'=>'icon-trash',
					//other params
					'visible'=>'($data->role_id!=1 and $data->role_id!=2)',
				),
				'Assign Permissions' => array
                (
                    'label'=>'Assign Permissions',
                    'icon'=>'icon-wrench',
                    'url'=>'Yii::app()->createUrl("roles/assignpermissions", array("role_id"=>$data->role_id))',
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
No.of Rows: 
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
 <?php  echo $this->renderPartial('_form', array('model'=>$model)); ?>   
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
<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'importdialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Import Csv',
        'autoOpen'=>false,
		'width'=> '690px',
        'height' => '250',
		'close'=>'js:function(e,o){location.reload();}',	
		'model'=>'true',
    ),
));
?>
 <?php   echo $this->renderPartial('_import', array('model'=>$model)); ?>   
<?php	
$this->endWidget('zii.widgets.jui.CJuiDialog');
// the link that may open the dialog
?>