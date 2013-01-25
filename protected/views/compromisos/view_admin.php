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
			'name' => 'Funcionario Responsable',
			'type' => 'raw',
			'value' => EncargadosController::obtenerNombreUsuario($model->responsable_id),
			),
		array(
			'name' => 'Fecha Celebración Compromiso',
			'type' => 'raw',
			'value' => $model->fecha_actual,
			),
			
	array(
			'name' => 'tipoCompromiso',
			'type' => 'raw',
			'value' => $model->tipoCompromiso,
			),
array(
			'name' => 'Rut Matriculado',
			'type' => 'raw',
			'value' => $model->procesoPeriodo,
			),
//'compromiso_id_repactacion',
'observaciones',

	
array(
			'name' => 'tasaInteres',
			'type' => 'raw',
			'value' => $model->tasaInteres !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->tasaInteres)), array('tasasInteres/ver', 'id' => GxActiveRecord::extractPkValue($model->tasaInteres, true))) : null,
			),
'numero_cuotas',
'monto_sin_interes',
'fecha_primera_cuota',
'monto_total',
array(
			'name' => 'medioPago',
			'type' => 'raw',
			'value' => $model->medioPago ,
			),

//'estado', 
array(
			'name' => 'evidencia_pdf',
			'type' => 'raw',
			'value' => $model->evidencia_pdf !== null ? CHtml::link(GxHtml::encode($model->evidencia_pdf), Yii::app()->baseUrl . '/upload/doc/'.$model->evidencia_pdf):null,
			),
			
	),
)); ?>


</div>