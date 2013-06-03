<?php

class ProcesosPeriodosController extends GxController {

public function filters() {
    return array(
            'accessControl', 
            );
}

public function accessRules() {
    return array(
           array('allow', 
                'actions'=>array('delete','create','update'),
                'roles'=>array('director'),
                ),
            array('allow', 
                'actions'=>array('index','view','obtenerMatriculaAlumno'),
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
			'model' => $this->loadModel($id, 'ProcesosPeriodos'),
		));
	}
	
	
	public function actionCreate() {
		$model = new ProcesosPeriodos;


		if (isset($_POST['ProcesosPeriodos'])) {
			$model->setAttributes($_POST['ProcesosPeriodos']);

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
		$model = $this->loadModel($id, 'ProcesosPeriodos');


		if (isset($_POST['ProcesosPeriodos'])) {
			$model->setAttributes($_POST['ProcesosPeriodos']);

			if ($model->save()) {
				//Cierra la venta Modal
				echo CHtml::script("parent.cerrarModal();");
				//$this->redirect(array('view', 'id' => $model->alumno_rut));
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
			$this->loadModel($id, 'ProcesosPeriodos')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Requerimiento inválido.'));
	}
	
	
	
	public function actionIndex() {	
		$model = new ProcesosPeriodos('searchs');
		$model->unsetAttributes();

		if (isset($_GET['ProcesosPeriodos']))
			$model->setAttributes($_GET['ProcesosPeriodos']);
			
		
		$this->render('index', array(
			'model' => $model,
		));
	}
	
	 /* *************************************************
	 * obtenerMatriculaAlumno
	 * ------------------------------------------
	 * 
	 * **************************************************/
	public function actionObtenerMatriculaAlumno($id){
		
		$concatenado="";
		
		
        $model = ProcesosPeriodos::model()->find(array('condition'=>'alumno_rut='.$id.' AND periodo_id ='.Yii::app()->session['idPeriodo'].' AND estado=1'));
		$nombreAlumno ="";
		$idMatricula ="";
		
		if(isset( $model['id'])){
			
			
			$idMatricula=$model['id'];
			
			$alumno = Alumnos::model()->find(array('condition'=>'rut='.$model['alumno_rut']));
			
			if(isset( $alumno['nombre'])){		
				$nombreAlumno =	$alumno['nombre'].' '.$alumno['apellido_paterno'].' '.$alumno['apellido_materno'];
			}
		}
		
		
        header("Content-type: application/json");
        $value = array('matricula' => $idMatricula,'nombre'=>$nombreAlumno);
        
        echo CJSON::encode($value);
        
        
	}
	

}