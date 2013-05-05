<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Create'),
);
/*
$this->menu = array(
	array('label'=>Yii::t('app', 'List') , 'url' => array('index')),
	array('label'=>Yii::t('app', 'Manage') , 'url' => array('admin')),
);*/
?>


<?php
$titulo= Yii::t('app', 'Create') . ' ' . GxHtml::encode($model->label());

$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create',
		'titulo'=>$titulo
		));
?>