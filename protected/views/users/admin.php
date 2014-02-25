<?
if(checkrightsfunc(3))
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


Yii::app()->clientScript->registerScript('fname','

	$("div[class^=fname-]").live("click", function () {
		$(this).editable("'.$this->createUrl('users/status').'", {
			submitdata : function (value,settings){
			return {"Users[id]":$(this).attr("class").substr("6"),};						},
			indicator : "Saving...",
			tooltip   : "Click to edit...",
			submit   : "OK",
			width:200,
			height: 20,
			type : "textarea",
			name : "Users[fname]"
		 });
	});	 

',CClientScript::POS_READY);


Yii::app()->clientScript->registerScript('lname','

	$("div[class^=lname-]").live("click", function () {
		$(this).editable("'.$this->createUrl('users/status').'", {
			submitdata : function (value,settings){
			return {"Users[id]":$(this).attr("class").substr("6"),};						},
			indicator : "Saving...",
			tooltip   : "Click to edit...",
			submit   : "OK",
			width:200,
			height: 20,
			type : "textarea",
			name : "Users[lname]"
		 });
	});	 

',CClientScript::POS_READY);

Yii::app()->clientScript->registerScript('company','

	$("div[class^=company-]").live("click", function () {
		$(this).editable("'.$this->createUrl('users/status').'", {
			submitdata : function (value,settings){
			return {"Users[id]":$(this).attr("class").substr("8"),};						},
			indicator : "Saving...",
			tooltip   : "Click to edit...",
			submit   : "OK",
			width:200,
			height: 20,
			type : "textarea",
			name : "Users[company]"
		 });
	});	 

',CClientScript::POS_READY);



?>
<div align="right">
<?php  echo CHtml::link('Create User',array('users/create'));  ?>
</div>

<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
)); ?>

 <?php	echo CHtml::button('Export', array('submit' => array('users/exportcsv'))); ?>
 <?php	echo CHtml::button('Export All', array('submit' => array('users/exportall'))); ?>
  <?php	echo CHtml::button('Export Selected Items', array('submit' => array('users/exportselected'))); ?>&nbsp;

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
		'id' => array('htmlOptions'=>array('width'=>'50px'),'type' =>'raw', 'name'=> "id"),
		
		'fname' => array('htmlOptions'=>array('width'=>'200px'),'type' =>'raw', 'name'=> "fname", 'value' => '"<div  class=\'fname-".$data->id."\' ". emptyChecksetings($data->fname).">".emptyCheck($data->fname)."</div>"'),
		
		'lname' => array('htmlOptions'=>array('width'=>'200px'),'type' =>'raw', 'name'=> "lname", 'value' => '"<div  class=\'lname-".$data->id."\' ". emptyChecksetings($data->lname).">".emptyCheck($data->lname)."</div>"'),
		
		'company' => array('htmlOptions'=>array('width'=>'200px'),'type' =>'raw', 'name'=> "company", 'value' => '"<div  class=\'company-".$data->id."\' ". emptyChecksetings($data->company).">".emptyCheck($data->company)."</div>"'),
		
		'username' => array('htmlOptions'=>array('width'=>'50px'),'type' =>'raw', 'name'=> "username"),
		'email' => array('htmlOptions'=>array('width'=>'50px'),'type' =>'raw', 'name'=> "email"),
	array(
       'name' => 'role', 
       'type' => 'raw' ,
	   'header'=>'Roles',
	   'htmlOptions'=>array('style'=>'width: 160px'),
       'value'=>array($this,'RoleNames'),
	   'filter'=>CHtml::listData(Roles::model()->findAll(),'role_id','role_name'),
     ),
array(
       'name' => 'roles.name', 
       'type' => 'raw',
	   'header'=>'Assign Roles',
	   'htmlOptions'=>array('style'=>'width: 160px'),
       'value'=>'CHtml::link(Assign Roles, array("users/rolesupdate", "id"=>$data->id))',
     ),
array(
       'name' => 'newsletter', 
       'type' => 'raw',
	   'header'=>'Newsletter',
	   'htmlOptions'=>array('style'=>'width: 160px'),
	   'value' => '($data->newsletter !== "1")? "No":"Yes"',
     ),	 

	 array(
            'class'=>'UsersEButtonColumnWithClearFilters',
			 'header' =>'Action',
            'template'=>'{view}  {update} {delete}',
            
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
No.of Rows: <?
 $pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']); 
echo CHtml::dropDownList('pageSize',$pageSize,array(10=>10,20=>20,50=>50,100=>100,'all'=>'Show All'),array('onchange'=>"$.fn.yiiGridView.update('address-grid',{ data:{pageSize: $(this).val() }})",'20'=>'-- Select Page Range --','style'=>'width:100px;'));
?>

 