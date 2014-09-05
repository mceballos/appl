<?php

$this->breadcrumbs = array(    
    Yii::t('app', 'Pagos por Compromisos'),
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
        
   
         array(
            'name'=>'fecha_primera_cuota',
            'header'=>'Primera Cuota',
            'value'=>'Yii::app()->dateFormatter->format("y-MM-d",strtotime($data->fecha_primera_cuota))',
        ),
        
        'numero_cuotas',        
        array(
            'header'=>'Cantidad de Cuotas Pagadas',
            'value'=>'$data->cantidadCuotasPagadas'
        ),
        array(
            'header'=>'Cuotas atrasadas',
            'value'=>'$data->cuotasAtrasadas'
        ),
        
        'monto_total',
        //'proceso_periodo_id',
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'header'=>'Opciones',
            'template' => '{update}',
            'afterDelete'=>'function(link,success,data){if(success)mostrarMensajes(data); }',
            'buttons' => array(
                'update' => array(                    
                    'options'=>array(
                        'class'=>'btn-small update'
                    ),'visible'=>'Yii::app()->user->checkAccessChangeData("update")',                 
                )
            ),
            'htmlOptions'=>array('style'=>'width: 80px'),
        ),
    ),
)); ?>
</div>