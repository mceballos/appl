<?php

class CompromisosController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('index','view','ver'),
				'users'=>array('*'),
				),
			array('allow', 
				'actions'=>array('minicreate', 'create','update'),
				'users'=>array('@'),
				),
			array('allow', 
				'actions'=>array('admin','delete','deleteIndex'),
				'users'=>array('admin'),
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
	
	public function actionCreate() {
		$model = new Compromisos;

		$this->performAjaxValidation($model, 'compromisos-form');

		if (isset($_POST['Compromisos'])) {
			$model->setAttributes($_POST['Compromisos']);
			//$model->documento=CUploadedFile::getInstance($model,'documento');
			//$nombrePDF = str_replace(' ', '_', $model->documento);	
			//$nombrePDF = date("Y_m_d_H:i:s").$nombrePDF;
			//$textoLimpio = preg_replace('([^A-Za-z0-9._])', '', $nombrePDF);
			//$nombrePDF = $textoLimpio;
			//$model->evidencia_pdf = $nombrePDF;

			if ($model->save()) {
				//$model->documento->saveAs(Yii::getPathOfAlias('webroot').'/upload/doc/'.$nombrePDF);
				$cuotas = $model->numero_cuotas;
                if($cuotas>0){
    				$montoTotal = $model->monto_total;
    				$valorCuota = (($montoTotal / $cuotas )-1);
    				$valorCuota = round($valorCuota);
                    $monto_sin_interes=$model->monto_sin_interes;
                    $tasaAtraso=TasasInteres::model()->findAll(array('condition'=>'t.id=2'));
                    $valorCuota_atraso=(($monto_sin_interes*$tasaAtraso[0]->porcentaje)/100)+$monto_sin_interes;
                    $valorCuota_atraso = (($valorCuota_atraso / $cuotas )-1);
                    $valorCuota_atraso = round($valorCuota_atraso);
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
                            $d->monto_cuota_atraso = $valorCuota_atraso;
    						$d->save();
    				
    				}
					
				}
				
				
				
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					//Cierra la venta Modal
					echo CHtml::script("parent.cerrarModal();");
			}
		}
		//Para mostrar en la ventana modal solo el content
		$this->layout = '//layouts/iframe';
		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Compromisos');

		$this->performAjaxValidation($model, 'compromisos-form');

		if (isset($_POST['Compromisos'])) {
			$model->setAttributes($_POST['Compromisos']);
            $cantidadPagos=0;
            if(isset($model->detallesCompromisoses[0])){
                //Validando que no existan pagos ingresados, de lo contrario no debemos dejar actualizar                
                foreach($model->detallesCompromisoses as $a){
                    if(isset($a->pagoses[0])){
                        $cantidadPagos++;
                    }
                }
            }
			if($model->save() && $cantidadPagos==0) {
			    DetallesCompromisos::model()->deleteAll('compromiso_id=:compromiso_id',array(':compromiso_id'=>$model->id));
			    $cuotas = $model->numero_cuotas;
                if($cuotas>0){
                    $montoTotal = $model->monto_total;
                    $valorCuota = (($montoTotal / $cuotas )-1);
                    $valorCuota = round($valorCuota);
                    $monto_sin_interes=$model->monto_sin_interes;
                    $tasaAtraso=TasasInteres::model()->findAll(array('condition'=>'t.id=2'));
                    $valorCuota_atraso=(($monto_sin_interes*$tasaAtraso[0]->porcentaje)/100)+$monto_sin_interes;
                    $valorCuota_atraso = (($valorCuota_atraso / $cuotas )-1);
                    $valorCuota_atraso = round($valorCuota_atraso);
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
                            $d->monto_cuota_atraso = $valorCuota_atraso;
                            $d->save();
                    
                    }
                }else{
                    
                }
				//Cierra la venta Modal
				echo CHtml::script("parent.cerrarModal();");
				//echo CHtml::script("parent.location.reload();");
				//$this->redirect(array('view', 'id' => $model->id));
			}
		}
		
		//Para mostrar en la ventana modal solo el content
		$this->layout = '//layouts/iframe';
		
		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Compromisos')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Requerimiento inválido.'));
	}
	
	public function actionIndex() {
	//public function actionAdmin() {
		$model = new Compromisos('search');
		$model->unsetAttributes();

		if (isset($_GET['Compromisos']))
			$model->setAttributes($_GET['Compromisos']);
		$this->render('index', array(
			'model' => $model,
		));
	}

}