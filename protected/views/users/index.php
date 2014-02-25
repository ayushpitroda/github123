<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

if(checkrightsfunc(3))
{
}
else
{ ?>
<div align="center" <span style="color:#DD0000; font-size:18px;">You Are Not authorised To access This Page</span></div>
<meta http-equiv="refresh" content="1;url='../../index.php'" />

<? exit();

}


$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<h1>Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
