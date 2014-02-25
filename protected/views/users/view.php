<?php
/* @var $this UsersController */
/* @var $model Users */
if(checkrightsfunc(3))
{
}
else
{ ?>
<div align="center"> <span style="color:#DD0000; font-size:18px;">You Are Not authorised To access This Page</span></div>
<meta http-equiv="refresh" content="1;url='../../index.php'" />
<? exit();
}
?>

<div align="right">
   
	<?php echo CHtml::htmlButton('<i class="icon-plus"></i>Create User', array('submit' => array('create'),'class' => 'btn btn-medium pull-right')); ?>
	<?php echo CHtml::htmlButton('<i class="icon-edit"></i> Update Users', array('submit' => array('update', 'id'=>$model->id),'class' => 'btn btn-medium pull-right')); ?>
	<?php echo CHtml::htmlButton('<i class="icon-list"></i>Manage Users', array('submit' => array('admin'),'class' => 'btn btn-medium pull-right')); ?>
</div>

<h3>View Users #<?php echo $model->id; ?></h3>

<? 
$this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        
        array(           
            'label'=>'id',
            'type'=>'raw',
            'value'=>$model->id,
        ),
		array(           
            'label'=>'Username',
            'type'=>'raw',
            'value'=>$model->username,
        ),
		array(               
            'label'=> 'Full Name',
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
	
    ),
));

?>


