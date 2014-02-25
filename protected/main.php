<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui-1.10.3.custom.css" />
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.1.min.js" ></script>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <script type="text/javascript">
        $(document).ready(function(){
           $("form").each(function(dom, i){
               this.reset();
           });
        });
        
        
    </script>

</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>"><img border="0" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mainlogo.gif"></a>
        </div>
	</div><!-- header -->

	<div id="mainmenu">
	<?php /*?>	<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Questions', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
	),
		)); ?><?php */?>
		<?php /*?>	<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
		     	array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Users', 'url'=>array('/users/admin'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
				
	),
		)); ?><?php */?>


	<?php     $this->widget('bootstrap.widgets.TbTabs', array(
    'type' => 'pills',
    'tabs' => array(
    array('label' => 'Home', 'url' => array('site/index')),
   	array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
	array('label'=>'Questioner', 'url'=>array('/questionAnswers/create'), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Mange Questions', 'url'=>array('/qQuery/viewallquestions'), 'visible'=>!Yii::app()->user->isGuest),
	 array('label' => 'Settings', 'items' => array(
    array('label' => 'Manage Answer Types', 'url' => array('/qType/admin'), 'visible'=>!Yii::app()->user->isGuest),
	 array('label' => 'Manage Disciplines', 'url' => array('/disciplines/admin'), 'visible'=>!Yii::app()->user->isGuest)
    ), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Users', 'url'=>array('/users/admin'), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
    ))
    ); ?>
	<?php /*?>	<?php     $this->widget('bootstrap.widgets.TbTabs', array(
    'type' => 'pills',
    'tabs' => array(
    array('label' => 'Home', 'content' => 'Home Content', 'active' => true),
    array('label' => 'Profile', 'content' => 'Profile Content'),
    array('label' => 'DropDown', 'items' => array(
    array('label' => 'Item1', 'content' => 'Item1 Content'),
    array('label' => 'Item2', 'content' => 'Item2 Content')
    )),
    ))
    ); ?><?php */?>
	</div><!-- mainmenu -->
    
	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by <a href="http://medianet-home.de">medianet-home.de</a>.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
