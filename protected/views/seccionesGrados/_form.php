<div class="content">
<div class="form">
<h3> <?php echo $titulo; ?></h3>
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'secciones-grados-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'seccion_id'); ?>
		<?php echo $form->dropDownList($model, 'seccion_id', GxHtml::listDataEx(Secciones::model()->findAll(array('condition'=>'estado=1')))); ?>
		<?php echo $form->error($model,'seccion_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'grado_id'); ?>
		<?php echo $form->dropDownList($model, 'grado_id', GxHtml::listDataEx(Grados::model()->findAll(array('condition'=>'estado=1')))); ?>
		<?php echo $form->error($model,'grado_id'); ?>
		</div><!-- row -->

		<div class="row">
		<?php echo $form->labelEx($model,'alum_max_grado'); ?>
		<?php echo $form->textField($model, 'alum_max_grado',array('maxlength' => 2, 'onkeydown'=>'validarNumeros(event)')); ?>
		<?php echo $form->error($model,'alum_max_grado'); ?>
		</div><!-- row -->

		<label><?php //echo GxHtml::encode($model->getRelationLabel('procesosPeriodoses')); ?></label>
		<?php //echo $form->checkBoxList($model, 'procesosPeriodoses', GxHtml::encodeEx(GxHtml::listDataEx(ProcesosPeriodos::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
<div class="limpia"></div>
</div><!-- form -->
<div class="limpia"></div>
</div>