<?php

class PagosPorCompromisosController extends GxController {

public function filters() {
    return array(
            'accessControl', 
            );
}

public function accessRules() {
    return array(
            array('allow', 
                'actions'=>array('index','view','update'),
                'roles'=>array('administrativo'),
                ),          
            array('deny', 
                'users'=>array('*'),
                ),
            );
}

	public function actionView($id) {
	    $this->layout = '//layouts/iframe';
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Compromisos'),
		));
	}
	
	

	public function actionUpdate($id) {
	    $nombre="";
        $a=Compromisos::model()->findAll(array('condition'=>'t.id='.$id));
        if(isset($a[0])){
            $nombre=$a[0]->procesoPeriodo->alumnoRut->rutNombre;
        }
	    $model = new DetallesCompromisos('search');
        $model->unsetAttributes();
        $model->compromiso_id=$id;
        if (isset($_GET['DetallesCompromisos']))
            $model->setAttributes($_GET['DetallesCompromisos']);            
        //Para mostrar en la ventana modal solo el content
        $this->layout = '//layouts/iframe';    
        $this->render('update', array(
            'model' => $model,
            'nombre'=>$nombre,
        )); 
		/*$model = $this->loadModel($id, 'Compromisos');

		$this->performAjaxValidation($model, 'compromisos-form');

		if (isset($_POST['Compromisos'])) {
			$model->setAttributes($_POST['Compromisos']);

			if ($model->save()) {
			    DetallesCompromisos::model()->deleteAll('compromiso_id=:compromiso_id',array(':compromiso_id'=>$model->id));
			    $cuotas = $model->numero_cuotas;
                $montoTotal = $model->monto_total;
                $valorCuota = (($montoTotal / $cuotas )-1);
                $valorCuota = round($valorCuota);
                $sum = 0;
                for ( $num = 1 ; $num <= $cuotas ; $num ++) {                    
                    if($num==$cuotas){
                        $valorCuota = $montoTotal - $sum;
                    }
                    $sum= $sum + $valorCuota;
                    $fPrimera = $model->fecha_primera_cuota;
                    //$f= date("j-n-Y",strtotime($fPrimera." + ".$num." month"));       

                    //$fecha = date('Y-m-j');
                    $sumaMes= $num-1;
                    $nuevafecha = strtotime ( '+'.$sumaMes.' month' , strtotime ( $fPrimera  ) ) ;
                    $nuevafecha = date ( 'Y-m-j' , $nuevafecha );

                        $d = new DetallesCompromisos;
                        $d->compromiso_id = $model->id;
                        $d->cuota_numero = $num;
                        $d->fecha_vencimiento =$nuevafecha;
                        $d->monto_cuota = $valorCuota;
                        $d->save();
                
                }
				//Cierra la venta Modal
				echo CHtml::script("parent.cerrarModal();");
				//$this->redirect(array('view', 'id' => $model->id));
			}
		}
		
		//Para mostrar en la ventana modal solo el content
		$this->layout = '//layouts/iframe';
		
		$this->render('update', array(
				'model' => $model,
				));*/
	   
	}

		
	public function actionIndex() {	
		$model = new Compromisos('search');
		$model->unsetAttributes();

		if (isset($_GET['Compromisos']))
			$model->setAttributes($_GET['Compromisos']);        
		$this->render('index', array(
			'model' => $model,
		));
	}

}