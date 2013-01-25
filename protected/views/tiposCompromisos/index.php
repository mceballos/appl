<?php

$this->breadcrumbs = array(
	TiposCompromisos::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create'), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage'), 'url' => array('admin')),
);
?>
<div class="form">
<h3><?php echo GxHtml::encode(TiposCompromisos::label(2)); ?></h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?></div>