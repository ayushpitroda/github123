<?php
/* @var $this PermissionsController */
/* @var $model Permissions */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'right_id'); ?>
		<?php echo $form->textField($model,'right_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'right_name'); ?>
		<?php echo $form->textArea($model,'right_name',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'right_backname'); ?>
		<?php echo $form->textArea($model,'right_backname',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'right_description'); ?>
		<?php echo $form->textArea($model,'right_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->