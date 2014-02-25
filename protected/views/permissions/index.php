<?php
/* @var $this PermissionsController */
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
	'Permissions',
);

$this->menu=array(
	array('label'=>'Create Permissions', 'url'=>array('create')),
	array('label'=>'Manage Permissions', 'url'=>array('admin')),
);
?>

<h1>Permissions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
