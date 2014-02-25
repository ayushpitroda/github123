<?php
/* @var $this BusinessunitController */
/* @var $model BusinessUnit */
/* @var $form CActiveForm */
?>

<div class="form formall"> 

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'business-unit-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'Business Unit Id'); ?>
		<?php echo $form->textField($model,'BUSINESS_UNIT_ID',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'BUSINESS_UNIT_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Company Name'); ?>
		<?php echo $form->textField($model,'BU_DESCR',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'BU_DESCR'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Company LOGO'); ?>
		<?php echo $form->fileField($model,'LOGO'); ?>
           <img src="data:image/jpeg;base64,<?= base64_encode($model->LOGO); ?>" width="100" />
        <?php echo $form->error($model,'LOGO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EMAIL'); ?>
		<?php echo $form->textField($model,'EMAIL',array('size'=>60,'maxlength'=>75)); ?>
		<?php echo $form->error($model,'EMAIL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PHONE'); ?>
		<?php echo $form->textField($model,'PHONE',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'PHONE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TIMINGS'); ?>
		<?php echo $form->textField($model,'TIMINGS',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'TIMINGS'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ADDRESS1'); ?>
		<?php echo $form->textField($model,'ADDRESS1',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ADDRESS1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ADDRESS2'); ?>
		<?php echo $form->textField($model,'ADDRESS2',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ADDRESS2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CITY'); ?>
		<?php echo $form->textField($model,'CITY',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'CITY'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'STATE'); ?>
		<?php echo $form->textField($model,'STATE',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'STATE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ZIP'); ?>
		<?php echo $form->textField($model,'ZIP',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'ZIP'); ?>
	</div>

	<div class="row buttons">
		<label>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		</label>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->