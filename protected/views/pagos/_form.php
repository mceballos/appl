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

		<div class="row">
		<?php echo $form->labelEx($model,'compromiso_detalle_id'); ?>
		<?php echo $form->dropDownList($model, 'compromiso_detalle_id', GxHtml::listDataEx(DetallesCompromisos::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'compromiso_detalle_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'tipo_pago_id'); ?>
		<?php echo $form->dropDownList($model, 'tipo_pago_id', GxHtml::listDataEx(TiposPagos::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'tipo_pago_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cheque_numero'); ?>
		<?php echo $form->textField($model, 'cheque_numero', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'cheque_numero'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cheque_rut'); ?>
		<?php echo $form->textField($model, 'cheque_rut'); ?>
		<?php echo $form->error($model,'cheque_rut'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cheque_plaza'); ?>
		<?php echo $form->textField($model, 'cheque_plaza', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'cheque_plaza'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cheque_banco_id'); ?>
		<?php echo $form->dropDownList($model, 'cheque_banco_id', GxHtml::listDataEx(Bancos::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'cheque_banco_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'observaciones'); ?>
		<?php echo $form->textArea($model, 'observaciones'); ?>
		<?php echo $form->error($model,'observaciones'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'tasa_interes_id'); ?>
		<?php echo $form->dropDownList($model, 'tasa_interes_id', GxHtml::listDataEx(TasasInteres::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'tasa_interes_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'interes_cobrado'); ?>
		<?php echo $form->textField($model, 'interes_cobrado'); ?>
		<?php echo $form->error($model,'interes_cobrado'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'fecha_pago'); ?>
		<?php echo $form->textField($model, 'fecha_pago'); ?>
		<?php echo $form->error($model,'fecha_pago'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'responsable_id'); ?>
		<?php echo $form->dropDownList($model, 'responsable_id', GxHtml::listDataEx(User::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'responsable_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cheque_fecha'); ?>
		<?php echo $form->textField($model, 'cheque_fecha'); ?>
		<?php echo $form->error($model,'cheque_fecha'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'valor_cuota'); ?>
		<?php echo $form->textField($model, 'valor_cuota'); ?>
		<?php echo $form->error($model,'valor_cuota'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'pago_total'); ?>
		<?php echo $form->textField($model, 'pago_total'); ?>
		<?php echo $form->error($model,'pago_total'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cheque_serie'); ?>
		<?php echo $form->textField($model, 'cheque_serie', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'cheque_serie'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cheque_rut_serie'); ?>
		<?php echo $form->textField($model, 'cheque_rut_serie', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'cheque_rut_serie'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->textField($model, 'estado'); ?>
		<?php echo $form->error($model,'estado'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
<div class="limpia"></div>
</div><!-- form -->
<div class="limpia"></div>
</div>