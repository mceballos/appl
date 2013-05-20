<?php
Yii::app()->clientScript->registerScript('habilitar', "
    //cambiando alto del iframe
    parent.$('#iframeModal').height($('body').outerHeight(true)+40);
    $('body').css('background-color','#FFF');    
");
$this->breadcrumbs = array(
    $model->label(2) => array('index'),
    GxHtml::valueEx($model),
);

?>
<div class="form" style="width: 865px;">
<h3><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()); ?></h3>

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
                    'name' => 'tipoPago',
                    'value' => $model->tipoPago,
                    ),
               array(
                    'name' => 'descuento',
                    'value' => ($model->descuento==0)?'No':'Si',
                    ),
             'fecha_pago',
            'observaciones',
            'pago_total',
    ),
)); ?> 