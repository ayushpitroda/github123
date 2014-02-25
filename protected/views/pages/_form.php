 <script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pages-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'Content'); ?>
	    <?php echo $form->textArea($model, 'content', array('id'=>'editor1')); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

	<script type="text/javascript">
     CKEDITOR.replace( 'editor1' );
	 CKEDITOR.replace( 'editor2' );
   </script>
</div><!-- form -->