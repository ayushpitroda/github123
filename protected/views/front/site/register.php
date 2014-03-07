<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Register';
$this->breadcrumbs = array(
    'Registration',
);
?>

<div class="container">
    <div class="row">

        <div class="col-lg-12">
            <h1 class="page-header">Registration
                <small>It's Nice to Meet You!</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->baseUrl; ?>">Home</a>
                </li>
                <li class="active"><?php echo $this->breadcrumbs[0]; ?></li>
            </ol>
        </div>

    </div>


    <div class="well register-well">
        <div class ="row register-div">

            <h4>Registration:</h4>
            <div class="form-group">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'register-form',
                            'enableClientValidation' => true,
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                                'role' => 'form',
                            ),
                        ));
                ?>
                <fieldset>
                    <div class="col-md-6">
                        <div class="form-group">
                            <!--input class="form-control" placeholder="E-mail" name="email" type="email" autofocus-->
                            <?php echo $form->labelEx($model, 'email_address'); ?>
                            <?php echo $form->textField($model, 'email_address', array('class' => 'form-control', 'placeholder' => 'Enter valid Email address')); ?>
                            <?php echo $form->error($model, 'email_address'); ?>

                            <?php if (Yii::app()->user->hasFlash('invalid')): ?>
                                <div class="error"> <?php echo Yii::app()->user->getFlash('invalid'); ?></div>
                            <?php endif; ?>
                            </div>
                        <?php if ($model->type == 'Buyer') {
 ?>
                                    <div class="form-group">
                                        <!--input class="form-control" placeholder="Password" name="password" type="password" value=""-->
                            <?php echo $form->labelEx($model, 'password'); ?>
                            <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => 'Enter password')); ?>
<?php echo $form->error($model, 'password'); ?>
                                </div>


                                <div class="form-group">
                                    <!--input class="form-control" placeholder="Password" name="password" type="password" value=""-->
                            <?php echo $form->labelEx($model, 'Confirm Password'); ?>
                            <?php echo $form->passwordField($model, 'password2', array('class' => 'form-control', 'placeholder' => 'Re-Type Password')); ?>
<?php echo $form->error($model, 'password2'); ?>
                                </div>
<?php } ?>

                                <div class="form-group">
                                    <!--input class="form-control" placeholder="Password" name="password" type="password" value=""-->
                            <?php echo $form->labelEx($model, 'mobile'); ?>
                            <?php // echo $form->textField($model, 'mobile', array('class' => 'form-control', 'placeholder' => 'Enter Mobile Number')); ?>
                            <?php
                                $this->widget('CMaskedTextField', array(
                                    'model' => $model,
                                    'attribute' => 'mobile',
                             
                                    'mask' => '(999)-999-9999',
                                    'htmlOptions' => array('size' => 10,'class'=>'form-control','placeholder'=>'Mobile number')
                                ));
                            ?>
<?php echo $form->error($model, 'mobile'); ?>
                            </div>
                        <?php if ($model->type == 'Buyer') { ?>

                                    <div class="form-group">
                                        <!--input class="form-control" placeholder="Password" name="password" type="password" value=""-->
                            <?php echo $form->labelEx($model, 'phone'); ?>
                            <?php echo $form->textField($model, 'phone', array('class' => 'form-control', 'placeholder' => 'phone')); ?>
                            <?php echo $form->error($model, 'phone'); ?>
                                </div>

                                <div class="form-group">
                                    <!--input class="form-control" placeholder="Password" name="password" type="password" value=""-->
                            <?php echo $form->labelEx($model, 'fax'); ?>
                            <?php echo $form->textField($model, 'fax', array('class' => 'form-control', 'placeholder' => 'fax')); ?>
                            <?php echo $form->error($model, 'fax'); ?>
                                </div>

                                <div class="form-group">
                                    <!--input class="form-control" placeholder="Password" name="password" type="password" value=""-->
                            <?php echo $form->labelEx($model, 'zip'); ?>
                            <?php echo $form->textField($model, 'zip', array('class' => 'form-control', 'placeholder' => 'zipcode')); ?>
                            <?php echo $form->error($model, 'zip'); ?>
                                </div>
                        <?php } ?>
                            </div>

                            <div class="col-md-6">
                        <?php if ($model->type == 'Seller') {
                        ?>
                                    <div class="form-group">
                                        <!--input class="form-control" placeholder="E-mail" name="email" type="email" autofocus-->
                            <?php echo $form->labelEx($model, 'gov_auth_number'); ?>
                            <?php echo $form->textField($model, 'gov_auth_number', array('class' => 'form-control', 'placeholder' => 'Enter Govt Authentication Number')); ?>
                            <?php echo $form->error($model, 'gov_auth_number'); ?>
                                </div>
                        <?php } ?>
                                <div class="form-group">
                                    <!--input class="form-control" placeholder="Password" name="password" type="password" value=""-->
                            <?php echo $form->labelEx($model, 'first_name'); ?>
                            <?php echo $form->textField($model, 'first_name', array('class' => 'form-control', 'placeholder' => 'Enter First Name')); ?>
                            <?php echo $form->error($model, 'first_name'); ?>
                            </div>


                        <?php if ($model->type == 'Buyer') {
                        ?>
                                    <div class="form-group">

                            <?php echo $form->labelEx($model, 'last_name'); ?>
                            <?php echo $form->textField($model, 'last_name', array('class' => 'form-control', 'placeholder' => 'Enter Last Name')); ?>
                            <?php echo $form->error($model, 'last_name'); ?>
                                </div>

                                <div class="form-group">
                            <?php echo $form->labelEx($model, 'address'); ?>
                            <?php echo $form->textField($model, 'address', array('class' => 'form-control', 'placeholder' => 'Type Address here')); ?>
                            <?php echo $form->error($model, 'address'); ?>
                                </div>


                                <div class="form-group">
                                    <!--input class="form-control" placeholder="Password" name="password" type="password" value=""-->
                            <?php echo $form->labelEx($model, 'city'); ?>
                            <?php echo $form->textField($model, 'city', array('class' => 'form-control', 'placeholder' => 'city')); ?>
                            <?php echo $form->error($model, 'city'); ?>
                                </div>

                                <div class="form-group">
                                    <!--input class="form-control" placeholder="Password" name="password" type="password" value=""-->
                            <?php echo $form->labelEx($model, 'state'); ?>
                            <?php echo $form->textField($model, 'state', array('class' => 'form-control', 'placeholder' => 'state')); ?>
                            <?php echo $form->error($model, 'state'); ?>
                                </div>
                                <div class="form-group">
                                    <!--input class="form-control" placeholder="Password" name="password" type="password" value=""-->
                            <?php echo $form->labelEx($model, 'country'); ?>
                            <?php echo $form->textField($model, 'country', array('class' => 'form-control', 'placeholder' => 'country')); ?>
                            <?php echo $form->error($model, 'country'); ?>
                                </div>







                        <?php } ?>
                            </div>
                    <?php /* if ($model->type == 'Seller') {
                                  ?>
                                  <div class="form-group">
                                  <!--input class="form-control" placeholder="E-mail" name="email" type="email" autofocus-->
                                  <?php echo $form->labelEx($model, 'gov_auth_number'); ?>
                                  <?php echo $form->textField($model, 'gov_auth_number', array('class' => 'form-control', 'placeholder' => 'Enter Govt Authentication Number')); ?>
                                  <?php echo $form->error($model, 'gov_auth_number'); ?>
                                  </div>
                                  <?php } ?>
                                  <div class="form-group">
                                  <!--input class="form-control" placeholder="E-mail" name="email" type="email" autofocus-->
                                  <?php echo $form->labelEx($model, 'email_address'); ?>
                                  <?php echo $form->textField($model, 'email_address', array('class' => 'form-control', 'placeholder' => 'Enter valid Email address')); ?>
                                  <?php echo $form->error($model, 'email_address'); ?>
                                  </div>
                                  <?php if ($model->type == 'Buyer') {
                                  ?>
                                  <div class="form-group">
                                  <!--input class="form-control" placeholder="Password" name="password" type="password" value=""-->
                                  <?php echo $form->labelEx($model, 'password'); ?>
                                  <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => 'Enter password')); ?>
                                  <?php echo $form->error($model, 'password'); ?>
                                  </div>


                                  <div class="form-group">
                                  <!--input class="form-control" placeholder="Password" name="password" type="password" value=""-->
                                  <?php echo $form->labelEx($model, 'Re-Type Password'); ?>
                                  <?php echo $form->passwordField($model, 'password2', array('class' => 'form-control', 'placeholder' => 'Re-Type Password')); ?>
                                  <?php echo $form->error($model, 'password2'); ?>
                                  </div>
                                  <?php } ?>
                                  <div class="form-group">
                                  <!--input class="form-control" placeholder="Password" name="password" type="password" value=""-->
                                  <?php echo $form->labelEx($model, 'first_name'); ?>
                                  <?php echo $form->textField($model, 'first_name', array('class' => 'form-control', 'placeholder' => 'Enter First Name')); ?>
                                  <?php echo $form->error($model, 'first_name'); ?>
                                  </div>
                                  <?php if ($model->type == 'Buyer') {
                                  ?>
                                  <div class="form-group">
                                  <!--input class="form-control" placeholder="Password" name="password" type="password" value=""-->
                                  <?php echo $form->labelEx($model, 'last_name'); ?>
                                  <?php echo $form->textField($model, 'last_name', array('class' => 'form-control', 'placeholder' => 'Enter Last Name')); ?>
                                  <?php echo $form->error($model, 'last_name'); ?>
                                  </div>
                                  <div class="form-group">
                                  <!--input class="form-control" placeholder="Password" name="password" type="password" value=""-->
                                  <?php echo $form->labelEx($model, 'address'); ?>
                                  <?php echo $form->textArea($model, 'address', array('class' => 'form-control', 'placeholder' => 'Type Address here')); ?>
                                  <?php echo $form->error($model, 'address'); ?>
                                  </div>
                                  <div class="form-group">
                                  <!--input class="form-control" placeholder="Password" name="password" type="password" value=""-->
                                  <?php echo $form->labelEx($model, 'city'); ?>
                                  <?php echo $form->textField($model, 'city', array('class' => 'form-control', 'placeholder' => 'city')); ?>
                                  <?php echo $form->error($model, 'city'); ?>
                                  </div>
                                  <div class="form-group">
                                  <!--input class="form-control" placeholder="Password" name="password" type="password" value=""-->
                                  <?php echo $form->labelEx($model, 'state'); ?>
                                  <?php echo $form->textField($model, 'state', array('class' => 'form-control', 'placeholder' => 'state')); ?>
                                  <?php echo $form->error($model, 'state'); ?>
                                  </div>
                                  <div class="form-group">
                                  <!--input class="form-control" placeholder="Password" name="password" type="password" value=""-->
                                  <?php echo $form->labelEx($model, 'zip'); ?>
                                  <?php echo $form->textField($model, 'zip', array('class' => 'form-control', 'placeholder' => 'zipcode')); ?>
                                  <?php echo $form->error($model, 'zip'); ?>
                                  </div>
                                  <div class="form-group">
                                  <!--input class="form-control" placeholder="Password" name="password" type="password" value=""-->
                                  <?php echo $form->labelEx($model, 'phone'); ?>
                                  <?php echo $form->textField($model, 'phone', array('class' => 'form-control', 'placeholder' => 'phone')); ?>
                                  <?php echo $form->error($model, 'phone'); ?>
                                  </div>
                                  <div class="form-group">
                                  <!--input class="form-control" placeholder="Password" name="password" type="password" value=""-->
                                  <?php echo $form->labelEx($model, 'fax'); ?>
                                  <?php echo $form->textField($model, 'fax', array('class' => 'form-control', 'placeholder' => 'fax')); ?>
                                  <?php echo $form->error($model, 'fax'); ?>
                                  </div>
                                  <?php } ?>

                                  <div class="form-group">
                                  <!--input class="form-control" placeholder="Password" name="password" type="password" value=""-->
                                  <?php echo $form->labelEx($model, 'mobile'); ?>
                                  <?php echo $form->textField($model, 'mobile', array('class' => 'form-control', 'placeholder' => 'Enter Mobile Number')); ?>
                                  <?php echo $form->error($model, 'mobile'); ?>
                                  </div>
                                  <?php if ($model->type == 'Buyer') {
                                  ?>
                                  <div class="form-group">
                                  <!--input class="form-control" placeholder="Password" name="password" type="password" value=""-->
                                  <?php echo $form->labelEx($model, 'Mobile Carrier'); ?>
                                  <?php echo $form->textField($model, 'mobilecarrier', array('class' => 'form-control', 'placeholder' => 'Enter Mobile Carrier')); ?>
                                  <?php echo $form->error($model, 'mobilecarrier'); ?>
                                  </div>
                                  <?php } */ ?>

                                <!-- Change this to a button or input when using this as a form -->
                                <!--a href="index.html" class="btn btn-lg btn-success btn-block">Login</a-->
                                <div class="clearfix"></div>
                                <div class="register-button">
                        <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-primary')); ?>
                            </div>
                        </fieldset>
                <?php $this->endWidget(); ?>
            </div>

        </div>
    </div>
</div>