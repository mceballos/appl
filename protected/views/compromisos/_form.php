<div class="content">


<?php 
	if(isset($model->proceso_periodo_id)){
			Yii::app()->clientScript->registerScript('ready', "
    			asignarMontoTotal();
			");		
	}
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
	
	<table width="100%" border="0" cellspacing="5" cellpadding="5">
        <tr>
            <td align="right" colspan="4">
                <?php echo $form->labelEx($model,'fecha_actual'); ?>
                <?php echo ': <strong style="color:#E91919;font-size: 20px;">'.$fecha_hoy->format('Y-m-d').'</strong>';
                      echo $form->hiddenField($model, 'fecha_actual',array('value'=>''.$fecha_hoy->format('Y-m-d H:i:s')));   
                ?>
                <?php echo $form->error($model,'fecha_actual'); ?>
            </td>
         </tr>
         <tr>
            <td align="left" style="width: 150px;"><?php echo $form->labelEx($model,'tipo_compromiso_id'); ?></td>
            <td style="width: 290px;">Colegiatura<?php 
                    
                    echo $form->hiddenField($model, 'tipo_compromiso_id',array('value'=>'1'));  
                    ?>        
                <?php echo $form->error($model,'tipo_compromiso_id'); ?></td>
            <td align="left" style="width: 150px;"><label class="required" for="Compromisos_proceso_periodo_id"><span class="required"> * </span>Rut Alumno Matriculado</label></td>
            <td><?php echo $form->hiddenField($model, 'proceso_periodo_id');  
            
            if($model->isNewRecord){                  
                echo '<input id="compromisoRut" name="Compromisos[rut]" type="text"  onkeydown="validarNumeros(event)" size="10" maxlength="8" style="width: 135px;">- <input id="compromisoDV" name="Compromisos[dv]" type="text" size="2" maxlength="1"/><a href="#" onclick="buscarCompromisoV2(\'compromisoRut\',\'compromisoDV\',\'nombreAlumnoMatriculado\');" rel="tooltip" class="btn-small find" data-original-title="Buscar"><i class="icon-search"></i></a>';
            }else{
                echo '<input id="compromisoRut" name="Compromisos[rut]" value="'.$model->procesoPeriodo->alumnoRut->rut.'" type="text"  onkeydown="validarNumeros(event)" size="10" maxlength="8" style="width: 135px;">- <input id="compromisoDV" name="Compromisos[dv]" value="'.$model->procesoPeriodo->alumnoRut->dv.'" type="text" size="2" maxlength="1"/><a href="#" onclick="buscarCompromisoV2(\'compromisoRut\',\'compromisoDV\',\'nombreAlumnoMatriculado\');" rel="tooltip" class="btn-small find" data-original-title="Buscar"><i class="icon-search"></i></a>';
            }    
                
                ?>
                <br/>
                <strong id="nombreAlumnoMatriculado"></strong>
                <?php echo $form->error($model,'proceso_periodo_id'); ?>    
            </td>
         </tr>
         <tr>
            <td align="left">  <?php echo $form->labelEx($model,'observaciones'); ?></td>
            <td colspan="3"><?php echo $form->textArea($model, 'observaciones',array('rows'=>3,'maxlength' => 200,'style'=>'width: 668px;')); ?>
        <?php echo $form->error($model,'observaciones'); ?></td>
         </tr>
         <tr>
            <td align="left"><?php echo $form->labelEx($model,'numero_cuotas'); ?>:</td>
            <td><?php 
                    echo $form->dropDownList($model, 'numero_cuotas', array('0','0','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10'),array('onchange'=>'calcularMontoTotal();')); 
                    //echo $form->radioButtonList($model,'numero_cuotas',array('0','0','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10',),array('onclick'=>'calcularMontoTotal();','separator'=>'      '));
                    
                    ?>
                <?php echo $form->error($model,'numero_cuotas'); ?></td>
            <td align="left"><?php echo $form->labelEx($model,'tasa_interes_id'); ?></td>
            <td><?php //echo $form->dropDownList($model, 'tasa_interes_id', GxHtml::listDataEx(TasasInteres::model()->findAll(array('condition'=>'estado=1')))); 
                      echo '<select id="Compromisos_tasa_interes_id" name="Compromisos[tasa_interes_id]" onChange="calcularMontoTotal()">';
                      echo "<option value=''  tasa='0'>--</option>";    
                        foreach (TasasInteres::model()->findAll(array('condition'=>'t.estado=1 AND t.id <> 2')) as $value){
                            if($model->tasa_interes_id==$value->id) {
                                echo "<option value='".$value->id."' selected='selected' tasa='".$value->porcentaje."'>".$value->nombre." (".$value->porcentaje."%)</option>";
                            }else{
                                echo "<option value='".$value->id."' tasa='".$value->porcentaje."'>".$value->nombre." (".$value->porcentaje."%)</option>";
                            }
                        }
                      echo '</select>';
                      //echo '<strong id="interes" style="color:#E91919;font-size: 20px;"></strong>';
                ?>
                
                <?php echo $form->error($model,'tasa_interes_id'); ?></td>
         </tr>
         <tr>
            <td align="left"><?php echo $form->labelEx($model,'monto_sin_interes'); ?></td>
            <td><?php echo $form->textField($model, 'monto_sin_interes',array('style'=>'width: 155px;','maxlength' => 8,'size'=>10,'onkeydown'=>'validarNumeros(event)','onkeyup'=>'asignarMontoTotal()')); ?>
                <?php echo $form->error($model,'monto_sin_interes'); ?></td>
            <td align="left"><?php echo $form->labelEx($model,'fecha_primera_cuota'); ?></td>
            <td>
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
                                'buttonText'=>Yii::t('ui','Seleccionar Calendario'), 
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
            </td>            
            
         </tr>
         <tr>
            <td align="left"><label class="colon">Cuota Mensual Estimada : </label></td>
            <td><strong id="cuotaMensual" style="color:#E91919;font-size: 20px;"></strong></td>
            <td align="left"><?php echo $form->labelEx($model,'monto_total'); ?>:</td>
            <td><?php //echo $form->textField($model, 'monto_total'); 
              echo '<strong id="montoTotal" style="color:#E91919;font-size: 20px;">'.$model->monto_total.'</strong>';
              echo $form->hiddenField($model, 'monto_total',array('value'=>''));
            ?>
            <?php echo $form->error($model,'monto_total'); ?></td>
         </tr>         
    </table>
		
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
<div class="limpia"></div>
</div><!-- form -->
<div class="limpia"></div>
</div>