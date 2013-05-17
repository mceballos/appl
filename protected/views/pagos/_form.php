<?php
Yii::app()->clientScript->registerScript('habilitar', "


    $('#Pagos_tipo_pago_id').change(function(){
            if($('#Pagos_tipo_pago_id').val()==2){
                $('.contenidoCheque').show();
            }else{
                $('.contenidoCheque').hide();
            }
            //cambiando alto del iframe
            parent.$('#iframeModal').height($('body').outerHeight(true)+20);
    });
    if($('#Pagos_tipo_pago_id').val()==2){
        $('.contenidoCheque').show();
    }
    //cambiando alto del iframe
    parent.$('#iframeModal').height($('body').outerHeight(true)+20);
    $('body').css('background-color','#FFF');    
");

?>

<div class="form" style="width: 865px;">
<h3> <?php echo $titulo; ?></h3>
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'pagos-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>
    
	<?php echo $form->errorSummary($model); 
	   echo $form->hiddenField($model, 'compromiso_detalle_id',array('value'=>$_GET['id']));
	?>
<table width="100%" border="0" cellspacing="5" cellpadding="5">
    <tr>
        <td style="width: 130px;"><?php echo $form->labelEx($model,'tipo_pago_id'); ?></td>
        <td style="width: 355px;">            
            <?php echo $form->dropDownList($model, 'tipo_pago_id', GxHtml::listDataEx(TiposPagos::model()->findAllAttributes(null, true))); ?>
            <?php echo $form->error($model,'tipo_pago_id'); ?>
        </td>
        <td style="width: 110px;"></td>
        <td>           
            
        </td>
    </tr>
    <tr>        
        <td><?php echo $form->labelEx($model,'pago_total'); ?></td>
        <td>
            <div id="pago_total"></div>
            <?php echo $form->hiddenField($model, 'pago_total',array('value'=>$_GET['id'])); ?>
        </td>
        <td><?php echo $form->labelEx($model,'descuento');?></td>
        <td>
            <?php
                echo $form->dropDownList($model, "descuento", array('No','Si'));
            ?>
        </td>
    </tr>
    <tr>
        <td><?php echo $form->labelEx($model,'observaciones'); ?></td>
        <td colspan="3">
          
            <?php echo $form->textArea($model, 'observaciones', array('style'=>'width: 690px;')); ?>
            <?php echo $form->error($model,'observaciones'); ?>  
        </td>
    </tr>
    <tr class="contenidoCheque">
        <td><?php echo $form->labelEx($model,'cheque_numero'); ?></td>
        <td>            
            <?php echo $form->textField($model, 'cheque_numero', array('maxlength' => 50,'style'=>'width: 205px;')); ?>
            <?php echo $form->error($model,'cheque_numero'); ?>
        </td>
        <td><?php echo $form->labelEx($model,'cheque_rut'); ?></td>
        <td>
            
            <?php echo $form->textField($model, 'cheque_rut', array('style'=>'width: 205px;')); ?>
            <?php echo $form->error($model,'cheque_rut'); ?>
        </td>
    </tr>
    <tr class="contenidoCheque">
        <td><?php echo $form->labelEx($model,'cheque_plaza'); ?></td>
        <td>
            
            <?php echo $form->textField($model, 'cheque_plaza', array('maxlength' => 100,'style'=>'width: 205px;')); ?>
            <?php echo $form->error($model,'cheque_plaza'); ?>
        </td>
        <td><?php echo $form->labelEx($model,'cheque_banco_id'); ?></td>
        <td>
            
            <?php echo $form->dropDownList($model, 'cheque_banco_id', GxHtml::listDataEx(Bancos::model()->findAllAttributes(null, true))); ?>
            <?php echo $form->error($model,'cheque_banco_id'); ?>
        </td>
    </tr>
    
    <tr class="contenidoCheque">
        <td><?php echo $form->labelEx($model,'cheque_fecha'); ?></td>
        <td colspan="3">
            
            <?php //echo $form->textField($model, 'cheque_fecha', array('style'=>'width: 205px;')); 
                $form->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'cheque_fecha',
                        'value' => $model->cheque_fecha,
                        'options' => array(
                            'dateFormat' => 'yy-mm-dd',
                            'monthNames' => array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'),
                            'monthNamesShort' => array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"),
                            'dayNames' => array('Domingo,Lunes,Martes,Miercoles,Jueves,Viernes,Sabado'),
                            'dayNamesMin' => array('Do','Lu','Ma','Mi','Ju','Vi','Sa'),
                            ),
                        ));
                        ; ?>            
            <?php echo $form->error($model,'cheque_fecha'); ?>
        </td>
    </tr>
    
    <tr class="contenidoCheque">
        <td><?php echo $form->labelEx($model,'cheque_serie'); ?></td>
        <td>
            
            <?php echo $form->textField($model, 'cheque_serie', array('maxlength' => 20,'style'=>'width: 205px;')); ?>
            <?php echo $form->error($model,'cheque_serie'); ?>
        </td>
        <td><?php echo $form->labelEx($model,'cheque_rut_serie'); ?></td>
        <td>
            
            <?php echo $form->textField($model, 'cheque_rut_serie', array('maxlength' => 20,'style'=>'width: 205px;')); ?>
            <?php echo $form->error($model,'cheque_rut_serie'); ?>
        </td>
    </tr>
</table>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
echo CHtml::button('Cancelar',array('onclick'=>"window.parent.cerrarModalSinCambios()"));
$this->endWidget();
?>
<div class="limpia"></div>
</div>
