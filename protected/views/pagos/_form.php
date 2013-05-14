<div class="content">
<div class="form">
<h3> <?php echo $titulo; ?></h3>
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'pagos-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
<table width="100%" border="0" cellspacing="5" cellpadding="5">
    <tr>
        <td style="width: 130px;"><?php echo $form->labelEx($model,'compromiso_detalle_id'); ?></td>
        <td style="width: 355px;">            
            <?php echo $form->dropDownList($model, 'compromiso_detalle_id', GxHtml::listDataEx(DetallesCompromisos::model()->findAllAttributes(null, true))); ?>
            <?php echo $form->error($model,'compromiso_detalle_id'); ?>
        </td>
        <td style="width: 110px;"><?php echo $form->labelEx($model,'tipo_pago_id'); ?></td>
        <td>            
            <?php echo $form->dropDownList($model, 'tipo_pago_id', GxHtml::listDataEx(TiposPagos::model()->findAllAttributes(null, true))); ?>
            <?php echo $form->error($model,'tipo_pago_id'); ?>
        </td>
    </tr>
    <tr>
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
    <tr>
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
    <tr>
        <td><?php echo $form->labelEx($model,'observaciones'); ?></td>
        <td>
          
            <?php echo $form->textArea($model, 'observaciones', array('style'=>'width: 205px;')); ?>
            <?php echo $form->error($model,'observaciones'); ?>  
        </td>
        <td><?php echo $form->labelEx($model,'tasa_interes_id'); ?></td>
        <td>
            
            <?php echo $form->dropDownList($model, 'tasa_interes_id', GxHtml::listDataEx(TasasInteres::model()->findAllAttributes(null, true))); ?>
            <?php echo $form->error($model,'tasa_interes_id'); ?>
        </td>
    </tr>
    <tr>
        <td><?php echo $form->labelEx($model,'interes_cobrado'); ?></td>
        <td>
            
            <?php echo $form->textField($model, 'interes_cobrado', array('style'=>'width: 205px;')); ?>
            <?php echo $form->error($model,'interes_cobrado'); ?>
        </td>
        <td><?php echo $form->labelEx($model,'fecha_pago'); ?></td>
        <td>
            
            <?php echo $form->textField($model, 'fecha_pago', array('style'=>'width: 205px;')); ?>
            <?php echo $form->error($model,'fecha_pago'); ?>
        </td>
    </tr>
    <tr>
        <td><?php echo $form->labelEx($model,'responsable_id'); ?></td>
        <td>
            
            <?php echo $form->dropDownList($model, 'responsable_id', GxHtml::listDataEx(User::model()->findAll(array('condition'=>'status=1')),'id','nombrecompleto')); ?>
            <?php echo $form->error($model,'responsable_id'); ?>
        </td>
        <td><?php echo $form->labelEx($model,'cheque_fecha'); ?></td>
        <td>
            
            <?php echo $form->textField($model, 'cheque_fecha', array('style'=>'width: 205px;')); ?>
            <?php echo $form->error($model,'cheque_fecha'); ?>
        </td>
    </tr>
    <tr>
        <td><?php echo $form->labelEx($model,'valor_cuota'); ?></td>
        <td>
            
            <?php echo $form->textField($model, 'valor_cuota', array('style'=>'width: 205px;')); ?>
            <?php echo $form->error($model,'valor_cuota'); ?>
        </td>
        <td><?php echo $form->labelEx($model,'pago_total'); ?></td>
        <td>
            
            <?php echo $form->textField($model, 'pago_total', array('style'=>'width: 205px;')); ?>
            <?php echo $form->error($model,'pago_total'); ?>
        </td>
    </tr>
    <tr>
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
$this->endWidget();
?>
<div class="limpia"></div>
</div>
</div>
