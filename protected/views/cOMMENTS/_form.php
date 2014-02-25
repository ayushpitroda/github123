<?php
/* @var $this COMMENTSController */
/* @var $model COMMENTS */
/* @var $form CActiveForm */
?>
<style type="text/css">
#COMMENTS_LOCATION_IDS input {
    float: left;
    margin-right: 10px;
}
#COMMENTS_STATUS input {
    
    margin-right: 40px;
	display:inline;
}
</style>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comments-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'COMMENT_ID'); ?>
		<?php echo $form->textField($model,'COMMENT_ID',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'COMMENT_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'COMMENT_DESCR'); ?>
		<?php echo $form->textField($model,'COMMENT_DESCR',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'COMMENT_DESCR'); ?>
	</div>


<div class="row">
<?php echo $form->labelEx($model,'LOCATION_IDS'); ?>
</div>
 <?php echo $form->checkBoxList($model,'LOCATION_IDS',CHtml::listData(COMMENTLOC::model()->findAll(), 'LOCATION_ID', 'LOCATION_DESCR')); ?>	  

	<div class="row">		
	Status
    <?php echo $form->radioButtonList($model,'STATUS', $model->getSatusOptions(),array('separator'=>'')); ?> 
	 </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->