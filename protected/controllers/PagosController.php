<?php

class PagosController extends GxController {

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
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Pagos'),
		));
	}
	
	//Agregado para ver desde la ventana MODAL
	public function actionVer($id) {
		//Para mostrar en la ventana modal solo el content
		$this->layout = '//layouts/iframe';
		
		$this->render('view_admin', array(
			'model' => $this->loadModel($id, 'Pagos'),
		));
	}
	

	public function actionCreate() {
		$model = new Pagos;

		$this->performAjaxValidation($model, 'pagos-form');

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

		$this->performAjaxValidation($model, 'pagos-form');

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
	
	public function actionDeleteIndex($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Pagos')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('index'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Requerimiento inválido.'));
	}
	
	public function actionIndex() {
		$criteria = new CDbCriteria;
		$criteria->compare('estado', 1);
		//Agregado el estado para solo mostrar los activos
		$dataProvider = new CActiveDataProvider('Pagos',
		array(
			'criteria' => $criteria,
		));
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Pagos('search');
		$model->unsetAttributes();

		if (isset($_GET['Pagos']))
			$model->setAttributes($_GET['Pagos']);
			
		//Para mostrar en la ventana modal solo el content
		$this->layout = '//layouts/iframe';	
		$this->render('admin', array(
			'model' => $model,
		));
	}

}