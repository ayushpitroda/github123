<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'products-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
    'stateful'=>true,
    'htmlOptions'=>array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
<!--		<?php echo $form->textField($model,'type',array('size'=>60,'maxlength'=>255)); ?>-->
             <?php echo $form->dropDownList(
    $model,
    'type',
    array('Raj'=>'Raj','Khodal'=>'Khodal')
);
 ?>
<!--		<?php echo $form->error($model,'type'); ?>-->
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'detail'); ?>
		<!--<?php echo $form->textField($model,'detail',array('size'=>60,'maxlength'=>255)); ?>-->
                <?php echo $form->textArea($model,'detail',array('rows'=>10, 'cols'=>20)); ?>
		<?php echo $form->error($model,'detail'); ?>
	</div>

	<div class="rows">
		<?php echo $form->labelEx($model,'image_path'); ?>
		<?php echo CHtml::activeFileField($model, 'image_path'); ?>
		<?php echo $form->error($model,'image_path'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->