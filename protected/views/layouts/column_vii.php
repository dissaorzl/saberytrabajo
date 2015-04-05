<?php $this->beginContent('//layouts/main'); ?>
<div id="mainMbMenu">
    	<?php /* $this->widget('zii.widgets.CMenu',array(
	'items'=>array(
		array('label'=>'Home', 'url'=>array('/site/index')),
		array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
		array('label'=>'Contact', 'url'=>array('/site/contact')),
		array('label'=>'Administrar Usuarios'
			, 'url'=>Yii::app()->user->ui->userManagementAdminUrl
			, 'visible'=>!Yii::app()->user->isGuest),
		array('label'=>'Login'
			, 'url'=>Yii::app()->user->ui->loginUrl
			, 'visible'=>Yii::app()->user->isGuest),
		array('label'=>'Logout ('.Yii::app()->user->name.')'
			, 'url'=>Yii::app()->user->ui->logoutUrl
			, 'visible'=>!Yii::app()->user->isGuest),
	),
)); */?>
<?php /*$this->widget('zii.widgets.CMenu',array(
	'items'=>array(
		array('label'=>'Dashboard', 'url'=>array('/site/index')),
		array('label'=>'Graphs', 'url'=>array('/site/page', 'view'=>'graphs'),'itemOptions'=>array('class'=>'icon_chart')),
		array('label'=>'Form', 'url'=>array('/site/page', 'view'=>'forms')),
		array('label'=>'Interface', 'url'=>array('/site/page', 'view'=>'interface')),				
		array('label'=>'Buttons & Icons', 'url'=>array('/site/page', 'view'=>'buttons_and_icons')),
		array('label'=>'Error Pages', 'url'=>array('/site/page', 'view'=>'Demo 404 page')),
	),
)); */?>

<div class="collapse navbar-collapse navbar-ex1-inner">
    <ul class="nav navbar-nav nav-pills">
      <li><a href="<?php print Yii::app()->request->baseUrl.'/site/index';?>"><span class="glyphicon glyphicon-home"></span>&nbsp;Inicio</a></li>
      <li><a href="<?php print Yii::app()->createUrl('/tblsolicitud_materiales/admin');?>"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Registro</a></li>
      <li><a href="<?php print Yii::app()->createUrl('/configuraciones/index');?>"><span class="glyphicon glyphicon-wrench"></span>&nbsp;Configuración</a></li>
	  <li><a href='<?php print Yii::app()->user->ui->logoutUrl;?>'><span class="glyphicon glyphicon-off"></span>&nbsp;Cerrar Sesión</a></li>
	</ul>

  </div> 

<div class="navbar  navbar-fixed" >
	<div class="navbar-inner">
    <div class="container" >

     
          <!-- Be sure to leave the brand out there if you want it shown -->	
          <div class="nav-collapse">
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-left nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                        array('label'=>'<span class="icon-home"></span> Inicio', 'visible'=>!Yii::app()->user->isGuest && Yii::app()->funcion->validarSession(array('Administrador')),'url'=>array('/site/index')),
                    		array('label'=>'<span class="icon-pencil"></span> Registro <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"),
                    				'items'=>array(
                    					    array('label'=>'Unidades de Producción', 'url'=>array('/UnidadesProduccion/admin')),
                    				)),
                    		

                        array('label'=>'Iniciar', 'url'=>array('/cruge/ui/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'<span class="icon-off"></span> Cerrar ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                    ),
                )); ?>
    	</div>
    </div>
	</div>
</div>



<div class="container">
	<div class="span-19">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	<div class="span-5 last">
		<div id="sidebar">
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'<span class="icon icon-sitemap_color">Operaciones</span>',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
		?>	
		
		</div><!-- sidebar -->
	</div>
</div>
<?php $this->endContent(); ?>