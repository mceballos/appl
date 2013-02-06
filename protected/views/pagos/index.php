<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "

$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pagos-grid', {
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
	'id' => 'pagos-grid',
	'dataProvider' => $model->search(),
	//'filter' => $model,
	'columns' => array(
		array(
			'header'=>'N°',
			'htmlOptions'=>array('width'=>'30'),
			'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		array(
				'name'=>'compromiso_detalle_id',
				'value'=>'GxHtml::valueEx($data->compromisoDetalle)',
				'filter'=>GxHtml::listDataEx(DetallesCompromisos::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'tipo_pago_id',
				'value'=>'GxHtml::valueEx($data->tipoPago)',
				'filter'=>GxHtml::listDataEx(TiposPagos::model()->findAllAttributes(null, true)),
				),
		'cheque_numero',
		'cheque_rut',
		'cheque_plaza',
		/*
		array(
				'name'=>'cheque_banco_id',
				'value'=>'GxHtml::valueEx($data->chequeBanco)',
				'filter'=>GxHtml::listDataEx(Bancos::model()->findAllAttributes(null, true)),
				),
		'observaciones',
		array(
				'name'=>'tasa_interes_id',
				'value'=>'GxHtml::valueEx($data->tasaInteres)',
				'filter'=>GxHtml::listDataEx(TasasInteres::model()->findAllAttributes(null, true)),
				),
		'interes_cobrado',
		'fecha_pago',
		array(
				'name'=>'responsable_id',
				'value'=>'GxHtml::valueEx($data->responsable)',
				'filter'=>GxHtml::listDataEx(User::model()->findAllAttributes(null, true)),
				),
		'cheque_fecha',
		'valor_cuota',
		'pago_total',
		'cheque_serie',
		'cheque_rut_serie',
		'estado',
		*/
		array(
            'class' => 'CButtonColumn',
            'template'=>'{view}{update}{delete}',
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