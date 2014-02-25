<?php
/* @var $this PermissionsController */
/* @var $model Permissions */
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
	'Permissions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'', 'url'=>array('admin')),
);
?>

<h1>Create Permissions</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>