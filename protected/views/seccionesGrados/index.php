<?php

$this->breadcrumbs = array(
	SeccionesGrados::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . SeccionesGrados::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . SeccionesGrados::label(2), 'url' => array('admin')),
);
?>
<div class="form">
<h3><?php echo GxHtml::encode(SeccionesGrados::label(2)); ?></h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?></div>