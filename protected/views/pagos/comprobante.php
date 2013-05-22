<?php
Yii::app()->clientScript->registerScript('habilitar', "
    window.print();    
");
$this->breadcrumbs = array(
    $model->label(2) => array('index'),
    GxHtml::valueEx($model),
);

?>
<div class="form" style="width: 865px;">
<h3>Comprobante de Pago</h3>

<?php 
    $cheque=array();
    if($model->tipoPago->id==2){
     $cheque=array('cheque_numero',
                    'cheque_rut',
                    'cheque_plaza',
                    array(
                        'name' => 'chequeBanco',                                
                        'value' => $model->chequeBanco,
                        ),
                    'cheque_fecha',
                    'cheque_serie',
                    'cheque_rut_serie');   
    }
    $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
            array(
                    'name' => 'cuota_numero',
                    'value' => $model->compromisoDetalle->cuota_numero.' de '.$model->compromisoDetalle->compromiso->numero_cuotas,
                  ),
            array(
                    'name' => 'tipoPago',
                    'value' => $model->tipoPago,
                    ),
               array(
                    'name' => 'descuento',
                    'value' => ($model->descuento==0)?'No':'Si',
                    ),
               array(
                    'name' => 'fecha_vencimiento',
                    'value' => $model->compromisoDetalle->fecha_vencimiento,
                    ),
            'fecha_pago',
            'observaciones',
            'pago_total',
    ),
)); ?> 