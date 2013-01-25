<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(

	array('label'=>Yii::t('app', 'Update'), 'url'=>array('update', 'id' => $model->alumno_rut)),
	array('label'=>Yii::t('app', 'Delete'), 'url'=>'#', 'linkOptions' => array('submit' => array('deleteIndex', 'id' => $model->alumno_rut), 'confirm'=>'¿Seguro que desea borrar este elemento?')),

);
?>
<div class="form">
<h3><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
array(
			'name' => 'alumnoRut',
			'type' => 'raw',
			'value' => $model->alumnoRut !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->alumnoRut)), array('alumnos/view', 'id' => GxActiveRecord::extractPkValue($model->alumnoRut, true))) : null,
			),
array(
			'name' => 'periodo',
			'type' => 'raw',
			'value' => $model->periodo !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->periodo)), array('periodos/view', 'id' => GxActiveRecord::extractPkValue($model->periodo, true))) : null,
			),
array(
			'name' => 'seccionGrado',
			'type' => 'raw',
			'value' => $model->seccionGrado !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->seccionGrado)), array('seccionesGrados/view', 'id' => GxActiveRecord::extractPkValue($model->seccionGrado, true))) : null,
			),
//'estado',
'pago_pendiente:boolean',
'promovido',
	),
)); ?>

</div>