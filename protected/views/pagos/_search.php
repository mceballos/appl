<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>


	<div class="row">
		<?php echo $form->label($model, 'tipo_pago_id'); ?>
		<?php echo $form->dropDownList($model, 'tipo_pago_id', GxHtml::listDataEx(TiposPagos::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cheque_banco_id'); ?>
		<?php echo $form->dropDownList($model, 'cheque_banco_id', GxHtml::listDataEx(Bancos::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cheque_rut_serie'); ?>
		<?php echo $form->textField($model, 'cheque_rut_serie', array('maxlength' => 20)); ?>
	</div>


	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
