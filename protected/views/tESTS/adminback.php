<?php
/* @var $this TESTSController */
/* @var $model TESTS */

$this->breadcrumbs=array(
	'Tests'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TESTS', 'url'=>array('index')),
	array('label'=>'Create TESTS', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tests-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tests</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tests-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'TEST_ID',
		'TEST_DESCR',
		'MOLD_IND',
		'BACTERIA_IND',
		'ALLERGEN_IND',
		'CHEMICAL_IND',
		/*
		'ASBESTOS_IND',
		'PARTICULATE_ANALYSIS_IND',
		'BUILDING_MATERIAL_IND',
		'RELATIVE_HUMIDITY_IND',
		'TEMPERATURE_IND',
		'SAMPLE_STRT_DTTM_IND',
		'SAMPLE_END_DTTM_IND',
		'LAB_CODE_IND',
		'CREATE_DTTM',
		'LASTUPDDTTM',
		'LASTUPDUSER',
		'STATUS',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
