<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<div class="wide form">

<?php echo "<?php \$form = \$this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl(\$this->route),
	'method' => 'get',
)); ?>\n"; ?>
<table width="100%">
        <tr>
            <td colspan="5"><div class="instruccionesBusqueda">Si lo desea, puede introducir un operador de comparación (<, <=, >, >=, <> or =) al comienzo de cada uno de los valores de su búsqueda para especificar cómo la comparación se debe hacer. </div></td>
        </tr>
        <tr>
<?php foreach($this->tableSchema->columns as $column): ?>
<?php
	$field = $this->generateInputField($this->modelClass, $column);
	if (strpos($field, 'password') !== false)
		continue;
?>
		<th align="right"><?php echo "<?php echo \$form->label(\$model, '{$column->name}'); ?>\n"; ?></th>
		<td><?php echo "<?php " . $this->generateSearchField($this->modelClass, $column)."; ?>\n"; ?></td>
	
<?php endforeach; ?>
        <td align="right"><?php echo "<?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?>\n"; ?></td>
    </tr>
</table>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- search-form -->
