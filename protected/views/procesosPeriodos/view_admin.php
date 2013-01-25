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
			'value' => $model->alumnoRut,
			),
array(
			'name' => 'periodo',
			'type' => 'raw',
			'value' => $model->periodo,
			),
array(
			'name' => 'seccionGrado',
			'type' => 'raw',
			'value' => $model->seccionGrado,
			),
//'estado',
//'pago_pendiente:boolean',
//'promovido:boolean',	
	
array(
            'name'=>'pago_pendiente',
            'value'=>(($model->pago_pendiente===0)?"No":"Si"),
),
			
array(
            'name'=>'promovido',
            'value'=>(($model->promovido===0)?"No":"Si"),
),
			

	),
)); ?>


<!-- Fin Boton Volver -->

</div>