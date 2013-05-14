<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); 
?>
    <table width="100%">
        <tr>
            <td colspan="5"><div class="instruccionesBusqueda">Si lo desea, puede introducir un operador de comparación (<, <=, >, >=, <> or =) al comienzo de cada uno de los valores de su búsqueda para especificar cómo la comparación se debe hacer. </div></td>
        </tr>
        <tr>
            <th align="right"><?php echo $form->label($model, 'tipo_compromiso_id'); ?>:</th>
            <td width="230"><?php echo $form->dropDownList($model, 'tipo_compromiso_id', GxHtml::listDataEx(TiposCompromisos::model()->findAll(array('condition'=>'estado=1'))), array('prompt' => Yii::t('app', 'All'))); ?></td>
            <th align="right"><?php echo $form->label($model, 'medio_pago_id'); ?>:</th>
            <td width="230"><?php echo $form->dropDownList($model, 'medio_pago_id', GxHtml::listDataEx(MediosPagos::model()->findAll(array('condition'=>'estado=1'))), array('prompt' => Yii::t('app', 'All'))); ?></td>
            <td align="right"><?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?></td>
        </tr>
    </table>
		
	<!-- 
	<div class="row">
		<?php //echo $form->label($model, 'compromiso_id_repactacion'); ?>
		<?php //echo $form->textField($model, 'compromiso_id_repactacion'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model, 'observaciones'); ?>
		<?php //echo $form->textArea($model, 'observaciones'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model, 'responsable_id'); ?>
		<?php //echo $form->dropDownList($model, 'responsable_id', GxHtml::listDataEx(Users::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); 
		
		?>
	</div>

	<div class="row">
		<?php //echo $form->label($model, 'evidencia_pdf'); ?>
		<?php //echo $form->textField($model, 'evidencia_pdf', array('maxlength' => 200)); ?>
	</div>



	<div class="row">
		<?php //echo $form->label($model, 'numero_cuotas'); ?>
		<?php //echo $form->textField($model, 'numero_cuotas'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model, 'monto_sin_interes'); ?>
		<?php //echo $form->textField($model, 'monto_sin_interes'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model, 'fecha_primera_cuota'); ?>
		<?php //echo $form->textField($model, 'fecha_primera_cuota'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model, 'monto_total'); ?>
		<?php //echo $form->textField($model, 'monto_total'); ?>
	</div>
	
	<div class="row">
		<?php //echo $form->label($model, 'estado'); ?>
		<?php //echo $form->textField($model, 'estado'); ?>
	</div>
	
  -->


<?php $this->endWidget(); ?>

</div><!-- search-form -->
