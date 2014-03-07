<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>
<?php /*
  <h1>Login</h1>

  <p>Please fill out the following form with your login credentials:</p>

  <div class="form">
  <?php
  $form = $this->beginWidget('CActiveForm', array(
  'id' => 'login-form',
  'enableClientValidation' => true,
  'clientOptions' => array(
  'validateOnSubmit' => true,
  ),
  ));
  ?>

  <p class="note">Fields with <span class="required">*</span> are required.</p>

  <div class="row">
  <?php echo $form->labelEx($model, 'username'); ?>
  <?php echo $form->textField($model, 'username'); ?>
  <?php echo $form->error($model, 'username'); ?>
  </div>

  <div class="row">
  <?php echo $form->labelEx($model, 'password'); ?>
  <?php echo $form->passwordField($model, 'password'); ?>
  <?php echo $form->error($model, 'password'); ?>
  <p class="hint">
  Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.
  </p>
  </div>

  <div class="row rememberMe">
  <?php echo $form->checkBox($model, 'rememberMe'); ?>
  <?php echo $form->label($model, 'rememberMe'); ?>
  <?php echo $form->error($model, 'rememberMe'); ?>
  </div>

  <div class="row buttons">
  <?php echo CHtml::submitButton('Login'); ?>
  </div>


  </div><!-- form -->
 *
 */ ?>
<div class="container">

    <div class="well login-well">
        <div class="row login-row">
            <div class="col-md-6 login-div ">
                <h4>Login Here:</h4>
                <div class="form-group col-sm-8">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'login-form',
                                'enableClientValidation' => true,
                                'clientOptions' => array(
                                    'validateOnSubmit' => true,
                                    'role' => 'form',
                                ),
                            ));
                    ?>
                    <!--textarea class="form-control" rows="3"></textarea-->
                    <div>
                    <?php echo $form->textField($model, 'email_address', array('class' => 'form-control ', 'row' => '3','placeholder'=>'Enter your Email Address')); ?>
                    <?php echo $form->error($model, 'email_address'); ?>
                    </div>
                        <br>
                        <div>
                    <?php echo $form->passwordField($model, 'password', array('class' => 'form-control ', 'row' => '3','placeholder'=>'Enter your password')); ?>
                    <?php echo $form->error($model, 'password'); ?>
                    </div>
                            <br>
                    <!--div class="row rememberMe"-->
                    <div>
                    <?php echo $form->checkBox($model, 'rememberMe'); ?>
                    <?php echo $form->label($model, 'rememberMe'); ?>
                    <?php echo $form->error($model, 'rememberMe'); ?>
                    </div>
                        <!--/div-->
                </div>
                <div class="clearfix"></div>
                <!--button type="submit" class="btn btn-primary">Submit</button-->
                <div class="login-button">
                <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-primary')); ?>
                </div>
                </div>
            <div class="col-md-6 reg-btn-div" >

                <div  style="margin-top: 40px">
                    <h4>Not register yet?</h4>
                    <h5>Get started now. Register here. </h5>
                <?php echo CHtml::Button('Register for Shipper / Broker', array('class' => 'btn btn-primary', 'submit' => array('site/register', 'type' => 'Buyer'))); ?>
                    <br>or<br>
                <?php echo CHtml::Button('Register for Carrier', array('class' => 'btn btn-primary', 'submit' => array('site/register', 'type' => 'Seller'))); ?>
                <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
</div>