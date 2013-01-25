<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	//GxHtml::valueEx($model),
);

$this->menu=array(

	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->rut)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('deleteIndex', 'id' => $model->rut), 'confirm'=>'¿Seguro que desea borrar este elemento?')),

);
?>
<div class="form">
<h3><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()); ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
array(
			'name' => 'parentesco',
			'type' => 'raw',
			'value' => $model->parentesco ,
			),
'rut',
//'dv',
'nombre',
'apellido_paterno',
'apellido_materno',
'telefono_laboral',
'telefono_fijo',
'celular',
'direccion_particular',
'villa_poblacion',
array(
			'name' => 'comuna',
			'type' => 'raw',
			'value' => $model->comuna,
			),
'estudios_superiores_anios',
'ocupacion',
'fecha_actualizacion',
array(
			'name' => 'responsable_actualizacion',
			'type' => 'raw',
			'value' => EncargadosController::obtenerNombreUsuario($model->responsable_actualizacion) ,
),			
	),
)); ?>

</div>