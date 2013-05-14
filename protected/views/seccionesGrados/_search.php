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
            <th align="right"><?php echo $form->label($model, 'seccion_id'); ?>:</th>
            <td><?php echo $form->dropDownList($model, 'seccion_id', GxHtml::listDataEx(Secciones::model()->findAll(array('condition'=>'estado=1'))), array('prompt' => Yii::t('app', 'Todas'))); ?></td>
            <th align="right"><?php echo $form->label($model, 'grado_id'); ?>:</th>
            <td><?php echo $form->dropDownList($model, 'grado_id', GxHtml::listDataEx(Grados::model()->findAll(array('condition'=>'estado=1'))), array('prompt' => Yii::t('app', 'Todos'))); ?></td>
        </tr>
        <tr>
            <th align="right"><?php echo $form->label($model, 'alum_max_grado'); ?>:</th>
            <td><?php echo $form->textField($model, 'alum_max_grado'); ?></td>
            <td></td>
            <td align="right"><?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?></td>
        </tr>
    </table>	

<?php $this->endWidget(); ?>

</div><!-- search-form -->
