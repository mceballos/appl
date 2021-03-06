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
    
        <th align="right"><?php echo $form->label($model, 'nombre'); ?>
    </th>
        <td><?php echo $form->textField($model, 'nombre', array('maxlength' => 20)); ?>
</td>
    
        
    
        <th align="right"><?php echo $form->label($model, 'comuna_provincia_id'); ?>
</th>
        <td><?php echo $form->dropDownList($model, 'comuna_provincia_id', GxHtml::listDataEx(Comuna::model()->findAll(array('condition'=>'estado=1','order'=>'nombre'))), array('prompt' => Yii::t('app', 'All'))); ?>
</td>
    
        <td align="right"><?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?>
</td>
    </tr>
</table>

<?php $this->endWidget(); ?>

</div><!-- search-form --> 