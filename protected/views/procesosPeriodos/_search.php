<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>
    <table width="100%">
        <tr>
            <th align="right"><label for="ProcesosPeriodos_alumno_rut">Rut del Alumno</label>:</th>
            <td><?php echo $form->textField($model, 'alumno_rut'); ?></td>
            <th align="right"><?php echo $form->label($model, 'pago_pendiente'); ?>:</th>
            <td><?php echo $form->dropDownList($model, 'pago_pendiente', array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Si')), array('prompt' => Yii::t('app', 'Todos'))); ?></td>
            <td align="right"><?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?></td>
        </tr>
    </table>
<?php $this->endWidget(); ?>

</div><!-- search-form -->
