<?php 
	//Consultamos si hay un periodo selecionado, de lo contrario lo enviamos a la pagina principal
	if(!isset(Yii::app()->session['idPeriodoSelecionado'])){
		$parts = explode('/', Yii::app()->request->getPathInfo());
		//preguntamos si estamos dentro del site, para no redireccionar
		
		// Aqui es necesario insertar los nombres de mantenedores que no requieran el periodo actual
		if($parts[0] !='' && $parts[0]!='site'){
			Yii::app()->request->redirect(Yii::app()->getHomeUrl());	
		}
	}
?>
<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/app.css" /> 
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.alerts.css" rel="stylesheet" type="text/css" /> 
     <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>

    <?php $colorbox = $this->widget('application.extensions.colorpowered.JColorBox'); 
        
    Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/mantenedores.js'); 
    Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.alerts.js'); 
    ?>  

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">
    <!-- DIV que se utiliza para llenar el estado de alguna acción... (delete)-->
         <div id="statusMsg"></div>
<!--end DIV statusMsg--> 
    <input type="hidden" id="urlSitioWeb" value="<?php echo Yii::app()->request->baseUrl;?>"/>
	<div id="header">
    </div>
	<div id="main">	    
            <?php if(!Yii::app()->user->isGuest){?>
            <div id="MenuPrincipal">  
                <?php
                $this->widget('bootstrap.widgets.TbNavbar', array(
                                'type'=>'null', // null or 'inverse'
                                'brand'=>'',
                                'brandUrl'=>'#',
                                'collapse'=>false, // requires bootstrap-responsive.css
                                'items'=>array(
                                    array(
                                        'class'=>'bootstrap.widgets.TbMenu',
                                        'items'=>array(
                                            array('label'=>'INICIO', 'url'=>'/'),
                                            array('label'=>'REPORTES', 'url'=>'#', 'items'=>array(
                                                array('label'=>'Reporte 1', 'url'=>'/gastos/'),                                    
                                            )),
                                            array('label'=>'ADMINISTRACIÓN', 'url'=>'#', 'items'=>array(
                                                array('label'=>'Gestión'),
                                                array('label'=>'Usuarios', 'url'=>Yii::app()->request->baseUrl.'/user/admin/'), 
                                                array('label'=>'Periodos', 'url'=>Yii::app()->request->baseUrl.'/periodos/'),
                                                array('label'=>'Matrícula', 'url'=>Yii::app()->request->baseUrl.'/procesosPeriodos'),
                                                '---',
                                                array('label'=>'Mantenedor de Alumnos'),
                                                array('label'=>'Parentescos', 'url'=>Yii::app()->request->baseUrl.'/parentescos/'),                                               
                                                array('label'=>'Padres y Apoderados', 'url'=>Yii::app()->request->baseUrl.'/encargados/'),
                                                array('label'=>'Alumnos', 'url'=>Yii::app()->request->baseUrl.'/alumnos/'),
                                                '---',
                                                array('label'=>'Mantenedor de Cursos'),
                                                array('label'=>'Secciones', 'url'=>Yii::app()->request->baseUrl.'/secciones/'),
                                                array('label'=>'Grados Para Secciones', 'url'=>Yii::app()->request->baseUrl.'/grados/'),
                                                array('label'=>'Gestor de Cursos', 'url'=>Yii::app()->request->baseUrl.'/seccionesGrados'),
                                                '---',
                                                array('label'=>'Otras Preferencias'),
                                                array('label'=>'Tipos de Compromisos', 'url'=>Yii::app()->request->baseUrl.'/tiposcompromisos'),
                                                array('label'=>'Medios de Pago', 'url'=>Yii::app()->request->baseUrl.'/mediospagos/'),
                                                array('label'=>'Tasa de Interes Anual', 'url'=>Yii::app()->request->baseUrl.'/tasasinteres/'),
                                                array('label'=>'Comunas', 'url'=>Yii::app()->request->baseUrl.'/comuna/'),
                                                
                                                //array('label'=>'LIST HEADER'),
                                                '---',                 
                                            )),
                                        ),
                                    ),        
                                    array(
                                        'class'=>'bootstrap.widgets.TbMenu',
                                        'htmlOptions'=>array('class'=>'pull-right'),
                                        'items'=>array(
                                            '---',
                                        ),
                                    ),
                                ),
                            )); 
                
                ?>

             <div class=" sesion right"> Bienvenido <?php echo Yii::app()->user->name;?> <a href="<?php echo Yii::app()->request->baseUrl;?>/user/logout">Cerrar sesión </a></div>
             </div> 
             <?php }else{
                 echo "<div class='menuIndex'></div> ";
             } ?>
          
	    
	    <?php	    
	    $listExceptController= array('site','preferencias');
        $controllerName = Yii::app()->controller->id;
          
	       if(isset(Yii::app()->session['idPeriodoSelecionado'])){
	           $anio=Yii::app()->session['idPeriodoSelecionado'];
               //Se debe dejar el espacio en blanco al lado del campo $anio... de lo contrario siempre arrojará "0"
	           $beginningURL=array(' '.$anio=>array('/site?periodo='.$anio));
               if(!in_array($controllerName,$listExceptController)){
                   //echo "Permitido obtener breadcrums";
                                 
               }
	       }else{
	           $beginningURL=array();
	       }       
       
	   if(isset($this->breadcrumbs) && !Yii::app()->user->isGuest):?>
    	        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
    	            'links'=>array_merge((array)$beginningURL, (array)$this->breadcrumbs),
    	            'homeLink' => CHtml::link('Inicio', Yii::app()->homeUrl),
    	             
    	        ));
	        ?><!-- breadcrumbs -->

	    <?php endif;?>	       
	     
	     
	    <?php echo $content; ?>

	   
	    <div class="clear"></div>
        </div> <!-- End-main -->
    <div id="footer">
       <a href="http://www.gnu.org/licenses/gpl-3.0-standalone.html" target="_blank"><img border="0" class="left" src="<?php echo Yii::app()->request->baseUrl;?>/images/gplv3-127x51.png" /></a>           
    	Marcelo Ceballos Pavez <br>
    	- 2013 -
    </div><!-- footer -->

</div><!-- contenedor -->

</body>
</html>
