<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Index'),
);

$this->menu = array(
		//array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('compromisos-grid', {
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
	'id' => 'compromisos-grid',
	'dataProvider' => $model->search(),
	//'filter' => $model,
	'columns' => array(
		'id',
		array(
			'name'=>'Rut Alumno',
			'value'=>'GxHtml::valueEx($data->procesoPeriodo)',
			'filter'=>GxHtml::listDataEx(ProcesosPeriodos::model()->findAllAttributes(null, true)),
		),	
		//'fecha_actual',
		array(
		'name'=>'fecha_actual',
		'header'=>'Fecha Celebración',
		'value'=>'Yii::app()->dateFormatter->format("y-MM-d",strtotime($data->fecha_actual))',
		),
		
		array(
				'name'=>'tipo_compromiso_id',
				'value'=>'GxHtml::valueEx($data->tipoCompromiso)',
				'filter'=>GxHtml::listDataEx(TiposCompromisos::model()->findAllAttributes(null, true)),
				),
	
		//'compromiso_id_repactacion',
		//'observaciones',
		/*array(
				'name'=>'responsable_id',
				'value'=>'GxHtml::valueEx($data->responsable)',
				'filter'=>GxHtml::listDataEx(Users::model()->findAllAttributes(null, true)),
				),
				*/
		/*
		'evidencia_pdf',
		array(
				'name'=>'tasa_interes_id',
				'value'=>'GxHtml::valueEx($data->tasaInteres)',
				'filter'=>GxHtml::listDataEx(TasasInteres::model()->findAllAttributes(null, true)),
				),
		'numero_cuotas',
		'monto_sin_interes',
		'fecha_primera_cuota',
		'monto_total',
		array(
				'name'=>'medio_pago_id',
				'value'=>'GxHtml::valueEx($data->medioPago)',
				'filter'=>GxHtml::listDataEx(MediosPagos::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'proceso_periodo_id',
				'value'=>'GxHtml::valueEx($data->procesoPeriodo)',
				'filter'=>GxHtml::listDataEx(ProcesosPeriodos::model()->findAllAttributes(null, true)),
				),
		'estado',
		*/
		array(
		'name'=>'fecha_primera_cuota',
		'header'=>'Primera Cuota',
		'value'=>'Yii::app()->dateFormatter->format("y-MM-d",strtotime($data->fecha_primera_cuota))',
		),
		
		'numero_cuotas',
		'monto_total',
		array(
            'class' => 'CButtonColumn',
            'template'=>'{view}{delete}',
            'header' => 'Acción',
            'buttons'=>array(                  

                'view'=>
                        array(    
                            'url'=>'$this->grid->controller->createUrl("ver", array("id"=>$data->id))',                              
                        ),          
            ),   
        ),
	),
)); ?>
</div>