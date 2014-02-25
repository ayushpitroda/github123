<?php
/* @var $this GENERALController */
/* @var $model GENERAL */
/* @var $form CActiveForm */
?>

<div class="form formall" > 

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'general-form',
	'enableAjaxValidation'=>false,
	'stateful' => true,
    'htmlOptions' => ['enctype' => 'multipart/form-data'],
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'COMPANY'); ?>
		<?php echo $form->textField($model,'COMPANY',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'COMPANY'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LOGO'); ?>
 		<?php echo $form->fileField($model,'LOGO');
           
		?>
        <?php
			if(!$model->isNewRecord){ 
				if(!empty($model->LOGO) && file_exists('./images/uploads/logo/'.$model->LOGO)){ ?>
				<img src="<?php echo Yii::app()->getBaseUrl().'/images/uploads/logo/'.$model->LOGO."?".rand(); ?>" width="100" />
		<?php	} }		?>
        <?php //echo $form->error($model,'LOGO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DESCRIPTION'); ?>
		<?php echo $form->textField($model,'DESCRIPTION',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'DESCRIPTION'); ?>
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

	<div class="row buttons">
	<label>&nbsp;</label>
	<input type="submit" value="Save" class="buttonall" name="yt0">
	<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->