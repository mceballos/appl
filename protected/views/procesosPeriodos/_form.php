<div class="content">
<div class="form">
<h3> <?php echo $titulo; ?></h3>
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'procesos-periodos-form',
	'enableAjaxValidation' => false,
));


?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

<table width="100%" border="0" cellspacing="5" cellpadding="5">
        <tr>
            <td width="200" align="left"><?php echo $form->labelEx($model,'alumno_rut'); ?></td>
            <td>
                <?php echo $form->textField($model, 'alumno_rut',array('style'=>'width:146px','maxlength' => 8,'size'=>10,'onkeydown'=>'validarNumeros(event)','onkeypress'=>'validarRutNombreAlumnoEnter(event,this.value,"nombreAlumno")'));?>
                <strong style="font-size: 20px;">-</strong>
                 <?php if($model->isNewRecord){
                        echo '<input type="text" id="ProcesosPeriodos_DV" name="ProcesosPeriodos[DV]" size="1" maxlength="1">';
                      }else{
                          echo '<input type="text" id="ProcesosPeriodos_DV" name="ProcesosPeriodos[DV]" size="1" maxlength="1" value="'.$model->alumnoRut->dv.'">';
                      }
                ?>
                <?php echo $form->error($model,'alumno_rut'); ?>
                <a href="#" rel="tooltip" title="El Rut debe ser ingresado sin puntos. Ej: 11111111-1"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/help.png"/></a>
            </td>
        </tr>
        <tr>
            <td align="left"><?php echo $form->labelEx($model,'periodo_id'); ?>:</td>
            <td><?php echo '<b>'.Yii::app()->session['idPeriodoSelecionado'].'</b>';
              echo $form->hiddenField($model,'periodo_id',array('value'=>''.Yii::app()->session['idPeriodo']));
              echo $form->error($model,'periodo_id');?></td>
        </tr>
        <tr>
            <td align="left"><?php echo $form->labelEx($model,'seccion_grado_id'); ?></td>
            <td><?php echo $form->dropDownList($model, 'seccion_grado_id', GxHtml::listDataEx(SeccionesGrados::model()->findAll(array('condition'=>'estado=1')))); ?>
        <?php echo $form->error($model,'seccion_grado_id'); ?></td>
        </tr>
        <tr>
            <td align="left"><?php echo $form->labelEx($model,'pago_pendiente'); ?></td>
            <td><?php echo $form->checkBox($model, 'pago_pendiente'); ?>
        <?php echo $form->error($model,'pago_pendiente'); ?></td>
        </tr>
        <tr>
            <td align="left"><?php echo $form->labelEx($model,'promovido'); ?></td>
            <td><?php echo $form->checkBox($model, 'promovido'); ?>
        <?php echo $form->error($model,'promovido'); ?></td>
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