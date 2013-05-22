<div class="form">
    <h3>Actualizar Pagos por Compromisos</h3>
    
<?php 
    echo '<div><strong>Nombre:</strong> '.$nombre.'</div>';

    $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'detalles-compromisos-grid',
    'dataProvider' => $model->search(),
    'emptyText'=>'Es probable que el alumno se encuentre con crédito o bien fue becado. Favor confirmar en secretaria.', 
    //'filter' => $model,
    'columns' => array(
        'cuota_numero',        
        array(
                'name'=>'fecha_vencimiento',                
                'value'=>'Yii::app()->dateFormatter->format("d MMMM y",strtotime($data->fecha_vencimiento))'
         ),
        array(            
            'header'=>'Cuota pagada',
            'value' => '(isset($data->pagoses[0]))?"Si":"No"',            
            ),
        array(            
            'header'=>'Cuota Atrasada',
            'value' => '($data->cuotaAtrasada)?"Si":"No"',            
            ),
        array(            
            'header'=>'Monto Cuota',
            'value' => '($data->cuotaAtrasada)?$data->monto_cuota_atraso:$data->monto_cuota',            
        ),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'header'=>'Opciones',
            'template' => '{update}{view}{print}',
            'afterDelete'=>'function(link,success,data){if(success)mostrarMensajes(data); }',
            'buttons' => array(
                'update' => array(         
                    'url'=>'$this->grid->controller->createUrl("/pagos/update/", array("id"=>$data->primaryKey))',           
                    'options'=>array(
                        'class'=>'btn-small update formIframe',
                        'onclick'=>'actualizarSRCIframe(this);return false;',
                    ),
                    'visible'=>'(!isset($data->pagoses[0]))'
                ),
                'view' => array(         
                    'url'=>'$this->grid->controller->createUrl("/pagos/view/", array("id"=>$data->primaryKey))',           
                    'options'=>array(
                        'class'=>'btn-small update formIframe',
                        'onclick'=>'actualizarSRCIframe(this);return false;',                        
                    ),
                    'visible'=>'(isset($data->pagoses[0]))'
                ),
                'print' => array(         
                    'url'=>'$this->grid->controller->createUrl("/pagos/comprobante/", array("id"=>$data->primaryKey))',                               
                    'options'=>array(
                        'class'=>'btn-small',                        
                        'target'=>'_blank',
                    ),
                    'visible'=>'(isset($data->pagoses[0]))'
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
