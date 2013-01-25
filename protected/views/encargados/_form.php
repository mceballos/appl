<?php 
$userID = Yii::app()->user->id;
?>
<div class="content">
<div class="form">
<h3> <?php echo $titulo; ?></h3>
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'encargados-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
		<div class="row">
		
		<?php //echo $form->textField($model, 'fecha_actualizacion'); ?>
		
		<?php echo $form->labelEx($model,'responsable_actualizacion'); ?>:
		<?php 
		 	echo '<b>'.EncargadosController::obtenerNombreUsuario($userID).'</b>';
			echo $form->hiddenField($model, 'responsable_actualizacion',array('value'=>''.$userID));
		?>
		
		</div><!-- row -->
	
		<div class="row">
		<?php echo $form->labelEx($model,'parentesco_id'); ?>
		<?php echo $form->dropDownList($model, 'parentesco_id', GxHtml::listDataEx(Parentescos::model()->findAll(array('condition'=>'estado=1')))); ?>
		<?php echo $form->error($model,'parentesco_id'); ?>
		</div><!-- row -->
		
		<div class="row">
		<?php echo $form->labelEx($model,'rut'); ?>
		<?php echo $form->textField($model, 'rut',array('maxlength' => 8,'size'=>11)).'-'.$form->textField($model, 'dv', array('maxlength' => 1,'size'=>2)) ?>
		<?php echo $form->error($model,'rut'); ?>
		<?php echo $form->error($model,'dv'); ?>
		</div><!-- row -->
		
		
		<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model, 'nombre', array('maxlength' => 50,'size'=>40)); ?>
		<?php echo $form->error($model,'nombre'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'apellido_paterno'); ?>
		<?php echo $form->textField($model, 'apellido_paterno', array('maxlength' => 50,'size'=>40)); ?>
		<?php echo $form->error($model,'apellido_paterno'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'apellido_materno'); ?>
		<?php echo $form->textField($model, 'apellido_materno', array('maxlength' => 50,'size'=>40)); ?>
		<?php echo $form->error($model,'apellido_materno'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'telefono_laboral'); ?>
		<?php echo $form->textField($model, 'telefono_laboral', array('maxlength' => 12)); ?>
		<?php echo $form->error($model,'telefono_laboral'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'telefono_fijo'); ?>
		<?php echo $form->textField($model, 'telefono_fijo', array('maxlength' => 12, 'onkeydown'=>'validarNumeros(event)')); ?>
		<?php echo $form->error($model,'telefono_fijo'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'celular'); ?>
		<?php echo $form->textField($model, 'celular', array('maxlength' => 12,'onkeydown'=>'validarNumeros(event)')); ?>
		<?php echo $form->error($model,'celular'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'direccion_particular'); ?>
		<?php echo $form->textField($model, 'direccion_particular', array('maxlength' => 200,'size'=>80)); ?>
		<?php echo $form->error($model,'direccion_particular'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'villa_poblacion'); ?>
		<?php echo $form->textField($model, 'villa_poblacion', array('maxlength' => 200,'size'=>80)); ?>
		<?php echo $form->error($model,'villa_poblacion'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'comuna_id'); ?>
		<?php echo $form->dropDownList($model, 'comuna_id', GxHtml::listDataEx(Comuna::model()->findAll(array('order'=>'nombre'),array('condition'=>'estado=1')))); ?>
		<?php echo $form->error($model,'comuna_id'); ?>
		</div><!-- row -->

		
		<div class="row">
		<?php echo $form->labelEx($model,'estudios_superiores_anios'); ?>
		<?php echo $form->textField($model, 'estudios_superiores_anios', array('maxlength' => 2,'size'=>5,'onkeydown'=>'validarNumeros(event)')); ?>
		<?php echo $form->error($model,'estudios_superiores_anios'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ocupacion'); ?>
		<?php echo $form->textField($model, 'ocupacion', array('maxlength' => 50,'size'=>40)); ?>
		<?php echo $form->error($model,'ocupacion'); ?>
		</div><!-- row -->

		<label><?php //echo GxHtml::encode($model->getRelationLabel('alumnoses')); ?></label>
		<?php //echo $form->checkBoxList($model, 'alumnoses', GxHtml::encodeEx(GxHtml::listDataEx(Alumnos::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php //echo GxHtml::encode($model->getRelationLabel('alumnoses1')); ?></label>
		<?php //echo $form->checkBoxList($model, 'alumnoses1', GxHtml::encodeEx(GxHtml::listDataEx(Alumnos::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php //echo GxHtml::encode($model->getRelationLabel('alumnoses2')); ?></label>
		<?php //echo $form->checkBoxList($model, 'alumnoses2', GxHtml::encodeEx(GxHtml::listDataEx(Alumnos::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
<div class="limpia"></div>
</div><!-- form -->
<div class="limpia"></div>
</div>