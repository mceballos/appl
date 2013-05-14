
<?php

$titulo= Yii::t('app', 'Update') . ' ' . GxHtml::encode($model->label());

$this->renderPartial('_form', array(
		'model' => $model,
		'titulo'=>$titulo 
		));
?>