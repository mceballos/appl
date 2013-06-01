<?php

class AlumnosController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
	       array('allow', 
                'actions'=>array('delete','create','update'),
                'roles'=>array('administrativo'),
                ),
			array('allow', 
				'actions'=>array('index','view', 'obtenerNombreEncargado','obtenerNombreAlumno'),
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
			'model' => $this->loadModel($id, 'Alumnos'),
		));
	}
	
	
	public function actionCreate() {
		$model = new Alumnos;


		if (isset($_POST['Alumnos'])) {
			$model->setAttributes($_POST['Alumnos']);

			if ($model->save()) {
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
		$model = $this->loadModel($id, 'Alumnos');


		if (isset($_POST['Alumnos'])) {
			$model->setAttributes($_POST['Alumnos']);

			if ($model->save()) {
				//Cierra la venta Modal
				//echo CHtml::script("parent.cerrarModal();");
				echo CHtml::script("parent.location.reload();");
				//$this->redirect(array('view', 'id' => $model->rut));
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
			$this->loadModel($id, 'Alumnos')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Requerimiento inválido.'));
	}
	
		
	public function actionIndex() {
		$model = new Alumnos('search');
        $model->unsetAttributes();

        if (isset($_GET['Alumnos']))
            $model->setAttributes($_GET['Alumnos']);
        
        $this->render('index', array(
            'model' => $model,
        ));
	}

		 
	 /* *************************************************
	 * obtenerNombreEncargado
	 * ------------------------------------------
	 * 
	 * **************************************************/
	public function actionObtenerNombreEncargado($id){
		$concatenado="";
		$encargado = Encargados::model()->find(array('condition'=>'rut='.$id));
		
		if(isset( $encargado['nombre'])){
			$concatenado =	$encargado['nombre'].' '.$encargado['apellido_paterno'].' '.$encargado['apellido_materno'];
		}else{
			$concatenado = "null";
		}
		
        header("Content-type: application/json");
        echo CJSON::encode($concatenado);
        
        
	}	
	
	 /* *************************************************
	 * obtenerNombreAlumno
	 * ------------------------------------------
	 * 
	 * **************************************************/
	public function actionObtenerNombreAlumno($id){
		$concatenado="";
		$alumno = Alumnos::model()->find(array('condition'=>'rut='.$id));
		
		if(isset( $alumno['nombre'])){
			$concatenado =	$alumno['nombre'].' '.$alumno['apellido_paterno'].' '.$alumno['apellido_materno'];
		}else{
			$concatenado = "null";
		}
		
        header("Content-type: application/json");
        echo CJSON::encode($concatenado);
        
        
	}
	

}