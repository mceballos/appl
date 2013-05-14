<?php

class PagosController extends GxController {


	public function actionView($id) {
	    //Para mostrar en la ventana modal solo el content
        $this->layout = '//layouts/iframe';
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Pagos'),
		));
	}
	
	
	public function actionCreate() {
		$model = new Pagos;


		if (isset($_POST['Pagos'])) {
			$model->setAttributes($_POST['Pagos']);

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
		$model = $this->loadModel($id, 'Pagos');


		if (isset($_POST['Pagos'])) {
			$model->setAttributes($_POST['Pagos']);

			if ($model->save()) {
				//Cierra la venta Modal
				//echo CHtml::script("parent.cerrarModal();");
				echo CHtml::script("parent.location.reload();");
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
			$this->loadModel($id, 'Pagos')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Requerimiento inválido.'));
	}
	
	
	public function actionIndex() {
		$model = new Pagos('search');
		$model->unsetAttributes();

		if (isset($_GET['Pagos']))
			$model->setAttributes($_GET['Pagos']);

		$this->render('index', array(
			'model' => $model,
		));
	}

}