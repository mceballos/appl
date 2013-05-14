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
            <th align="right"><label for="ProcesosPeriodos_alumno_rut">Rut del Alumno</label>:</th>
            <td width="180"><?php echo $form->textField($model, 'alumno_rut',array('style'=>'width:85px','maxlength' => 8,'size'=>10)); ?>-<input type="text" id="ProcesosPeriodos_dv" name="ProcesosPeriodos[dv]" size="1" maxlength="1"></td>
            <th align="right"><?php echo $form->label($model, 'pago_pendiente'); ?>:</th>
            <td><?php echo $form->dropDownList($model, 'pago_pendiente', array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Si')), array('prompt' => Yii::t('app', 'Todos'))); ?></td>
            <td align="right"><?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?></td>
        </tr>
    </table>
<?php $this->endWidget(); ?>

</div><!-- search-form -->
