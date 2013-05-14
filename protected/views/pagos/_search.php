<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

    <table width="100%">
        <tr>
            <td colspan="4"><div class="instruccionesBusqueda">Si lo desea, puede introducir un operador de comparación (<, <=, >, >=, <> or =) al comienzo de cada uno de los valores de su búsqueda para especificar cómo la comparación se debe hacer. </div></td>
        </tr>
        <tr>
            <th align="right"><?php echo $form->label($model, 'tipo_pago_id'); ?>:</th>
            <td><?php echo $form->dropDownList($model, 'tipo_pago_id', GxHtml::listDataEx(TiposPagos::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?></td>
            <th align="right"><?php echo $form->label($model, 'cheque_banco_id'); ?>:</th>
            <td><?php echo $form->dropDownList($model, 'cheque_banco_id', GxHtml::listDataEx(Bancos::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?></td>
        </tr>
        <tr>
            <th align="right"><?php echo $form->label($model, 'cheque_rut_serie'); ?>:</th>
            <td><?php echo $form->textField($model, 'cheque_rut_serie', array('maxlength' => 20)); ?></td>
            <td></td>
            <td align="right"><?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?></td>
        </tr>
    </table>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
