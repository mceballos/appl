<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'rut'); ?>
		<?php echo $form->textField($model, 'rut'); ?>
	</div>



	<div class="row">
		<?php echo $form->label($model, 'nombre'); ?>
		<?php echo $form->textField($model, 'nombre', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'apellido_paterno'); ?>
		<?php echo $form->textField($model, 'apellido_paterno', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'apellido_materno'); ?>
		<?php echo $form->textField($model, 'apellido_materno', array('maxlength' => 50)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model, 'comuna_id'); ?>
		<?php echo $form->dropDownList($model, 'comuna_id', GxHtml::listDataEx(Comuna::model()->findAll(array('order'=>'nombre'),array('condition'=>'estado=1'))), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model, 'telefono_laboral'); ?>
		<?php echo $form->textField($model, 'telefono_laboral', array('maxlength' => 12)); ?>
	</div>
	<!--
	<div class="row">
		<?php //echo $form->label($model, 'telefono_fijo'); ?>
		<?php //echo $form->textField($model, 'telefono_fijo', array('maxlength' => 12)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model, 'celular'); ?>
		<?php //echo $form->textField($model, 'celular', array('maxlength' => 12)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model, 'direccion_particular'); ?>
		<?php //echo $form->textField($model, 'direccion_particular', array('maxlength' => 200)); ?>

	 
	<div class="row">
		<?php //echo $form->label($model, 'dv'); ?>
		<?php //echo $form->textField($model, 'dv', array('maxlength' => 1)); ?>
	</div>
	<div class="row">
		<?php //echo $form->label($model, 'villa_poblacion'); ?>
		<?php //echo $form->textField($model, 'villa_poblacion', array('maxlength' => 200)); ?>
	</div>



	<div class="row">
		<?php //echo $form->label($model, 'fecha_actualizacion'); ?>
		<?php //echo $form->textField($model, 'fecha_actualizacion'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model, 'responsable_actualizacion'); ?>
		<?php //echo $form->textField($model, 'responsable_actualizacion'); ?>
	</div>


	<div class="row">
		<?php //echo $form->label($model, 'parentesco_id'); ?>
		<?php //echo $form->dropDownList($model, 'parentesco_id', GxHtml::listDataEx(Parentescos::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model, 'estudios_superiores_anios'); ?>
		<?php //echo $form->textField($model, 'estudios_superiores_anios'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model, 'ocupacion'); ?>
		<?php //echo $form->textField($model, 'ocupacion', array('maxlength' => 50)); ?>
	</div>
 -->
	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
