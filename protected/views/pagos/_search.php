<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'compromiso_detalle_id'); ?>
		<?php echo $form->dropDownList($model, 'compromiso_detalle_id', GxHtml::listDataEx(DetallesCompromisos::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tipo_pago_id'); ?>
		<?php echo $form->dropDownList($model, 'tipo_pago_id', GxHtml::listDataEx(TiposPagos::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cheque_numero'); ?>
		<?php echo $form->textField($model, 'cheque_numero', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cheque_rut'); ?>
		<?php echo $form->textField($model, 'cheque_rut'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cheque_plaza'); ?>
		<?php echo $form->textField($model, 'cheque_plaza', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cheque_banco_id'); ?>
		<?php echo $form->dropDownList($model, 'cheque_banco_id', GxHtml::listDataEx(Bancos::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'observaciones'); ?>
		<?php echo $form->textArea($model, 'observaciones'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tasa_interes_id'); ?>
		<?php echo $form->dropDownList($model, 'tasa_interes_id', GxHtml::listDataEx(TasasInteres::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'interes_cobrado'); ?>
		<?php echo $form->textField($model, 'interes_cobrado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fecha_pago'); ?>
		<?php echo $form->textField($model, 'fecha_pago'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'responsable_id'); ?>
		<?php echo $form->dropDownList($model, 'responsable_id', GxHtml::listDataEx(Users::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cheque_fecha'); ?>
		<?php echo $form->textField($model, 'cheque_fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'valor_cuota'); ?>
		<?php echo $form->textField($model, 'valor_cuota'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'pago_total'); ?>
		<?php echo $form->textField($model, 'pago_total'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cheque_serie'); ?>
		<?php echo $form->textField($model, 'cheque_serie', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cheque_rut_serie'); ?>
		<?php echo $form->textField($model, 'cheque_rut_serie', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'estado'); ?>
		<?php echo $form->textField($model, 'estado'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
