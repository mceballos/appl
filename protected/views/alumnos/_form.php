<?php 
	$userID = Yii::app()->user->id;
?>

<div class="content">
<div class="form">
<h3> <?php echo $titulo; ?></h3>
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'alumnos-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>TRUE),
));
?>
	
		
	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>
	
	<?php echo $form->errorSummary($model); ?>
		<?php 
			echo $form->labelEx($model,'responsable_actualizacion'); 		 
		 	echo ': <b>'.EncargadosController::obtenerNombreUsuario($userID).'</b>';
			echo $form->hiddenField($model, 'responsable_actualizacion',array('value'=>''.$userID));
		?>
		<?php echo $form->error($model,'responsable_actualizacion'); ?>
		<br>
		
	<div class="fieldset2">
		<div class="legend">Datos Básicos</div>
		<table width="100%" border="0" cellspacing="5" cellpadding="5">
		<tr>
			<td align="left" style="width: 130px;">
				<?php echo $form->labelEx($model,'rut'); ?>
			</td>
			<td style="width: 300px;">		
				<?php echo $form->textField($model, 'rut',array('maxlength' => 8,'size'=>11)).'-'.$form->textField($model, 'dv', array('maxlength' => 1,'size'=>2)) ?>
				<?php echo $form->error($model,'rut'); ?>
				<?php echo $form->error($model,'dv'); ?>
			</td>	
			<td align="left" style="width: 125px;" >
				<?php echo $form->labelEx($model,'rut_serie'); ?>
			</td>
			<td>	
				<?php echo $form->textField($model, 'rut_serie', array('maxlength' => 20)); ?>
				<?php echo $form->error($model,'rut_serie'); ?>
			</td>
		</tr>

		<tr>
			<td align="left" >
				<?php echo $form->labelEx($model,'nombre'); ?>
			</td>
			<td>		
				<?php echo $form->textField($model, 'nombre', array('maxlength' => 100,'size'=>40)); ?>
				<?php echo $form->error($model,'nombre'); ?>
			</td>	
		</tr>
		
		<tr>
			<td align="left" >
				<?php echo $form->labelEx($model,'apellido_paterno'); ?>
			</td>
			<td>
				<?php echo $form->textField($model, 'apellido_paterno', array('maxlength' => 50,'size'=>40)); ?>
				<?php echo $form->error($model,'apellido_paterno'); ?>
			</td>
		</tr>	
		
		<tr>
			<td align="left" >
				<?php echo $form->labelEx($model,'apellido_materno'); ?>
			</td>
			<td>
				<?php echo $form->textField($model, 'apellido_materno', array('maxlength' => 50,'size'=>40)); ?>
				<?php echo $form->error($model,'apellido_materno'); ?>
			</td>
		</tr>	
		<tr>
			<td align="left" >
				<?php 	echo $form->labelEx($model,'fecha_nacimiento'); 
						 //echo $form->textField($model, 'fecha_nacimiento', array('maxlength' => 10,'size'=>12,'value'=>'2000-12-23','onClick' => 'this.value=""'));
				?>
			</td>
			<td>
				<?php
	            $this->widget('zii.widgets.jui.CJuiDatePicker', array(                
	                'model'=>$model,
	                'attribute'=>'fecha_nacimiento',
	                'language'=>Yii::app()->language=='es' ? 'es' : null,
	                'options'=>array(
	                    'changeMonth'=>'true', 
	                    'changeYear'=>'true',   
	                    'yearRange' => '-99:+2',        
	                    'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
	                    'showOn'=>'focus', // 'focus', 'button', 'both'
	                    'dateFormat'=>'yy-mm-dd', //'dd/mm/yy',yy-mm-dd
	                    'value'=>date('yy-mm-dd'),
	                    'theme'=>'redmond',
	                    'buttonText'=>Yii::t('ui','Selecionar Calendario'), 
	                    'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png', 
	                    'buttonImageOnly'=>true,
	                ),
	                'htmlOptions'=>array(
	                    'style'=>'vertical-align:top;width: 155px;',
	                    'class'=>'span2',
	                ),  
	            ));
	            ?>
	            <?php echo $form->error($model,'fecha_nacimiento'); ?>
            </td>
			<td align="left" >
				<?php echo $form->labelEx($model,'lugar_nacimiento'); ?>
			</td>
			<td>	
				<?php echo $form->textField($model, 'lugar_nacimiento', array('maxlength' => 50)); ?>
				<?php echo $form->error($model,'lugar_nacimiento'); ?>
			</td>
		</tr>		
		
		
		<tr>
			<td align="left" >
				<?php echo $form->labelEx($model,'num_hermanos_en_establecimiento'); ?>
			</td>
			<td>
				<?php echo $form->textField($model, 'num_hermanos_en_establecimiento', array('maxlength' => 2,'size'=>5)); ?>		
				<?php echo $form->error($model,'num_hermanos_en_establecimiento'); ?>
			</td>		
		</tr>
		</table>
		</div> <!-- End FieldSet -->
		
		<div class="fieldset2">
		<div class="legend">Ubicación</div>
		<table width="100%" border="0" cellspacing="5" cellpadding="5">
		<tr>
			<td align="left" style="width: 130px;">
				<?php echo $form->labelEx($model,'vive_con'); ?>
			</td>
			<td align="left" style="width: 300px;">
				<?php echo $form->textField($model, 'vive_con', array('maxlength' => 50)); ?>
				<?php echo $form->error($model,'vive_con'); ?>
			</td>
			<td align="left" style="width: 125px;" >
				<?php echo $form->labelEx($model,'direccion_particular'); ?>
			</td>
			<td>
				<?php echo $form->textField($model, 'direccion_particular', array('maxlength' => 200,'size'=>35)); ?>
				<?php echo $form->error($model,'direccion_particular'); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->labelEx($model,'villa_poblacion'); ?>
			</td>
			<td>	
				<?php echo $form->textField($model, 'villa_poblacion', array('maxlength' => 200)); ?>
				<?php echo $form->error($model,'villa_poblacion'); ?>
			</td>	
			<td>
				<?php echo $form->labelEx($model,'comuna_id'); ?>
			</td>
			<td>
				<?php echo $form->dropDownList($model, 'comuna_id', GxHtml::listDataEx(Comuna::model()->findAll(array('order'=>'nombre'),array('condition'=>'estado=1')))); ?>
				<?php echo $form->error($model,'comuna_id'); ?>
			</td>
		</tr>
		</table>
		</div><!-- End FieldSet UBICACION -->
		
		<div class="fieldset2">
		<div class="legend">Contacto</div>
		
		<table width="100%" border="0" cellspacing="5" cellpadding="5">
		<tr>
			<td align="left" style="width: 130px;">
				<?php echo $form->labelEx($model,'telefono_particular'); ?>
			</td>
			<td align="left" style="width: 300px;">	
				<?php echo $form->textField($model, 'telefono_particular', array('maxlength' => 12)); ?>
				<?php echo $form->error($model,'telefono_particular'); ?>
			</td>
			<td align="left" style="width: 125px;" >
				<?php echo $form->labelEx($model,'correo_electronico'); ?>
			</td>
			<td>	
				<?php echo $form->textField($model, 'correo_electronico', array('maxlength' => 50)); ?>
				<?php echo $form->error($model,'correo_electronico'); ?>
			</td>	
		</tr>
		</table>
		
		</div><!-- End FieldSet CONTACTO -->
		
		<div class="fieldset2">
		<div class="legend">Colegio Anterior</div>		
		<table width="100%" border="0" cellspacing="5" cellpadding="5">
		<tr>
			<td align="left" style="width: 130px;">
				<?php echo $form->labelEx($model,'colegio_proveniente'); ?>
			</td>
			<td align="left" style="width: 300px;">	
				<?php echo $form->textField($model, 'colegio_proveniente', array('maxlength' => 200)); ?>
				<?php echo $form->error($model,'colegio_proveniente'); ?>
			</td>
			<td align="left" style="width: 125px;" >
				<?php echo $form->labelEx($model,'ciudad_colegio'); ?>
			</td>
			<td>
			<?php echo $form->textField($model, 'ciudad_colegio'); ?>
			<?php echo $form->error($model,'ciudad_colegio'); ?>
			</td>
		</tr>	
		</table>
		</div><!-- End FieldSet COLEGIO ANTERIOR -->
		
		<div class="fieldset2">
		<div class="legend">Datos Medicos</div>		
		<table width="100%" border="0" cellspacing="5" cellpadding="5">
		<tr>
			<td align="left" style="width: 130px;">
				<?php echo $form->labelEx($model,'nombre_isapre'); ?>
			</td>
			<td align="left" style="width: 300px;">	
				<?php echo $form->textField($model, 'nombre_isapre', array('maxlength' => 50)); ?>
				<?php echo $form->error($model,'nombre_isapre'); ?>
			</td>
			<td align="left" style="width: 125px;" >		
				<?php echo $form->labelEx($model,'fonasa_tramo'); ?>
			</td>
			<td>
				<?php echo $form->textField($model, 'fonasa_tramo', array('maxlength' => 2)); ?>
				<?php echo $form->error($model,'fonasa_tramo'); ?>
			</td>
		</tr>			
		<tr>
			<td align="left">
				<?php echo $form->labelEx($model,'tratamiento_medico'); ?>
			</td>
			<td align="left">	
				<?php echo $form->textField($model, 'tratamiento_medico', array('maxlength' => 200)); ?>
				<?php echo $form->error($model,'tratamiento_medico'); ?>
			</td>
			<td>
				<?php echo $form->labelEx($model,'alergico_medicamento'); ?>
			</td>
			<td>	
				<?php echo $form->textField($model, 'alergico_medicamento', array('maxlength' => 200,'size'=>30)); ?>
				<?php echo $form->error($model,'alergico_medicamento'); ?>
			</td>
		</tr>		
		</table>
		</div><!-- End FieldSet DATOS MEDICOS -->

		

		<div class="fieldset2">
		<div class="legend">Responsables</div>
		<table width="100%" border="0" cellspacing="5" cellpadding="5">
		<tr>
			<td align="left" style="width: 130px;">	
				<?php echo $form->labelEx($model,'apoderado_rut'); ?>
			</td>
			<td>	
				<?php 
					//echo $form->dropDownList($model, 'apoderado_rut', GxHtml::listDataEx(Encargados::model()->findAll(array('condition'=>'estado=1')))); 
					echo $form->textField($model, 'apoderado_rut',array('maxlength' => 8,'size'=>10,'onkeydown'=>'validarNumeros(event)','onkeypress'=>'validarRutEnter(event,this.value,"nombreApoderado")'));
				?>
				
				<strong id='nombreApoderado'>Ej:10341341</strong>
				<?php 
					if ($model->apoderado_rut){
						$rut_ = $model->apoderado_rut;
						
						//EncargadosController::obtenerNombreUsuario($userID)
						echo "<script>$('#nombreApoderado').html('".EncargadosController::obtenerNombreEncargadoTexto($rut_)."');</script>";
					}
				?>
				<!-- Obtener por medio de un json el nombre del rut asociado -->
				<div id="nombreApoderado"></div>
					<?php echo $form->error($model,'apoderado_rut'); ?>
				</div><!-- row -->
			</td>
		</tr>
		<tr>	
			<td align="left">	
				<?php echo $form->labelEx($model,'padre_rut'); ?>
			</td>
			<td>					
				<?php 
					echo $form->textField($model, 'padre_rut',array('maxlength' => 8,'size'=>10,'onkeydown'=>'validarNumeros(event)','onkeypress'=>'validarRutEnter(event,this.value,"nombrePadre")'));

					?>
				<strong id='nombrePadre'>Ej:10341341</strong>
				<?php 
					if ($model->padre_rut){
						$rut_ = $model->padre_rut;
						//EncargadosController::obtenerNombreUsuario($userID)
						echo "<script>$('#nombrePadre').html('".EncargadosController::obtenerNombreEncargadoTexto($rut_)."');</script>";
					}
					
				echo $form->error($model,'padre_rut'); ?>
			</td>
		</tr>	
		
		<tr>
			<td align="left">	
				<?php echo $form->labelEx($model,'madre_rut'); ?>
			</td>
			<td>					
				<?php echo $form->textField($model, 'madre_rut',array('maxlength' => 8,'size'=>10,'onkeydown'=>'validarNumeros(event)','onkeypress'=>'validarRutEnter(event,this.value,"nombreMadre")'));?>
				<strong id='nombreMadre'>Ej:10341341</strong>
				<?php 
					if ($model->madre_rut){
						$rut_ = $model->madre_rut;
						//EncargadosController::obtenerNombreUsuario($userID)
						echo "<script>$('#nombreMadre').html('".EncargadosController::obtenerNombreEncargadoTexto($rut_)."');</script>";
					}
					echo $form->error($model,'madre_rut'); 
				?>
			</td>
		</tr>
		</table>
		</div><!-- End FieldSet -->
	

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
<div class="limpia"></div>
</div><!-- form -->
<div class="limpia"></div>
</div>