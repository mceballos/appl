<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('fecha_actual')); ?>:
	<?php echo GxHtml::encode($data->fecha_actual); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tipo_compromiso_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->tipoCompromiso)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('compromiso_id_repactacion')); ?>:
	<?php echo GxHtml::encode($data->compromiso_id_repactacion); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('observaciones')); ?>:
	<?php echo GxHtml::encode($data->observaciones); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('responsable_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->responsable)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('evidencia_pdf')); ?>:
	<?php echo GxHtml::encode($data->evidencia_pdf); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('tasa_interes_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->tasaInteres)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('numero_cuotas')); ?>:
	<?php echo GxHtml::encode($data->numero_cuotas); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('monto_sin_interes')); ?>:
	<?php echo GxHtml::encode($data->monto_sin_interes); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fecha_primera_cuota')); ?>:
	<?php echo GxHtml::encode($data->fecha_primera_cuota); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('monto_total')); ?>:
	<?php echo GxHtml::encode($data->monto_total); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('medio_pago_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->medioPago)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('proceso_periodo_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->procesoPeriodo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('estado')); ?>:
	<?php echo GxHtml::encode($data->estado); ?>
	<br />
	*/ ?>

</div>