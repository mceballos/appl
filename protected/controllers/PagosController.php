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
                'actions'=>array('index','view','update','comprobante'),
                'roles'=>array('administrativo'),
                ),          
            array('deny', 
                'users'=>array('*'),
                ),
            );
}

	public function actionView($id) {
	    //El id es del Detalle del compromiso
	    $valor_id=Pagos::model()->findAll(array('condition'=>'compromiso_detalle_id='.$id));
        if(isset($valor_id[0])){
            $id=$valor_id[0]->id;
        }else{
            $id=0;
        }
	    //Para mostrar en la ventana modal solo el content
        $this->layout = '//layouts/iframe';
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Pagos'),
		));
	}
	
    public function actionComprobante($id) {
        //El id es del Detalle del compromiso
        $valor_id=Pagos::model()->findAll(array('condition'=>'compromiso_detalle_id='.$id));
        if(isset($valor_id[0])){
            $id=$valor_id[0]->id;
        }else{
            $id=0;
        }
        //Para mostrar en la ventana modal solo el content
        $this->layout = '//layouts/iframe';
        $this->render('comprobante', array(
            'model' => $this->loadModel($id, 'Pagos'),
        ));
    }
    
	
	/*public function actionCreate() {
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
	}*/

	public function actionUpdate($id) {
	    
        $pago=Pagos::model()->findAll(array('condition'=>'t.estado = 1 AND compromiso_detalle_id='.$id));
        $detalleCompromiso=$this->loadModel($id, 'DetallesCompromisos');
        $pagina="create";
        $model = new Pagos;
        if(isset($pago[0])){
            //EXISTE Y DEBE SER UN UPDATE
            $model = $this->loadModel($pago[0]->id, 'Pagos');
            $pagina="update";
        }
        
        if (isset($_POST['Pagos'])) {
            $model->setAttributes($_POST['Pagos']);
            if ($model->save()) {
                 echo CHtml::script("parent.parent.actualizarCierreModal();parent.cerrarPanelIframe();");
            }
        }
        //Para mostrar en la ventana modal solo el content
        $this->layout = '//layouts/iframe';
        $this->render($pagina, array( 'model' => $model,'modelDetalleCompromiso'=>$detalleCompromiso));
		
	}

	/*public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Pagos')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Requerimiento inválido.'));
	}*/
	
	
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