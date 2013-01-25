<div class="content">


<?php 
	if(isset($model->proceso_periodo_id)){
			Yii::app()->clientScript->registerScript('ready', "
    			asignarMontoTotal();
			");		
	}

	$userID = Yii::app()->user->id;
	date_default_timezone_set("America/Santiago");
	$fecha_hoy = new DateTime();
	
?>
<div class="content">
<div class="form">
<h3> <?php echo $titulo; ?></h3>
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'compromisos-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>TRUE),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
		<div class="row">
		<div style='float:left;width: 45%;'>
		<?php echo $form->labelEx($model,'responsable_id'); 
			  echo ': <b>'.EncargadosController::obtenerNombreUsuario($userID).'</b>';
			  echo $form->hiddenField($model, 'responsable_id',array('value'=>''.$userID));	
		?>
		<?php echo $form->error($model,'responsable_id'); ?>
		</div>
		<div style='float:left;width: 45%;'>
			<?php echo $form->labelEx($model,'fecha_actual'); ?>
			<?php //echo $form->textField($model, 'fecha_actual',array('value'=>$fecha_hoy->format('Y-m-d H:i:s'))); 
				 	echo ': <strong style="color:#E91919;font-size: 20px;">'.$fecha_hoy->format('Y-m-d').'</strong>';
					echo $form->hiddenField($model, 'fecha_actual',array('value'=>''.$fecha_hoy->format('Y-m-d H:i:s')));	
			?>
			<?php echo $form->error($model,'fecha_actual'); ?>
		</div>
		</div><!-- row -->
		

		<div class="row">
		<?php echo $form->labelEx($model,'tipo_compromiso_id'); ?>
		<?php echo $form->dropDownList($model, 'tipo_compromiso_id', GxHtml::listDataEx(TiposCompromisos::model()->findAll(array('condition'=>'estado=1'))));   ?>
		
		<?php echo $form->error($model,'tipo_compromiso_id'); ?>
		</div><!-- row -->
		
		<div class="row">
		<label class="required" for="Compromisos_proceso_periodo_id">
			<span class="required"> * </span>Rut Alumno Matriculado  :  		
		</label>

		<?php //echo $form->labelEx($model,'proceso_periodo_id'); ?>
		<?php //echo $form->dropDownList($model, 'proceso_periodo_id', GxHtml::listDataEx(ProcesosPeriodos::model()->findAll(array('condition'=>'estado=1'))));
			echo $form->hiddenField($model, 'proceso_periodo_id');	
		  //echo $form->hiddenField($model, 'proceso_periodo_id',array('value'=>''));
			/*if(isset($model->proceso_periodo_id)){
				$pp= ProcesosPeriodos::model()->find(array('condition'=>'estado=1 AND id='.$model->proceso_periodo_id));
				$alumno = Alumnos::model()->find(array('condition'=>'rut='.$pp->alumno_rut));
				$concatenado = "";
				if(isset( $alumno['nombre'])){
					$concatenado =	$alumno['nombre'].' '.$alumno['apellido_paterno'].' '.$alumno['apellido_materno'];
				}
				echo $pp->alumno_rut.'  -  ' .$concatenado;
			}else{*/
				echo '<input id="compromisoRut" type="text"  onkeypress="bucarCompromiso(event,this.value,\'nombreAlumnoMatriculado\')" onkeydown="validarNumeros(event)" size="10" maxlength="8">';
			//}
			
			?>
			
			
			
		<?php 	
			//echo $form->textField($model, 'proceso_periodo_id',array('maxlength' => 8,'size'=>10,'onkeydown'=>'validarNumeros(event)','onkeypress'=>'bucarCompromiso(event,this.value,"nombreAlumnoMatriculado")'));
			
		?>
		<strong id="nombreAlumnoMatriculado"></strong>
		<?php echo $form->error($model,'proceso_periodo_id'); ?>
		</div><!-- row -->
		
		<div class="row">
		<?php echo $form->labelEx($model,'observaciones'); ?>
		<?php echo $form->textArea($model, 'observaciones',array('rows'=>3,'maxlength' => 200,'style'=>'width: 500px;')); ?>
		<?php echo $form->error($model,'observaciones'); ?>
		</div><!-- row -->
		
		<div class="row">
		<div style='float:left;width: 45%;'>
		<?php echo $form->labelEx($model,'numero_cuotas'); ?>:
		<?php //echo $form->textField($model, 'numero_cuotas'); 
			  echo $form->radioButtonList($model,'numero_cuotas',array('1'=>'1','6'=>'6','9'=>'9'),array('separator'=>'      '));	
		?>
		<?php echo $form->error($model,'numero_cuotas'); ?>
		</div>
		<div style='float:left;width: 45%;'>
		<?php echo $form->labelEx($model,'tasa_interes_id'); ?>
		<?php //echo $form->dropDownList($model, 'tasa_interes_id', GxHtml::listDataEx(TasasInteres::model()->findAll(array('condition'=>'estado=1')))); 
			  echo '<select id="Compromisos_tasa_interes_id" name="Compromisos[tasa_interes_id]" onChange="calcularMontoTotal()">';
			  echo "<option value=''  tasa='0'>--</option>";	
			  	foreach (TasasInteres::model()->findAll(array('condition'=>'estado=1')) as $value){
					if($model->tasa_interes_id==$value->id)	{
						echo "<option value='".$value->id."' selected='selected' tasa='".$value->porcentaje."'>".$value->nombre."</option>";
					}else{
						echo "<option value='".$value->id."' tasa='".$value->porcentaje."'>".$value->nombre."</option>";
					}
				}
			  echo '</select>';
			  echo '<strong id="interes" style="color:#E91919;font-size: 20px;"></strong>';
		?>
		
		<?php echo $form->error($model,'tasa_interes_id'); ?>
		</div>
		</div><!-- row -->
		
		<div class="row">
		<div style='float:left;width: 45%;'>
		<?php echo $form->labelEx($model,'monto_sin_interes'); ?>
		<?php echo $form->textField($model, 'monto_sin_interes',array('maxlength' => 8,'size'=>10,'onkeydown'=>'validarNumeros(event)','onblur'=>'asignarMontoTotal()')); ?>
		<?php echo $form->error($model,'monto_sin_interes'); ?>
		</div>
		<div style='float:left;width: 45%;'>
		<?php echo $form->labelEx($model,'monto_total'); ?>
		 
		<?php //echo $form->textField($model, 'monto_total'); 
			  echo '  :  <strong id="montoTotal" style="color:#E91919;font-size: 20px;">'.$model->monto_total.'</strong>';
			  echo $form->hiddenField($model, 'monto_total',array('value'=>''));
		?>
		<?php echo $form->error($model,'monto_total'); ?>
		</div>
		</div><!-- row -->
		<div class="row">
			<label class="colon">Cuota Mensual Estimada : </label>
			<strong id="cuotaMensual" style="color:#E91919;font-size: 20px;"></strong>
		</div><!-- row -->
		<div class="row">
		<div style='float:left;width: 45%;'>
		<?php echo $form->labelEx($model,'medio_pago_id'); ?>
		<?php echo $form->dropDownList($model, 'medio_pago_id', GxHtml::listDataEx(MediosPagos::model()->findAll(array('condition'=>'estado=1')))); ?>
		<?php echo $form->error($model,'medio_pago_id'); ?>
		</div>
		<div style='float:left;width: 45%;'>
		<?php echo $form->labelEx($model,'fecha_primera_cuota'); ?>
		<?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                //'name'=>'date',
                'model'=>$model,
                'attribute'=>'fecha_primera_cuota',
                'language'=>Yii::app()->language=='es' ? 'es' : null,
                'options'=>array(
                    'changeMonth'=>'true', 
                    'changeYear'=>'true',
                    'yearRange' => '-0:+1',        
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
            
		<?php //echo $form->textField($model, 'fecha_primera_cuota'); ?>
		<?php echo $form->error($model,'fecha_primera_cuota'); ?>
		</div>
		</div><!-- row -->
		
		
		<div class="row">
		<?php 
			echo $form->labelEx($model,'evidencia_pdf'); 
			
			/*if (isset($model->evidencia_pdf)){
				echo "  :   <a target='_blank' href='".Yii::app()->request->baseUrl.'/upload/doc/'.$model->evidencia_pdf."'>".$model->evidencia_pdf."</a>";
				$model->documento = $model->evidencia_pdf;
			}else{*/
		 		echo $form->fileField($model, 'documento');
		 		echo $form->error($model,'documento'); 
			//}
		?>
		
		
		</div><!-- row -->

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
<div class="limpia"></div>
</div><!-- form -->
<div class="limpia"></div>
</div>