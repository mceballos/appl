<?php

$this->breadcrumbs = array(
	Grados::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . Grados::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . Grados::label(2), 'url' => array('admin')),
);
?>
<div class="form">
<h3><?php echo GxHtml::encode(Grados::label(2)); ?></h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?></div>