<div class="view">

	<b><?php echo GxHtml::encode($data->getAttributeLabel('rut')); ?>:</b>
	<?php echo GxHtml::link(GxHtml::encode($data->rut), array('view', 'id' => $data->rut));//.'-'.GxHtml::encode($data->dv) ?>
	<br />
	
	
	<b><?php echo GxHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo GxHtml::encode($data->nombre); ?>
	<br />
	<b><?php echo GxHtml::encode($data->getAttributeLabel('apellido_paterno')); ?>:</b>
	<?php echo GxHtml::encode($data->apellido_paterno); ?>
	<br />
	<b><?php echo GxHtml::encode($data->getAttributeLabel('apellido_materno')); ?>:</b>
	<?php echo GxHtml::encode($data->apellido_materno); ?>
	<br />
	<b><?php echo GxHtml::encode($data->getAttributeLabel('fecha_actualizacion')); ?>:</b>
	<?php echo GxHtml::encode($data->fecha_actualizacion); ?>
	<br />
	<!-- 
	<?php //echo GxHtml::encode($data->getAttributeLabel('telefono_laboral')); ?>
	<?php //echo GxHtml::encode($data->telefono_laboral); ?>
	<br />
	<?php //echo GxHtml::encode($data->getAttributeLabel('telefono_fijo')); ?>
	<?php //echo GxHtml::encode($data->telefono_fijo); ?>
	<br />

	<?php //echo GxHtml::encode($data->getAttributeLabel('celular')); ?>
	<?php //echo GxHtml::encode($data->celular); ?>
	<br />
	<?php //echo GxHtml::encode($data->getAttributeLabel('direccion_particular')); ?>
	<?php //echo GxHtml::encode($data->direccion_particular); ?>
	<br />
	<?php //echo GxHtml::encode($data->getAttributeLabel('villa_poblacion')); ?>
	<?php //echo GxHtml::encode($data->villa_poblacion); ?>
	<br />
	<?php //echo GxHtml::encode($data->getAttributeLabel('comuna_id')); ?>
		<?php //echo GxHtml::encode(GxHtml::valueEx($data->comuna)); ?>
	<br />
	<?php //echo GxHtml::encode($data->getAttributeLabel('responsable_actualizacion')); ?>
	<?php //echo GxHtml::encode($data->responsable_actualizacion); ?>
	<br />
	<?php //echo GxHtml::encode($data->getAttributeLabel('parentesco_id')); ?>
		<?php //echo GxHtml::encode(GxHtml::valueEx($data->parentesco)); ?>
	<br />
	<?php //echo GxHtml::encode($data->getAttributeLabel('estudios_superiores_anios')); ?>
	<?php //echo GxHtml::encode($data->estudios_superiores_anios); ?>
	<br />
	<?php //echo GxHtml::encode($data->getAttributeLabel('ocupacion')); ?>
	<?php //echo GxHtml::encode($data->ocupacion); ?>
	<br />
	 -->

</div>