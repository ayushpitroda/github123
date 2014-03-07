<?php
$this->breadcrumbs = array(
    $model->label(2) => array('admin'),
    GxHtml::valueEx($model),
);

$this->menu = array(
    array('label' => Yii::t('app', 'List') . ' ' . $model->label(2), 'url' => array('index')),
    array('label' => Yii::t('app', 'Create') . ' ' . $model->label(), 'url' => array('create')),
    array('label' => Yii::t('app', 'Update') . ' ' . $model->label(), 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('app', 'Delete') . ' ' . $model->label(), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url' => array('admin')),
);
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">User Information</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"> User info </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">

                        <?php
                        $this->widget('zii.widgets.CDetailView', array(
                            'data' => $model,
                            //'htmlOptions'=>array('class'=>'table table-striped table-bordered table-hover dataTable no-footer'),
                            'attributes' => array(
                                'id',
                                'email_address',
                                'password',
                                'first_name',
                                'last_name',
                                'address',
                                'city',
                                'state',
                                'country',
                                'zip',
                                'phone',
                                'fax',
                                'mobile',
                                'mobilecarrier',
                                'dot',
                                'user_type',
                                'last_login',
                                'updated',
                                'created',
                                'status',
                                'activation_code',
                                'activation_status',
                                'gov_auth_number',
                            ),
                        )); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

