<?php

$this->breadcrumbs = array(
	
	Yii::t('ui','Preferencias')=>array('/site/preferencias'),	
	Yii::t('app',Parentescos::label(2)),
	
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . Parentescos::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . Parentescos::label(2), 'url' => array('admin')),
);
?>
<div class="form">
<h3><?php echo GxHtml::encode(Parentescos::label(2)); ?></h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?></div>