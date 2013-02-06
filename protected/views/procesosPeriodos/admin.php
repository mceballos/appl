<?php

$this->breadcrumbs = array(
	//$model->label(2) => array('index'),
	Yii::t('app', 'Matriculas'),
);

$this->menu = array(
		//array('label'=>Yii::t('app', 'List') , 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create'), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('procesos-periodos-grid', {
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
	'id' => 'procesos-periodos-grid',
	'dataProvider' => $model->search(),
	//'filter' => $model,
	'columns' => array(
		array(
				'name'=>'alumno_rut',
				'value'=>'GxHtml::valueEx($data->alumnoRut)',
				//'filter'=>GxHtml::listDataEx(Alumnos::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'periodo_id',
				'value'=>'GxHtml::valueEx($data->periodo)',
				//'filter'=>GxHtml::listDataEx(Periodos::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'seccion_grado_id',
				'value'=>'GxHtml::valueEx($data->seccionGrado)',
				//'filter'=>GxHtml::listDataEx(SeccionesGrados::model()->findAllAttributes(null, true)),
				),
		//'estado',
		array(
					'name' => 'pago_pendiente',
					'value' => '($data->pago_pendiente == 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Si\')',
					//'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Si')),
					),
		array(
					'name' => 'promovido',
					'value' => '($data->promovido == 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Si\')',
					//'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Si')),
					),			
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