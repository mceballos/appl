<div class="content">
<div class="form">
<h3> <?php echo $titulo; ?></h3>
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'procesos-periodos-form',
	'enableAjaxValidation' => false,
));


?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

<table width="100%" border="0" cellspacing="5" cellpadding="5">
        <tr>
            <td align="right"></td>
            <td></td>
        </tr>
</table>
		<div class="row">
		<?php echo $form->labelEx($model,'alumno_rut'); ?>
		<?php //echo $form->dropDownList($model, 'alumno_rut', GxHtml::listDataEx(Alumnos::model()->findAllAttributes(null, true))); 
			echo $form->textField($model, 'alumno_rut',array('maxlength' => 8,'size'=>10,'onkeydown'=>'validarNumeros(event)','onkeypress'=>'validarRutNombreAlumnoEnter(event,this.value,"nombreAlumno")'));
			
		?>
		<strong id='nombreAlumno'>Ej:10341341</strong>
		
		<?php echo $form->error($model,'alumno_rut'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'periodo_id'); 
			  echo ':  <b>'.Yii::app()->session['idPeriodoSelecionado'].'</b>';
			  echo $form->hiddenField($model,'periodo_id',array('value'=>''.Yii::app()->session['idPeriodo']));
		?>
		
		<?php //echo $form->dropDownList($model, 'periodo_id', GxHtml::listDataEx(Periodos::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'periodo_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'seccion_grado_id'); ?>
		<?php echo $form->dropDownList($model, 'seccion_grado_id', GxHtml::listDataEx(SeccionesGrados::model()->findAll(array('condition'=>'estado=1')))); ?>
		<?php echo $form->error($model,'seccion_grado_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'pago_pendiente'); ?> :
		<?php echo $form->checkBox($model, 'pago_pendiente'); ?>
		<?php echo $form->error($model,'pago_pendiente'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'promovido'); ?> :
		<?php echo $form->checkBox($model, 'promovido'); ?>
		<?php echo $form->error($model,'promovido'); ?>
		</div><!-- row -->

		
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
<div class="limpia"></div>
</div><!-- form -->
<div class="limpia"></div>
</div>