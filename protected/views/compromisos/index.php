<?php

$this->breadcrumbs = array(
    //$model->label(2) => array('index'),
    Yii::t('app', 'Compromisos'),
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

<?php echo GxHtml::link(Yii::t('app', 'Búsqueda Avanzada'), '#', array('class' => 'search-button')); ?>
<div class="search-form">
<?php $this->renderPartial('_search', array(
    'model' => $model,
)); ?>
</div><!-- search-form -->

<?php
        if(Yii::app()->user->checkAccessChangeData("create"))
                $this->widget('zii.widgets.CMenu', array(
                    'items'=>array(array('label'=>'Agregar', 'url'=>array('create'))),
                    'htmlOptions'=>array('class'=>'MenuOperations'),
                ));

?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'compromisos-grid',
    'dataProvider' => $model->search(),
    'afterAjaxUpdate'=>'function(id, data){afterAjaxUpdateSuccess();}',
    //'filter' => $model,
    'columns' => array(
        array(
            'header'=>'N°',
            'htmlOptions'=>array('width'=>'30'),
            'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        ),
        array(
            'name'=>'Rut Alumno',
            'value'=>'$data->procesoPeriodo->alumnoRut->RutCompleto',//'GxHtml::valueEx($data->procesoPeriodo)',
            //'filter'=>GxHtml::listDataEx(ProcesosPeriodos::model()->findAllAttributes(null, true)),
        ),  
        //'fecha_actual',
        array(
        'name'=>'fecha_actual',
        'header'=>'Fecha Celebración',
        'value'=>'Yii::app()->dateFormatter->format("y-MM-d",strtotime($data->fecha_actual))',
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
        //'proceso_periodo_id',
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'header'=>'Opciones',
            'template' => '{view}{update}{delete}',
            'afterDelete'=>'function(link,success,data){if(success)mostrarMensajes(data); }',
            'buttons' => array(
                'view' => array(                    
                    'options'=>array(
                        'class'=>'btn-small view'
                    )
                ),
                'update' => array(                    
                    'options'=>array(
                        'class'=>'btn-small update'
                    ),
                    'visible'=>'($data->cantidadCuotasPagadas==0)&&(Yii::app()->user->checkAccessChangeData("update"))',
                ),
                'delete' => array(                    
                    'options'=>array(
                        'class'=>'btn-small delete'
                    ),'visible'=>'Yii::app()->user->checkAccessChangeData("delete")',
                )
            ),
            'htmlOptions'=>array('style'=>'width: 80px'),
        ),
    ),
)); ?>
</div>