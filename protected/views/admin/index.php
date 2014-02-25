<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id'=> 'questionForm',
        
    ));
?>
<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
