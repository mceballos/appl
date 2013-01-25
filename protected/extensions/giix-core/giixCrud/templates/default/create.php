<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n
\$this->breadcrumbs = array(
	\$model->label(2) => array('index'),
	Yii::t('app', 'Create'),
);\n";
?>

$this->menu = array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url' => array('index')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url' => array('admin')),
);
?>


<?php echo "<?php\n"; ?>
$titulo= Yii::t('app', 'Create') . ' ' . GxHtml::encode($model->label());

$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create',
		'titulo'=>$titulo
		));
<?php echo '?>'; ?>