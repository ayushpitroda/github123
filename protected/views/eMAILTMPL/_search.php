<?php
/* @var $this EMAILTMPLController */
/* @var $model EMAILTMPL */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'BUSINESS_UNIT'); ?>
		<?php echo $form->textField($model,'BUSINESS_UNIT',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EMAIL_ID'); ?>
		<?php echo $form->textField($model,'EMAIL_ID',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EMAIL_NAME'); ?>
		<?php echo $form->textField($model,'EMAIL_NAME',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FROM_EMAIL_DEF'); ?>
		<?php echo $form->textField($model,'FROM_EMAIL_DEF',array('size'=>60,'maxlength'=>75)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SUBJECT_DEF'); ?>
		<?php echo $form->textField($model,'SUBJECT_DEF',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EMAIL_BODY'); ?>
		<?php echo $form->textArea($model,'EMAIL_BODY',array('rows'=>6, 'cols'=>50)); ?>
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