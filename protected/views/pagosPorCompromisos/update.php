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
                    'url'=>'$this->grid->controller->createUrl("/pagos/update/", array("id"=>$data->primaryKey))',           
                    'options'=>array(
                        'class'=>'btn-small update formIframe',
                        'onclick'=>'actualizarSRCIframe(this);return false;',
                    )
                )
            ),
            'htmlOptions'=>array('style'=>'width: 80px'),
        ),
    ),
)); ?> 

<div id="iframeModal" style="display:none;height: 461px;">
                <iframe width="100%" height="100%" frameborder="0" scrolling="no">
                    
                </iframe>
</div>
