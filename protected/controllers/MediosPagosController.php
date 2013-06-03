<?php

class MediosPagosController extends GxController {

public function filters() {
    return array(
            'accessControl', 
            );
}

public function accessRules() {
    return array(
           /*array('allow', 
                'actions'=>array('delete','create','update'),
                'users'=>array('director'),
                ),
            array('allow', 
                'actions'=>array('index','view'),
                'users'=>array('administrativo'),
                ),    */      
            array('deny', 
                'users'=>array('*'),
                ),
            );
}

	public function actionView($id) {
	    //Para mostrar en la ventana modal solo el content
        $this->layout = '//layouts/iframe';
		$this->render('view', array(
			'model' => $this->loadModel($id, 'MediosPagos'),
		));
	}
	
	public function actionCreate() {
		$model = new MediosPagos;


		if (isset($_POST['MediosPagos'])) {
			$model->setAttributes($_POST['MediosPagos']);

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
		$model = $this->loadModel($id, 'MediosPagos');


		if (isset($_POST['MediosPagos'])) {
			$model->setAttributes($_POST['MediosPagos']);

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
			$this->loadModel($id, 'MediosPagos')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Requerimiento inválido.'));
	}
	
		
	public function actionIndex() {
		$model = new MediosPagos('search');
        $model->unsetAttributes();

        if (isset($_GET['MediosPagos']))
            $model->setAttributes($_GET['MediosPagos']);
           
        
        $this->render('index', array(
            'model' => $model,
        ));
	}

	

}