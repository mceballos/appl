<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(

	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('deleteIndex', 'id' => $model->id), 'confirm'=>'¿Seguro que desea borrar este elemento?')),

);
?>
<div class="form">
<h3><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
array(
			'name' => 'compromisoDetalle',
			'type' => 'raw',
			'value' => $model->compromisoDetalle !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->compromisoDetalle)), array('detallesCompromisos/view', 'id' => GxActiveRecord::extractPkValue($model->compromisoDetalle, true))) : null,
			),
array(
			'name' => 'tipoPago',
			'type' => 'raw',
			'value' => $model->tipoPago !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->tipoPago)), array('tiposPagos/view', 'id' => GxActiveRecord::extractPkValue($model->tipoPago, true))) : null,
			),
'cheque_numero',
'cheque_rut',
'cheque_plaza',
array(
			'name' => 'chequeBanco',
			'type' => 'raw',
			'value' => $model->chequeBanco !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->chequeBanco)), array('bancos/view', 'id' => GxActiveRecord::extractPkValue($model->chequeBanco, true))) : null,
			),
'observaciones',
array(
			'name' => 'tasaInteres',
			'type' => 'raw',
			'value' => $model->tasaInteres !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->tasaInteres)), array('tasasInteres/view', 'id' => GxActiveRecord::extractPkValue($model->tasaInteres, true))) : null,
			),
'interes_cobrado',
'fecha_pago',
array(
			'name' => 'responsable',
			'type' => 'raw',
			'value' => $model->responsable !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->responsable)), array('users/view', 'id' => GxActiveRecord::extractPkValue($model->responsable, true))) : null,
			),
'cheque_fecha',
'valor_cuota',
'pago_total',
'cheque_serie',
'cheque_rut_serie',
'estado',
	),
)); ?>

</div>