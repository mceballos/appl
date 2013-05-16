<div class="form">
    <h3>Actualizar Pagos por Compromisos</h3>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'detalles-compromisos-grid',
    'dataProvider' => $model->search(),
    //'filter' => $model,
    'columns' => array(
        'cuota_numero',
        'fecha_vencimiento',
        array(            
            'header'=>'Cuota pagada',
            'value' => '($data->estado_pago) ?"Si":"No"',            
            ),       
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'header'=>'Opciones',
            'template' => '{update}',
            'afterDelete'=>'function(link,success,data){if(success)mostrarMensajes(data); }',
            'buttons' => array(
                'update' => array(                    
                    'options'=>array(
                        'class'=>'btn-small update'
                    )
                )
            ),
            'htmlOptions'=>array('style'=>'width: 80px'),
        ),
    ),
)); ?> 
