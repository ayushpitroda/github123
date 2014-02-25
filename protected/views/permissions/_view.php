<?php
/* @var $this PermissionsController */
/* @var $data Permissions */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('right_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->right_id), array('view', 'id'=>$data->right_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('right_name')); ?>:</b>
	<?php echo CHtml::encode($data->right_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('right_backname')); ?>:</b>
	<?php echo CHtml::encode($data->right_backname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('right_description')); ?>:</b>
	<?php echo CHtml::encode($data->right_description); ?>
	<br />


</div>