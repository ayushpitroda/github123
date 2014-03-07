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

<?php $this->endWidget(); ?>
        </div><!-- form -->

*/?>

                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <div class="login-panel panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Please Sign In</h3>
                                </div>
                                <div class="panel-body">
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                        'id' => 'login-form',
                                        'enableClientValidation' => true,
                                        'clientOptions' => array(
                                            'validateOnSubmit' => true,
                                            'role'=>'form',
                                        ),
                                    ));
                            ?>
                                <fieldset>
                                    <div class="form-group">
                                        <!--input class="form-control" placeholder="E-mail" name="email" type="email" autofocus-->
                                        <?php echo $form->textField($model, 'email_address',array('class'=>'form-control', 'placeholder'=>'Enter your email address')); ?>
                                        <?php echo $form->error($model, 'email_address'); ?>
                                    </div>
                                    <div class="form-group">
                                        <!--input class="form-control" placeholder="Password" name="password" type="password" value=""-->
                                        <?php echo $form->passwordField($model, 'password',array('class'=>'form-control', 'placeholder'=>'password')); ?>
                                        <?php echo $form->error($model, 'password'); ?>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <!--input name="remember" type="checkbox" value="Remember Me">Remember Me-->
                                             <?php echo $form->checkBox($model, 'rememberMe',array()); ?>
                                            <?php echo $form->label($model, 'rememberMe'); ?>
                                            <?php echo $form->error($model, 'rememberMe'); ?>
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <!--a href="index.html" class="btn btn-lg btn-success btn-block">Login</a-->
                                    <?php echo CHtml::submitButton('Login',array('class'=>'btn btn-lg btn-success btn-block')); ?>
                                </fieldset>
                                <?php $this->endWidget(); ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>

