<?php 
Yii::app()->clientScript->registerScript('ready', "
    paramPeriodo();
");

//Preguntamos si el usuario está logueado
if (Yii::app()->user->id == '0'){
		Yii::app()->request->redirect(Yii::app()->getHomeUrl());
		
}
 
 /* @var $this SiteController */

	$this->pageTitle=Yii::app()->name;

	 Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/apl.js');
	
	
	unset(Yii::app()->session['idPeriodoSelecionado']); //Para eliminar una varibale de sesion
	
?>

<h1>Bienvenido a <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1> 



<?php 

 
	 	echo "<h2>Seleccione el periodo  ";
	
		
		
	
		$periodosEncontrados =  (GxHtml::encodeEx(GxHtml::listDataEx(Periodos::model()->findAll(array('condition'=>'estado=1')))));
		
		//Yii::app()->session['idPeriodoSelecionado'] = '2012';
		//Año actual
		$anio=date('Y');        
		//recorrer con un form generando el select el cual tiene que ser onchage
		echo"<select id='selectPeriodo' class='selectorPeriodo' onchange='paramPeriodo();return false'>";
		foreach ($periodosEncontrados as $key => $value)
		{
		    $selected='';            
		    if(isset($_GET['periodo'])){
		    	if($_GET['periodo']==$value)
		       // if($_GET['periodo']==$value || $anio==$value)
                      $selected='selected="selected"'; 
		    }else{
		        if($anio==$value)
                      $selected='selected="selected"'; 
		    }
            	
			echo "<option value=".$key." ".$selected.">".$value."</option>";
		}
	  	echo"</select> </h2>";
	    
		
	

?>	
	<div id="loadingProcesos" style="width: 140px; height: 40px;display:none;" class="precarga"></div>
		<div class="limpia"></div>
		<div  style='display:none;' class='menusProcesos'></div>
		<div id="contenidoProcesosPrincipal" style='display:none;' class='menusProcesos'>
		  	<a  href="<?php echo Yii::app()->request->baseUrl;?>/procesosPeriodos/"  id="procesoPlanificacionInstitucional" class="etapaPrincipal left"><span class="texto">GESTIÓN DE MATRÍCULA</span></a>
		  		<div class="flechaPrincipal left"></div>
			<a   href="<?php echo Yii::app()->request->baseUrl;?>/compromisos/" id="procesoControlGestion" class="etapaPrincipal left" ><span class="texto">COMPROMISOS</span></a>
				<div class="flechaPrincipal left"></div>
			<a   href="<?php echo Yii::app()->request->baseUrl;?>/pagos/" id="procesoControlGestion" class="etapaPrincipal left" ><span class="texto">PAGOS</span></a>	
		       <div class="limpia"></div>
		</div>
		
			  	<div class="limpia"></div>
