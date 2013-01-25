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
'id',
'nombre',
'porcentaje',
//'estado',
	),
)); ?>
<!-- Boton Volver -->
<div class="limpia"></div>
<div class="row buttons">
	<ul id="yw2" class="MenuOperations">
		<li>
			<?php 
				echo CHtml::link('volver',Yii::app()->request->urlReferrer);	
			?>
		</li>
	</ul>
</div>
<!-- Fin Boton Volver -->

</div>