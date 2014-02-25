<?php
/* @var $this COMMENTLOCController */
/* @var $model COMMENTLOC */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'commentloc-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'LOCATION_ID'); ?>
		<?php echo $form->textField($model,'LOCATION_ID',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'LOCATION_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LOCATION_DESCR'); ?>
		<?php echo $form->textField($model,'LOCATION_DESCR',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'LOCATION_DESCR'); ?>
	</div>
    <div class="row">		
	Status
    <?php echo $form->radioButtonList($model,'STATUS', $model->getSatusOptions()); ?> 
	 </div>
   
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->