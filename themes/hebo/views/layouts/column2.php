<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<section class="main-body">
  <div class="container">
  <div class="row-fluid">
	
    <div class="span12">

		<?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
                'homeLink'=>CHtml::link('Dashboard'),
                'htmlOptions'=>array('class'=>'breadcrumb')
            )); ?><!-- breadcrumbs -->
        <?php endif?>
        <?php $this->renderPartial("//layouts/_message"); ?>
        <!-- Include content pages -->
        <?php echo $content; ?>

	</div><!--/span-->
    <?php /*?>
    <div class="span2">
		<?php include_once('tpl_sidebar.php');?>
    </div>
	<?php */?>
	<!--/span-->
  </div><!--/row-->
</div>
</section>


<?php $this->endContent(); ?>