<?php

class EncargadosController extends GxController {

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
	    //Para mostrar en la ventana modal solo el content
        $this->layout = '//layouts/iframe';
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Encargados'),
		));
	}
	
	public function actionCreate() {
		$model = new Encargados;


		if (isset($_POST['Encargados'])) {
			$model->setAttributes($_POST['Encargados']);

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
		$model = $this->loadModel($id, 'Encargados');


		if (isset($_POST['Encargados'])) {
			$model->setAttributes($_POST['Encargados']);

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
			$this->loadModel($id, 'Encargados')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Requerimiento inválido.'));
	}
	
		
	public function actionIndex() {
		$model = new Encargados('search');
        $model->unsetAttributes();

        if (isset($_GET['Encargados']))
            $model->setAttributes($_GET['Encargados']);
        
        $this->render('index', array(
            'model' => $model,
        ));
	}

	 /* *************************************************
	 * ObtenerNombreUsuario
	 * ------------------------------------------
	 * 
	 * **************************************************/
	public static function obtenerNombreUsuario($id){
		
		$usuarioActivo = User::model()->find(array('condition'=>'id='.$id));
	    $usuarioActivoConcatenado =	$usuarioActivo['nombres'].' '.$usuarioActivo['ape_paterno'].' '.$usuarioActivo['ape_materno'].' - '.$usuarioActivo['rut'];
		return $usuarioActivoConcatenado;
	}	
	
	 /* *************************************************
	 * obtenerNombreEncargadoTexto
	 * ------------------------------------------
	 * 
	 * **************************************************/
	public static  function obtenerNombreEncargadoTexto($id){
		$concatenado="";
		$encargado = Encargados::model()->find(array('condition'=>'rut='.$id));
		
		if(isset( $encargado['nombre'])){
			$concatenado =	$encargado['nombre'].' '.$encargado['apellido_paterno'].' '.$encargado['apellido_materno'];
		}else{
			$concatenado = "null";
		}

        return  $concatenado;
        
        
	}
}