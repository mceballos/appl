<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('alumno_rut')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->alumno_rut), array('view', 'id' => $data->alumno_rut)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('periodo_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->periodo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('seccion_grado_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->seccionGrado)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('pago_pendiente')); ?>:
	<?php echo GxHtml::encode($data->pago_pendiente); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('promovido')); ?>:
	<?php echo GxHtml::encode($data->promovido); ?>
	<br />

</div>