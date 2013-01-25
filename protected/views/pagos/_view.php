<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('compromiso_detalle_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->compromisoDetalle)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tipo_pago_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->tipoPago)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cheque_numero')); ?>:
	<?php echo GxHtml::encode($data->cheque_numero); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cheque_rut')); ?>:
	<?php echo GxHtml::encode($data->cheque_rut); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cheque_plaza')); ?>:
	<?php echo GxHtml::encode($data->cheque_plaza); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cheque_banco_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->chequeBanco)); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('observaciones')); ?>:
	<?php echo GxHtml::encode($data->observaciones); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tasa_interes_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->tasaInteres)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('interes_cobrado')); ?>:
	<?php echo GxHtml::encode($data->interes_cobrado); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fecha_pago')); ?>:
	<?php echo GxHtml::encode($data->fecha_pago); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('responsable_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->responsable)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cheque_fecha')); ?>:
	<?php echo GxHtml::encode($data->cheque_fecha); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('valor_cuota')); ?>:
	<?php echo GxHtml::encode($data->valor_cuota); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pago_total')); ?>:
	<?php echo GxHtml::encode($data->pago_total); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cheque_serie')); ?>:
	<?php echo GxHtml::encode($data->cheque_serie); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cheque_rut_serie')); ?>:
	<?php echo GxHtml::encode($data->cheque_rut_serie); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('estado')); ?>:
	<?php echo GxHtml::encode($data->estado); ?>
	<br />
	*/ ?>

</div>