<div class="content">
<div class="form">
<h3> <?php echo $titulo; ?></h3>
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'secciones-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model, 'nombre', array('maxlength' => 200)); ?>
		<?php echo $form->error($model,'nombre'); ?>
		</div><!-- row -->

		<label><?php // echo GxHtml::encode($model->getRelationLabel('seccionesGradoses')); ?></label>
		<?php //echo $form->checkBoxList($model, 'seccionesGradoses', GxHtml::encodeEx(GxHtml::listDataEx(SeccionesGrados::model()->findAllAttributes(null, true)), false, true)); ?>
		
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
<div class="limpia"></div>
</div><!-- form -->
</div>