<?php
/* @var $this GENERALController */
/* @var $model GENERAL */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'GENERAL_ID'); ?>
		<?php echo $form->textField($model,'GENERAL_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COMPANY'); ?>
		<?php echo $form->textField($model,'COMPANY',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LOGO'); ?>
		<?php echo $form->textField($model,'LOGO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DESCRIPTION'); ?>
		<?php echo $form->textField($model,'DESCRIPTION',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ADDRESS1'); ?>
		<?php echo $form->textField($model,'ADDRESS1',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ADDRESS2'); ?>
		<?php echo $form->textField($model,'ADDRESS2',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CITY'); ?>
		<?php echo $form->textField($model,'CITY',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STATE'); ?>
		<?php echo $form->textField($model,'STATE',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ZIP'); ?>
		<?php echo $form->textField($model,'ZIP',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EMAIL'); ?>
		<?php echo $form->textField($model,'EMAIL',array('size'=>60,'maxlength'=>75)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PHONE'); ?>
		<?php echo $form->textField($model,'PHONE',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TIMINGS'); ?>
		<?php echo $form->textField($model,'TIMINGS',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->