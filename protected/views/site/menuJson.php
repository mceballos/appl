<?php 
/* Formato Json
  {
    "procesos".$id: [
        {
            "idDiv": "procesoPlanificacionInstitucional",
            "activo": "0"
        },
        {
            "idDiv": "procesoControlGestion",
            "activo": "1"
        },
        {
            "idDiv": "n",
            "activo": "1/0"
        }
    ],
    "anio": "2012"
}
*/

//Consultamos por el anio del proceso asociado al ID
$wherePeriodoProcesos = Periodos::model()->find("id =".$id);

Yii::app()->session['idPeriodoSelecionado']=$wherePeriodoProcesos->nombre;
Yii::app()->session['idPeriodo']=$wherePeriodoProcesos->id;
//Periodo a consultar (id)
//$whereActivacionProceso = ActivacionProceso::model()->findAll("periodo_id =".$id); 

//Obtenemos la fecha actual
$fechaHoy= date("Y-m-d H:i:s");
//Asignamos la fecha Actual
$hoy=strtotime($fechaHoy);

//Declaramos el arreglo
$procesos = array();
				
	/*			
foreach ($whereActivacionProceso as $indice => $valor) {
	//Fecha Inicio del proceso
	$inicio = strtotime($valor->inicio);
	//Fecha Fin del proceso
	$fin 	= strtotime($valor->fin);	
	
	$activo = null;			
	//La fecha de $fin tiene que ser menor a la fecha de hoy para que el proceso esté activo
	if($hoy  <= $fin){
		//$inicio debe ser mayor = a la fecha de hoy para que el proceso esté activo
		if ($hoy >= $inicio){
			$activo= '1';
		}else 
			$activo='2';
	}else {
		$activo= '0';
	}

	//Agregamos al arreglo $procesos el contenido
	array_push($procesos, array('idDiv'=>$valor->nombre_contenedor,'activo'=>$activo));
}
	*/			
//$value = array('procesos' => $procesos, 'anio' => $wherePeriodoProcesos['descripcion']);
$value = array('anio' => $wherePeriodoProcesos['nombre']);
$output = CJSON::encode($value);
//CJSON::decode($array)

 
print($output);
 

?>