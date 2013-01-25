<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>

<?php echo "<?php\n"; ?>

$titulo= Yii::t('app', 'Update') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model));

$this->renderPartial('_form', array(
		'model' => $model,
		'titulo'=>$titulo 
		));
?>