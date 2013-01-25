<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'alumno_rut'); ?>
		<?php echo $form->textField($model, 'alumno_rut'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model, 'periodo_id'); ?>
		<?php //echo $form->dropDownList($model, 'periodo_id', GxHtml::listDataEx(Periodos::model()->findAll(array('condition'=>'nombre='.Yii::app()->session['idPeriodoSelecionado'].'  AND estado=1'))), array('prompt' => Yii::t('app', 'Todos'))); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model, 'seccion_grado_id'); ?>
		<?php //echo $form->dropDownList($model, 'seccion_grado_id', GxHtml::listDataEx(SeccionesGrados::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>


	<div class="row">
		<?php echo $form->label($model, 'pago_pendiente'); ?>
		<?php echo $form->dropDownList($model, 'pago_pendiente', array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Si')), array('prompt' => Yii::t('app', 'Todos'))); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
