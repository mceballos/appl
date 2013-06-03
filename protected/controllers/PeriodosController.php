<?php

class PeriodosController extends GxController {

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
                'actions'=>array('index','view'),
                'roles'=>array('administrativo'),
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
			'model' => $this->loadModel($id, 'Periodos'),
		));
	}
		

	public function actionCreate() {
		$model = new Periodos;


		if (isset($_POST['Periodos'])) {
			$model->setAttributes($_POST['Periodos']);

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
		$model = $this->loadModel($id, 'Periodos');


		if (isset($_POST['Periodos'])) {
			$model->setAttributes($_POST['Periodos']);

			if ($model->save()) {
				//Cierra la venta Modal
				echo CHtml::script("parent.cerrarModal();");
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
			$this->loadModel($id, 'Periodos')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Requerimiento inválido.'));
	}
	
		
	public function actionIndex() {
		$model = new Periodos('search');
        $model->unsetAttributes();

        if (isset($_GET['Periodos']))
            $model->setAttributes($_GET['Periodos']);
            
        $this->render('index', array(
            'model' => $model,
        ));
	}

	
}