<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

    <table width="100%">
        <tr>
            <td colspan="5"><div class="instruccionesBusqueda">Si lo desea, puede introducir un operador de comparación (<, <=, >, >=, <> or =) al comienzo de cada uno de los valores de su búsqueda para especificar cómo la comparación se debe hacer. </div></td>
        </tr>
        <tr>
            <th align="right"><label for="ProcesosPeriodos_alumno_rut">Rut</label>:</th>
            <td width="180"><?php echo $form->textField($model, 'rut',array('style'=>'width:85px','maxlength' => 8,'size'=>10)); ?>-<input type="text" id="Encargados_dv" name="Encargados[dv]" size="1" maxlength="1"></td>
            <th align="right"><?php echo $form->label($model, 'apellido_paterno'); ?>:</th>
            <td><?php echo $form->textField($model, 'apellido_paterno', array('maxlength' => 50)); ?></td>
            <td align="right"><?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?></td>
        </tr>
    </table>
	<!--<div class="row">
		<?php echo $form->label($model, 'rut'); ?>
		<?php echo $form->textField($model, 'rut'); ?>
	</div>



	<div class="row">
		<?php echo $form->label($model, 'nombre'); ?>
		<?php echo $form->textField($model, 'nombre', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'apellido_paterno'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->label($model, 'apellido_materno'); ?>
		<?php echo $form->textField($model, 'apellido_materno', array('maxlength' => 50)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model, 'comuna_id'); ?>
		<?php echo $form->dropDownList($model, 'comuna_id', GxHtml::listDataEx(Comuna::model()->findAll(array('order'=>'nombre'),array('condition'=>'estado=1'))), array('prompt' => Yii::t('app', 'Todas'))); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model, 'telefono_laboral'); ?>
		<?php echo $form->textField($model, 'telefono_laboral', array('maxlength' => 12)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?>
	</div>-->

<?php $this->endWidget(); ?>

</div><!-- search-form -->
