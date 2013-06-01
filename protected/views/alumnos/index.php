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
    $.fn.yiiGridView.update('alumnos-grid', {
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
    'id' => 'alumnos-grid',
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
            'name'=>'rut',
            'value'=>$model->rut
        ),        
        //'dv',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'fecha_nacimiento',
        'telefono_particular',
        'correo_electronico',
        array(
                'name'=>'apoderado_rut',
                'value'=>'GxHtml::valueEx($data->apoderadoRut)',
                'filter'=>GxHtml::listDataEx(Encargados::model()->findAllAttributes(null, true)),
        ),
        /*
        'lugar_nacimiento',
        'vive_con',
        'direccion_particular',
        'villa_poblacion',
        array(
                'name'=>'comuna_id',
                'value'=>'GxHtml::valueEx($data->comuna)',
                'filter'=>GxHtml::listDataEx(Comuna::model()->findAllAttributes(null, true)),
                ),
        
        
        'colegio_proveniente',
        'ciudad_colegio_id',
        'nombre_isapre',
        'fonasa_tramo',
        'tratamiento_medico',
        'alergico_medicamento',
        'num_hermanos_en_establecimiento',
        'fecha_actualizacion',
        array(
                'name'=>'responsable_actualizacion',
                'value'=>'GxHtml::valueEx($data->responsableActualizacion)',
                'filter'=>GxHtml::listDataEx(Users::model()->findAllAttributes(null, true)),
                ),
        'estado',

        array(
                'name'=>'padre_rut',
                'value'=>'GxHtml::valueEx($data->padreRut)',
                'filter'=>GxHtml::listDataEx(Encargados::model()->findAllAttributes(null, true)),
                ),
        array(
                'name'=>'madre_rut',
                'value'=>'GxHtml::valueEx($data->madreRut)',
                'filter'=>GxHtml::listDataEx(Encargados::model()->findAllAttributes(null, true)),
                ),
        'rut_serie',
        */
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'header'=>'Opciones',
            'template' => '{view}{update} {delete}',
            'afterDelete'=>'function(link,success,data){if(success)mostrarMensajes(data); }',
            'buttons' => array(
                'update' => array(                    
                    'options'=>array(
                        'class'=>'btn-small update'
                    )
                    ,'visible'=>'Yii::app()->user->checkAccessChangeData("update")',
                ),
                'view' => array(                    
                    'options'=>array(
                        'class'=>'btn-small view'
                    )
                ),
                'delete' => array(                    
                    'options'=>array(
                        'class'=>'btn-small delete'
                    )
                    ,'visible'=>'Yii::app()->user->checkAccessChangeData("delete")',
                )
            ),
            'htmlOptions'=>array('style'=>'width: 80px'),
        ),
    ),
)); ?>
</div>