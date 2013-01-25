<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(

	array('label'=>Yii::t('app', 'Update') , 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') , 'url'=>'#', 'linkOptions' => array('submit' => array('deleteIndex', 'id' => $model->id), 'confirm'=>'¿Seguro que desea borrar este elemento?')),

);
?>
<div class="form">
<h3><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
'nombre',
//'estado',
	),
)); ?>

<h3><?php echo GxHtml::encode($model->getRelationLabel('compromisoses')); ?></h3>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->compromisoses as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('compromisos/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?></div>