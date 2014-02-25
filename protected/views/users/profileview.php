<?php
/* @var $this UsersController */
/* @var $model Users */
if(!userprofileaccess($model->id))
{
?>
<div><font color="#FF0000" size="+5">You Don't have a Permissons to Access this Page</font></div>
<meta http-equiv="refresh" content="2;url='../../../index.php'" />
<?
exit();
}
?>
<? 
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);
?>
<div align="right">
		<?php echo CHtml::htmlButton('<i class="icon-edit"></i> Update', array('submit' => array('users/persupdate', 'id'=>$model->id),'class' => 'btn btn-medium pull-right')); ?>
		<?php echo CHtml::htmlButton('<i class="icon-edit"></i> Change Password', array('submit' => array('users/changepassword', 'id'=>$model->id),'class' => 'btn btn-medium pull-right')); ?>
</div>
<? 
$this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
      		
		array(               
            'label'=>'Full Name',
            'type'=>'raw',
            'value'=>$model->fname,
        ),
		array(               
            'label'=>'Last Name',
            'type'=>'raw',
            'value'=>$model->lname,
        ),
		array(               
            'label'=>'Email',
            'type'=>'raw',
            'value'=>$model->email,
        ),
		array(               
            'label'=>'Phone',
            'type'=>'raw',
            'value'=>$model->mobile,
        ),
		array(           
            'label'=>'Username',
            'type'=>'raw',
            'value'=>$model->username,
        ),
		
		array(           
            'label'=> 'Newsletter',
            'type'=>'raw',
            //'value'=>$model->newsletter,
			'value' =>$model->newsletter? "Yes": "No",
        ),
    ),
));
?>

