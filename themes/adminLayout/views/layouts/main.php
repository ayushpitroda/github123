<?php
/* @var $this Controller */

//Yii::app()->clientScript->registerCoreScript('jquery');
$baseUrl = Yii::app()->theme->baseUrl;
$cs = Yii::app()->getClientScript();

$cs->registerScriptFile($baseUrl . '/js/bootstrap.min.js');
$cs->registerScriptFile($baseUrl . '/js/plugins/metisMenu/jquery.metisMenu.js');
$cs->registerScriptFile($baseUrl . '/js/plugins/morris/raphael-2.1.0.min.js');

$cs->registerScriptFile($baseUrl . '/js/sb-admin.js');
//$cs->registerScriptFile($baseUrl . '/js/demo/dashboard-demo.js');


$cs->registerCssFile($baseUrl . '/css/bootstrap.min.css');
$cs->registerCssFile($baseUrl . '/font-awesome/css/font-awesome.css');
$cs->registerCssFile($baseUrl . '/css/plugins/morris/morris-0.4.3.min.css');
$cs->registerCssFile($baseUrl . '/css/plugins/timeline/timeline.css');
$cs->registerCssFile($baseUrl . '/css/sb-admin.css');

$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/custom.js');
?>
<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>New job Loads</title>

        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>

    </head>

    <body>

        <div id="wrapper">

            
            <!-- /.navbar-static-side -->
            <?php echo $content; ?>

            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- Core Scripts - Include with every page -->
    

    </body>

</html>
