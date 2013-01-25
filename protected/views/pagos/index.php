<?php

$this->breadcrumbs = array(
	Pagos::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . Pagos::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . Pagos::label(2), 'url' => array('admin')),
);
?>
<div class="form">
<h3><?php echo GxHtml::encode(Pagos::label(2)); ?></h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?></div>