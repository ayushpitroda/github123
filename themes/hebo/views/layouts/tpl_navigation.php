<section id="navigation-main">  
<div class="navbar">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
  
          <div class="nav-collapse">
			<?php 
			 if(Yii::app()->user->isGuest)
			  {
			$this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
		 array('label'=>'Home', 'url'=>array('/site/index', 'view'=>'about'),'linkOptions'=>array("data-description"=>""),),
                        array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about'),'linkOptions'=>array("data-description"=>""),),    
                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest,'linkOptions'=>array("data-description"=>"")),
                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest,'linkOptions'=>array("data-description"=>"")),
                    ),
                ));
               } 
			  if(!Yii::app()->user->isGuest)
			  {
		$this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
	 array('label'=>'Home', 'url'=>array('/site/page', 'view'=>'homepage'),'linkOptions'=>array("data-description"=>""),),			
	 array('label'=>'Setup <span class="caret"></span>','url'=>array('/site/page', 'view'=>'blog'),'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>""), 
                        'items'=>array(
					array('label'=>'General', 'url'=>array('/GENERAL/update&id=1')),
					array('label'=>'Add Business Unit', 'url'=>array('businessunit/create')),
					array('label'=>'Maintain Business Unit', 'url'=>array('businessunit/admin')),
					array('label'=>'Add User', 'url'=>array('/users/create')),
			        array('label'=>'Maintain User', 'url'=>array('/users/admin')),
					array('label'=>'Roles', 'url'=>array('roles/admin')),
					array('label'=>'Floor Plan', 'url'=>array('eTSROOMS/admin')),
					array('label'=>'Test Configuration', 'url'=>array('tESTS/admin')),
					array('label'=>'Report', 'url'=>array('/reportTemplate/update&id=1')),
					array('label'=>'Email', 'url'=>array('#')),
							
                        )),
	   array('label'=>'Properties <span class="caret"></span>','url'=>array('/site/page', 'view'=>'blog'),'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>""), 
                        'items'=>array(
					array('label'=>'Add Properties', 'url'=>array('#')),
					array('label'=>'Maintain properties', 'url'=>array('#')),
					array('label'=>'Reports', 'url'=>array('#')),
					    )),
 array('label'=>'Settings <span class="caret"></span>','url'=>array('/site/page', 'view'=>'blog'),'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>""), 
                        'items'=>array(
					array('label'=>'User Profile', 'url'=>array('#')),
					    )),						
					
	  array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest,'linkOptions'=>array("data-description"=>"")),					
	
				),
                ));	  
			   
              }  			  
				?>
    	</div>
    </div>
	</div>
</div>
</section><!-- /#navigation-main -->
