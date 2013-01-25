<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'seccion_id'); ?>
		<?php echo $form->dropDownList($model, 'seccion_id', GxHtml::listDataEx(Secciones::model()->findAll(array('condition'=>'estado=1'))), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'grado_id'); ?>
		<?php echo $form->dropDownList($model, 'grado_id', GxHtml::listDataEx(Grados::model()->findAll(array('condition'=>'estado=1'))), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'alum_max_grado'); ?>
		<?php echo $form->textField($model, 'alum_max_grado'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
