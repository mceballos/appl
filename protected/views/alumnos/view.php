<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(

	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->rut)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('deleteIndex', 'id' => $model->rut), 'confirm'=>'¿Seguro que desea borrar este elemento?')),

);
?>
<div class="form">
<h3><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
array(
            'name'=>'rut',
            'value'=>$model->RutCompleto            
        ),
//'dv',
'rut_serie',
'nombre',
'apellido_paterno',
'apellido_materno',
'fecha_nacimiento',
'lugar_nacimiento',
'num_hermanos_en_establecimiento',
'vive_con',
'direccion_particular',
'villa_poblacion',
array(
	'name' => 'comuna',
	'type' => 'raw',
	'value' => $model->comuna,
	),
'telefono_particular',
'correo_electronico',
'colegio_proveniente',
'ciudad_colegio',
'nombre_isapre',
'fonasa_tramo',
'tratamiento_medico',
'alergico_medicamento',

//'fecha_actualizacion',
//'estado',
array(
            'name'=>'apoderadoRut',
            'value'=>(isset($model->apoderadoRut))?$model->apoderadoRut->RutCompleto:""       
        ),
array(
            'name'=>'padreRut',
            'value'=>(isset($model->padreRut))?$model->padreRut->RutCompleto:""            
        ),
array(
            'name'=>'madreRut',
            'value'=>(isset($model->madreRut))?$model->madreRut->RutCompleto:""            
        ),               
			
	),
)); ?>

</div>