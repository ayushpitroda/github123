<?php if(Yii::app()->user->hasFlash('success')):?>
		    <div class="alert alert-success info">
	            <strong>Success! </strong><?php echo Yii::app()->user->getFlash('success'); ?>
    		</div>
		<?php endif; ?>
		<?php if(Yii::app()->user->hasFlash('error')):?>
		    <div class="alert alert-danger info">
	            <strong>Error! </strong><?php echo Yii::app()->user->getFlash('error'); ?>
    		</div>
		<?php endif; ?>
				<?php if(Yii::app()->user->hasFlash('info')):?>
		    <div class="alert alert-info info">
	            <strong>Information! </strong><?php echo Yii::app()->user->getFlash('info'); ?>
    		</div>
		<?php endif; ?>