<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(

	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('deleteIndex', 'id' => $model->id), 'confirm'=>'¿Seguro que desea borrar este elemento?')),

);
?>
<div class="form">
<h3><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
array(
			'name' => 'seccion',
			'type' => 'raw',
			'value' => $model->seccion !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->seccion)), array('secciones/view', 'id' => GxActiveRecord::extractPkValue($model->seccion, true))) : null,
			),
array(
			'name' => 'grado',
			'type' => 'raw',
			'value' => $model->grado !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->grado)), array('grados/view', 'id' => GxActiveRecord::extractPkValue($model->grado, true))) : null,
			),
'id',
//'estado',
'alum_max_grado',
	),
)); ?>

</div>