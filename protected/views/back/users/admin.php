<?php
$this->breadcrumbs = array(
    $model->label(2) => array('admin'),
    Yii::t('app', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('app', 'List') . ' ' . $model->label(2), 'url' => array('index')),
    array('label' => Yii::t('app', 'Create') . ' ' . $model->label(), 'url' => array('create')),
);
/*
  Yii::app()->clientScript->registerScript('search', "
  $('.search-button').click(function(){
  $('.search-form').toggle();
  return false;
  });
  $('.search-form form').submit(function(){
  $.fn.yiiGridView.update('users-grid', {
  data: $(this).serialize()
  });
  return false;
  });
  ");
 * */
?>

<!--h1><?php /* echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); */ ?></h1-->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Manage Users</h1>
    </div>
</div>
<!--p>
You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.
</p -->

<?php /* echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
  <div class="search-form">
  <?php $this->renderPartial('_search', array(
  'model' => $model,
  )); ?>
  </div><!-- search-form -->
 */
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"> Users </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                        <?php
                        $this->widget('zii.widgets.grid.CGridView', array(
                            'id' => 'users-grid',
                            //'htmlOptions'=>array('class'=>'table table-striped table-bordered table-hover dataTable no-footer'),
                            'itemsCssClass' => 'table table-striped table-bordered table-hover dataTable no-footer',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                //'id',
                                array(
                                    'name' => 'email_address',
                                    'htmlOptions' => array('width' => '250pxpx'),
                                ),
                                //'password',
                                array(
                                    'name' => 'first_name',
                                    'htmlOptions' => array('width' => '200px'),
                                ),
                                 array(
                                    'name' => 'gov_auth_number',
                                    //  'value'=>'$data->getgov_auth_number();',
                                    //'value' => '$data->getMcNumber();',
                                     'value'=>'$data->user_type=="seller"?"$data->gov_auth_number":"N/A"',
                                     'type'=>'raw',
                                    'htmlOptions' => array('width' => '200px'),
                                ),
                              
                               
                                array(
                                    'name' => 'user_type',
                                    'filter' => CHtml::activeDropDownList($model, 'user_type', array(
                                        '' => 'All',
                                        'buyer' => 'Buyer',
                                        'seller' => 'Seller',
                                            )
                                )),
                                //'last_name',
                                //'address',
                                /*
                                  'city',
                                  'state',
                                  'country',
                                  'zip',
                                  'phone',
                                  'fax',
                                  'mobile',
                                  'mobilecarrier',
                                  'dot',

                                  'last_login',
                                  'updated',
                                  'created',
                                  'status',
                                  'activation_code',
                                  'activation_status',
                                  'gov_auth_number',
                                 */
                                array(
                                    'name' => 'activation_status',
                                    'value' => '$data->getStatus();',
                                    'header' => 'Verified',
                                    'type' => 'raw',
                                    'filter' => CHtml::activeDropDownList($model, 'activation_status', array(
                                        '' => 'All',
                                        '0' => 'Deactive',
                                        '1' => 'Active',
                                            )
                                )),
          
                              array(

                              'class' => 'CButtonColumn',
                              'htmlOptions'=>array('width'=>'100px'),
                              ), 
                            ),
                        )); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>