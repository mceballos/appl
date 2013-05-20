
<?php

$titulo= Yii::t('app', 'Update') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model));

$this->renderPartial('_form', array(
		'model' => $model,
		'titulo'=>$titulo,
		'modelDetalleCompromiso'=>$modelDetalleCompromiso 
		));
?>