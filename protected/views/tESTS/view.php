<?php
/* @var $this TESTSController */
/* @var $model TESTS */

$this->breadcrumbs=array(
	'Tests'=>array('admin'),
	$model->TEST_ID,
);

$this->menu=array(
	array('label'=>'List TESTS', 'url'=>array('index')),
	array('label'=>'Create TESTS', 'url'=>array('create')),
	array('label'=>'Update TESTS', 'url'=>array('update', 'id'=>$model->TEST_ID)),
	array('label'=>'Delete TESTS', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->TEST_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TESTS', 'url'=>array('admin')),
);
?>

<h4>View TEST #<?php echo $model->TEST_ID; ?></h4>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'TEST_ID',
		'TEST_DESCR',
				 array(
                        'name' => 'MOLD_IND',
                        'value' => $model->MOLD_IND == 1 ? 'Yes' : 'No',
                ),
			  array(
                        'name' => 'BACTERIA_IND',
                        'value' => $model->BACTERIA_IND == 1 ? 'Yes' : 'No',
                ),
			 array(
                        'name' => 'ALLERGEN_IND',
                        'value' => $model->ALLERGEN_IND == 1 ? 'Yes' : 'No',
                ),	
        	 array(
                        'name' => 'CHEMICAL_IND',
                        'value' => $model->CHEMICAL_IND == 1 ? 'Yes' : 'No',
                ),
			 array(
                        'name' => 'ASBESTOS_IND',
                        'value' => $model->ASBESTOS_IND == 1 ? 'Yes' : 'No',
                ),
			array(
                        'name' => 'PARTICULATE_ANALYSIS_IND',
                        'value' => $model->PARTICULATE_ANALYSIS_IND == 1 ? 'Yes' : 'No',
                ),	
			array(
                        'name' => 'BUILDING_MATERIAL_IND',
                        'value' => $model->BUILDING_MATERIAL_IND == 1 ? 'Yes' : 'No',
                ),	
			array(
                        'name' => 'RELATIVE_HUMIDITY_IND',
                        'value' => $model->RELATIVE_HUMIDITY_IND == 1 ? 'Yes' : 'No',
                ),	
		 	array(
                        'name' => 'TEMPERATURE_IND',
                        'value' => $model->TEMPERATURE_IND == 1 ? 'Yes' : 'No',
                ),
			array(
                        'name' => 'SAMPLE_STRT_DTTM_IND',
                        'value' => $model->SAMPLE_STRT_DTTM_IND == 1 ? 'Yes' : 'No',
                ),
		  array(
                        'name' => 'SAMPLE_END_DTTM_IND',
                        'value' => $model->SAMPLE_END_DTTM_IND == 1 ? 'Yes' : 'No',
                ),	
		   array(
                        'name' => 'LAB_CODE_IND',
                        'value' => $model->LAB_CODE_IND == 1 ? 'Yes' : 'No',
                ),
		'CREATE_DTTM',
		'LASTUPDDTTM',
		'LASTUPDUSER',
		 array(
                        'name' => 'STATUS',
                        'value' => $model->STATUS == 1 ? 'Active' : 'InActive',
                ),

	),
)); ?>
