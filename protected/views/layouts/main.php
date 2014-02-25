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
	<?php 
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.jeditable.mini.js');
	?>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <script type="text/javascript">
        $(document).ready(function(){
           $("form").each(function(dom, i){
               this.reset();
           });
        });
    </script>
	<? 	
	if(isset($_SESSION['langid']))
	{
	$langid=$_SESSION['langid'];
	} else
	{
	$langid=1;
	}
	$usrdbid=Yii::app()->user->id;
	 $userdbsarray=userdetailsfetchfunc($usrdbid);
	 $fname=$userdbsarray['fname'];
	 $lname=$userdbsarray['lname'];
	 if(($fname=='' ) &&  ($fname=='' ))
	 {
	 $fname=$userdbsarray['username'];
	 } 
?>
</head>

<body>
<div class="section-colored">
 
    <div class="container">
	    <div class="row">
		 <div class="span6" id="main_content">
	    <h2>[<span class="mn_color">mn</span>]raumbuch<span class="content_size">die online planungshilfe</span></h2>
	   </div>
	   <div class="span6">
	<?php if (Yii::app()->user->id!=''){ ?> 	
	   <strong>
	   <font color="#990033"  >Welcome to </font><font color="#FF0000"><?php echo  $fname . $lname ;?></font></strong>
	   <? } ?>
	      </div>
	   </div>
	</div> 
    <div class="container">
	
<!-- /.navbar -->
	<div class="top-menu" > 
	<?php     $this->widget('bootstrap.widgets.TbTabs', array(
    'type' => 'pills',
    'tabs' => array(
    array('label' =>'Home', 'url' => array('site/index')),
	array('label' =>'Aboutus', 'url' => array('site/aboutus')),
	array('label'=> 'Register', 'url'=>array('/site/register'), 'visible'=>Yii::app()->user->isGuest),
	array('label'=> 'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
    array('label'=> 'New Project', 'url'=>array('/questionProject/create'), 'visible'=>!Yii::app()->user->isGuest),
	array('label' =>'All Projects', 'url' => array('/questionProject/admin'), 'visible'=>!Yii::app()->user->isGuest),
	array('label' =>'Settings', 'items' => array(
    array('label' => 'Roles', 'url' => array('/roles/admin'), 'visible'=>(!Yii::app()->user->isGuest) && checkrightsfunc(4)),
	array('label' => 'Permissions', 'url' => array('/permissions/admin'), 'visible'=>(!Yii::app()->user->isGuest) && checkrightsfunc(4)),
	array('label' => 'Pages', 'url' => array('/pages/admin'), 'visible'=>(!Yii::app()->user->isGuest) && checkrightsfunc(4)),
    ), 'visible'=>!Yii::app()->user->isGuest),
	array('label' =>'Profile', 'url' => array('/users/profileview/'.$usrdbid), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=> 'Users', 'url'=>array('/users/admin'), 'visible'=>(!Yii::app()->user->isGuest) && checkrightsfunc(3)),
	array('label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),

    ))
    ); ?>
<div>
</div>
	</div>
	</div>
	</div> 
	<?php echo $content; ?>
   <div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by <a href="http://medianet-home.de">medianet-home.de</a>.<br/>
		All Rights Reserved.<br/>
	</div> 
</body>
</html>