<div class="view">

	<?php //echo GxHtml::encode($data->getAttributeLabel('id')); ?>
	<?php //echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>


	<?php echo GxHtml::encode($data->getAttributeLabel('seccion_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->seccion)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('grado_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->grado)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('alum_max_grado')); ?>:
	<?php echo GxHtml::encode($data->alum_max_grado); ?>
	<br />

</div>