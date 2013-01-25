<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('alumnos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="form">
<h3><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h3>

<p>
	Si lo desea, puede introducir un operador de comparación (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) al comienzo de cada uno de los valores de su búsqueda para especificar cómo la comparación se debe hacer.
</p>

<?php echo GxHtml::link(Yii::t('app', 'Búsqueda Avanzada'), '#', array('class' => 'search-button')); ?>
<div class="search-form">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'alumnos-grid',
	'dataProvider' => $model->search(),
	//'filter' => $model,
	'columns' => array(
		'rut',
		//'dv',
		'nombre',
		'apellido_paterno',
		'apellido_materno',
		'fecha_nacimiento',
		'telefono_particular',
		'correo_electronico',
		array(
				'name'=>'apoderado_rut',
				'value'=>'GxHtml::valueEx($data->apoderadoRut)',
				'filter'=>GxHtml::listDataEx(Encargados::model()->findAllAttributes(null, true)),
		),
		/*
		'lugar_nacimiento',
		'vive_con',
		'direccion_particular',
		'villa_poblacion',
		array(
				'name'=>'comuna_id',
				'value'=>'GxHtml::valueEx($data->comuna)',
				'filter'=>GxHtml::listDataEx(Comuna::model()->findAllAttributes(null, true)),
				),
		
		
		'colegio_proveniente',
		'ciudad_colegio_id',
		'nombre_isapre',
		'fonasa_tramo',
		'tratamiento_medico',
		'alergico_medicamento',
		'num_hermanos_en_establecimiento',
		'fecha_actualizacion',
		array(
				'name'=>'responsable_actualizacion',
				'value'=>'GxHtml::valueEx($data->responsableActualizacion)',
				'filter'=>GxHtml::listDataEx(Users::model()->findAllAttributes(null, true)),
				),
		'estado',

		array(
				'name'=>'padre_rut',
				'value'=>'GxHtml::valueEx($data->padreRut)',
				'filter'=>GxHtml::listDataEx(Encargados::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'madre_rut',
				'value'=>'GxHtml::valueEx($data->madreRut)',
				'filter'=>GxHtml::listDataEx(Encargados::model()->findAllAttributes(null, true)),
				),
		'rut_serie',
		*/
		array(
            'class' => 'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'header' => 'Acción',
            'buttons'=>array(                  

                'view'=>
                        array(    
                            'url'=>'$this->grid->controller->createUrl("ver", array("id"=>$data->rut))',                              
                        ),          
            ),   
        ),
	),
)); ?>
</div>