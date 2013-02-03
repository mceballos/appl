<?php

$this->breadcrumbs = array(
	 'Reportes'
);
?>
<div class="fieldset amarillo parametros" >
	<h2>Reportes</h2>
		<div class="amarilloClaro" id="reportes">
		<a  class="etapa2 blanco left" href="<?php echo Yii::app()->request->baseUrl;?>/reportes/alumnoCursos">Alumnos Por curso</a>
		<a  class="etapa2 blanco left" href="<?php echo Yii::app()->request->baseUrl;?>/reportes/ctaCorriente">Cuenta Corriente del Alumno</a>
	</div>	
</div>
