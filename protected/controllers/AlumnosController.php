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
				'actions'=>array('index','view','ver'),
				'users'=>array('*'),
				),
			array('allow', 
				'actions'=>array('minicreate', 'create','update','obtenerNombreEncargado','obtenerNombreAlumno'),
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
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Alumnos'),
		));
	}
	
	//Agregado para ver desde la ventana MODAL
	public function actionVer($id) {
		//Para mostrar en la ventana modal solo el content
		$this->layout = '//layouts/iframe';
		
		$this->render('view_admin', array(
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
	
	public function actionDeleteIndex($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Alumnos')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('index'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Requerimiento inválido.'));
	}
	
	public function actionIndex() {
		$criteria = new CDbCriteria;
		$criteria->compare('estado', 1);
		//Agregado el estado para solo mostrar los activos
		$dataProvider = new CActiveDataProvider('Alumnos',
		array(
			'criteria' => $criteria,
		));
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Alumnos('search');
		$model->unsetAttributes();

		if (isset($_GET['Alumnos']))
			$model->setAttributes($_GET['Alumnos']);
			
		//Para mostrar en la ventana modal solo el content
		$this->layout = '//layouts/iframe';	
		$this->render('admin', array(
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
	 * obtenerNombreEncargado
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