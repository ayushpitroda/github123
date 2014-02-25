<?php
/* @var $this UsersController */
/* @var $model Users */

if(checkrightsfunc(3))
{
}
else
{ ?>
<div align="center" <span style="color:#DD0000; font-size:18px;">You Are Not authorised To access This Page</span></div>
<meta http-equiv="refresh" content="1;url='../../index.php'" />

<? exit();

}

?>
<div align="right">
	<?php echo CHtml::htmlButton('<i class="icon-list"></i>Manage Users', array('submit' => array('admin'),'class' => 'btn btn-medium pull-right')); ?>
</div>

<h1>Create User</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>