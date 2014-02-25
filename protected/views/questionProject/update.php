<legend>
<div><font color="#ed5800"><strong> Update Project</strong></font> <span style="margin-left:500px;">
<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
    'buttons'=>array(
         array('label'=>'View','icon'=>'icon-eye-open', 'url'=>Yii::app()->createUrl('questionProject/view', array('id'=>$model->project_id))),
		 array('label'=>'View All Projects','icon'=>'icon-list', 'url'=>Yii::app()->createUrl('questionProject/admin')),
		
         ),
)); ?>
</span>
</div>
</legend>

<?php  echo $this->renderPartial('_updatenewproj', array('model'=>$model)); ?>