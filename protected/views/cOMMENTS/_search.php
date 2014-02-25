<?php
/* @var $this COMMENTSController */
/* @var $model COMMENTS */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'COMMENT_ID'); ?>
		<?php echo $form->textField($model,'COMMENT_ID',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COMMENT_DESCR'); ?>
		<?php echo $form->textField($model,'COMMENT_DESCR',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LOCATION_IDS'); ?>
		<?php echo $form->textField($model,'LOCATION_IDS',array('size'=>60,'maxlength'=>300)); ?>
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