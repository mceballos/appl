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
'fecha_actual',
array(
			'name' => 'tipoCompromiso',
			'type' => 'raw',
			'value' => $model->tipoCompromiso !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->tipoCompromiso)), array('tiposCompromisos/view', 'id' => GxActiveRecord::extractPkValue($model->tipoCompromiso, true))) : null,
			),
'compromiso_id_repactacion',
'observaciones',
array(
			'name' => 'responsable_id',
			'type' => 'raw',
			'value' => $model->responsable_id !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->responsable_id)), array('users/view', 'id' => GxActiveRecord::extractPkValue($model->responsable_id, true))) : null,
			),
'evidencia_pdf',
array(
			'name' => 'tasaInteres',
			'type' => 'raw',
			'value' => $model->tasaInteres !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->tasaInteres)), array('tasasInteres/view', 'id' => GxActiveRecord::extractPkValue($model->tasaInteres, true))) : null,
			),
'numero_cuotas',
'monto_sin_interes',
'fecha_primera_cuota',
'monto_total',
array(
			'name' => 'medioPago',
			'type' => 'raw',
			'value' => $model->medioPago !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->medioPago)), array('mediosPagos/view', 'id' => GxActiveRecord::extractPkValue($model->medioPago, true))) : null,
			),
array(
			'name' => 'procesoPeriodo',
			'type' => 'raw',
			'value' => $model->procesoPeriodo !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->procesoPeriodo)), array('procesosPeriodos/view', 'id' => GxActiveRecord::extractPkValue($model->procesoPeriodo, true))) : null,
			),
'estado',
	),
)); ?>
</div>