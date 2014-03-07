
 <?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="info">
       <div class="alert alert-success"> <?php echo Yii::app()->user->getFlash('success'); ?></div>
    </div>
<?php endif; ?>


