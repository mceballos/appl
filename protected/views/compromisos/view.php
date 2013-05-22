<?php

$this->breadcrumbs = array(
    $model->label(2) => array('index'),
    GxHtml::valueEx($model),
);

$this->menu=array(

    array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
    array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('deleteIndex', 'id' => $model->id), 'confirm'=>'Â¿Seguro que desea borrar este elemento?')),

);
?>
<div class="form">
<h3><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()); ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(        
        /*array(
            'name' => 'Funcionario Responsable',
            'type' => 'raw',
            'value' => EncargadosController::obtenerNombreUsuario($model->responsable_id),
            ),*/
        array(
            'name' => 'Fecha Celebración Compromiso',            
            'value' => Yii::app()->dateFormatter->format("d MMMM y",strtotime($model->fecha_actual)),
            ),
            
    array(
            'name' => 'tipoCompromiso',
            'type' => 'raw',
            'value' => $model->tipoCompromiso,
            ),
array(
            'name' => 'Rut Matriculado',
            'type' => 'raw',
            'value' => $model->procesoPeriodo,
            ),
//'compromiso_id_repactacion',
'observaciones',

    
array(
            'name' => 'tasaInteres',
            'type' => 'raw',
            'value' => $model->tasaInteres,//$model->tasaInteres !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->tasaInteres)), array('tasasInteres/ver', 'id' => GxActiveRecord::extractPkValue($model->tasaInteres, true))) : null,
            ),
'numero_cuotas',
'monto_sin_interes',
array(
            'name' => 'Fecha Primera Cuota',            
            'value' => Yii::app()->dateFormatter->format("d MMMM y",strtotime($model->fecha_primera_cuota)),
            ),
'monto_total',
//'estado', 
            
    ),
)); ?>


</div>