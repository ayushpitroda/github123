<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'User Name'); ?>
		<?php echo $form->textField($model,'username',array('size'=>30,'maxlength'=>30,'class'=>'input-large')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255,'class'=>'input-large')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Full Name'); ?>
		<?php echo $form->textField($model,'fname',array('size'=>60,'maxlength'=>255,'class'=>'input-large')); ?>
		<?php echo $form->error($model,'fname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Last Name'); ?>
		<?php echo $form->textField($model,'lname',array('size'=>60,'maxlength'=>255,'class'=>'input-large')); ?>
		<?php echo $form->error($model,'lname'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255,'class'=>'input-large')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>"btn btn-primary")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->