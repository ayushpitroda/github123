<?php
/* @var $this RolesController */
/* @var $dataProvider CActiveDataProvider */
if(checkrightsfunc(4))
{
}
else
{ ?>
<div align="center" <span style="color:#DD0000; font-size:18px;">You Are Not authorised To access This Page</span></div>
<meta http-equiv="refresh" content="1;url='../../index.php'" />

<? exit();

}

$this->breadcrumbs=array(
	'Roles',
);

$this->menu=array(
	array('label'=>'Create Roles', 'url'=>array('create')),
	array('label'=>'Manage Roles', 'url'=>array('admin')),
);
?>

<h1>Roles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
