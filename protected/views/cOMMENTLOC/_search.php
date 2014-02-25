<?php
/* @var $this COMMENTLOCController */
/* @var $model COMMENTLOC */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'LOCATION_ID'); ?>
		<?php echo $form->textField($model,'LOCATION_ID',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LOCATION_DESCR'); ?>
		<?php echo $form->textField($model,'LOCATION_DESCR',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CREATE_DTTM'); ?>
		<?php echo $form->textField($model,'CREATE_DTTM'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LASTUPDDTTM'); ?>
		<?php echo $form->textField($model,'LASTUPDDTTM'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LASTUPDUSER'); ?>
		<?php echo $form->textField($model,'LASTUPDUSER',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->