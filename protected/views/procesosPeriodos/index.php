<?php

$this->breadcrumbs = array(
    //$model->label(2) => array('index'),
    Yii::t('app', 'Matriculas'),
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
    'id' => 'procesos-periodos-grid',
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
                //'name'=>'alumno_rut',
                'header'=>'NOMBRE DEL ALUMNO',
                'value'=>'$data->alumnoRut->RutNombre',             
          ),
        array(
                'name'=>'periodo_id',
                'value'=>'GxHtml::valueEx($data->periodo)',             
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
                    ),'visible'=>'Yii::app()->user->checkAccessChangeData("update")',
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