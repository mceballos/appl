<?php

$this->breadcrumbs = array(
    $model->label(2) => array('index'),
    Yii::t('app', 'Manage'),
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


<?php echo GxHtml::link(Yii::t('app', 'Búsqueda Avanzada'), '#', array('class' => 'search-button')); ?>
<div class="search-form">
<?php $this->renderPartial('_search', array(
    'model' => $model,
)); ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.CMenu', array(
                    'items'=>array(array('label'=>'Agregar', 'url'=>array('create'))),
                    'htmlOptions'=>array('class'=>'MenuOperations'),
                ));

?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'pagos-grid',
    'dataProvider' => $model->search(),
    'afterAjaxUpdate'=>'function(id, data){afterAjaxUpdateSuccess();}',
    //'filter' => $model,
    'columns' => array(
        array(
            'header'=>'NÂ°',
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
                    )
                ),
                'delete' => array(                    
                    'options'=>array(
                        'class'=>'btn-small delete'
                    )
                )
            ),
            'htmlOptions'=>array('style'=>'width: 80px'),
        ),
        /*array(
            'class' => 'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'header' => 'AcciÃ³n',
            'buttons'=>array(                  

                'view'=>
                        array(    
                            'url'=>'$this->grid->controller->createUrl("ver", array("id"=>$data->id))',                              
                        ),          
            ),   
        ),*/
    ),
)); ?>
</div>